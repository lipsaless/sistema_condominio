<?php

namespace App\Http\Controllers;

use App\Model\Visitante;
use App\Model\VisitanteTipo;
use Illuminate\Http\Request;

class VisitanteController extends Controller
{
    public function principal()
    {
        $model = new Visitante();
        $moradores = Visitante::all()->toArray();
        return view('sistema.visitante.principal');
    }

    public function form()
    {
        $model = new Visitante();
        $modelVisitanteTipo = new VisitanteTipo;

        $tipos = $modelVisitanteTipo->getAll();
        $moradores = Visitante::all()->toArray();

        $obj = $model;

        return view('sistema.visitante.form', ['obj' => $obj, 'visitanteTipo' => $tipos]);
    }

    public function grid()
    {
        $model = new Visitante;
        return $model->getAll();
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new Visitante;

        if (!empty($params['id_visitante'])) {
            $model = $model->find($params['id_visitante']);
        } else {
            unset($params['id_visitante']);
        }

        $model->fill($params);
        
        $model->limparDados();
        
        $model->save();
    }

    public function excluir($id)
    {
        $model = new Visitante;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $obj->update();

        return response([]);
    }
}
