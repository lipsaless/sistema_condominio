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
        
        $salvou = $model->save();
        
        if ($salvou) {
            return json_encode(['type' => 'success', 'msg' => 'Cadastrado com sucesso!']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar cadastrar visitante!']);
        }
    }

    public function excluir($id)
    {
        $model = new Visitante;

        $obj = $model->findVisitante($id);
        $obj->dt_fim = date('Y-m-d H:i:s');
        
        $excluir = $obj->update();
        
        if ($excluir) {
            return json_encode(['type' => 'success', 'msg' => 'Visitante excluído com sucesso!']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar excluir Visitante!']);
        }

        return response([]);
    }
}
