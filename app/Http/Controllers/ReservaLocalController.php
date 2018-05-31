<?php

namespace App\Http\Controllers;

use App\Model\ReservaLocal;
use Illuminate\Http\Request;

class ReservaLocalController extends Controller
{
    public function principal()
    {
        return view('sistema.reserva-local.principal');
    }

    public function form()
    {
        $model = new ReservaLocal;

        $obj = $model;

        return view('sistema.reserva-local.form', ['obj' => $obj]);
    }

    public function grid()
    {
        $model = new ReservaLocal;
        return $model->getAll();
    }

    public function editar($id)
    {
        $model = new ReservaLocal;

        $obj = $model->find($id);

        return view('sistema.reserva-local.form', ['obj' => $obj]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new ReservaLocal;

        if (!empty($params['id_reserva_local'])) {
            $model = $model->find($params['id_reserva_local']);
        } else {
            unset($params['id_reserva_local']);
        }

        $model->fill($params);
        
        $model->limparDados();
        
        $model->save();
    }

    public function excluir($id)
    {
        $model = new ReservaLocal;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $obj->update();

        return response([]);
    }
}
