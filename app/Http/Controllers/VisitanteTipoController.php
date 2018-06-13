<?php

namespace App\Http\Controllers;

use App\Model\Visitante;
use App\Model\VisitanteTipo;
use Illuminate\Http\Request;

class VisitanteTipoController extends Controller
{
    public function principal()
    {
        $model = new VisitanteTipo();
        $visitantes = VisitanteTipo::all()->toArray();
        return view('sistema.configuracoes.visitante-tipo.principal');
    }

    public function form()
    {
        $model = new VisitanteTipo();

        $obj = $model;

        return view('sistema.configuracoes.visitante-tipo.form', ['obj' => $obj]);
    }

    public function grid()
    {
        $model = new VisitanteTipo;
        return $model->getAll();
    }

    public function editar($id)
    {
        $model = new VisitanteTipo;

        $obj = $model->find($id);

        return view('sistema.configuracoes.visitante-tipo.form', ['obj' => $obj]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new VisitanteTipo;

        if (!empty($params['id_visitante_tipo'])) {
            $model = $model->find($params['id_visitante_tipo']);
        } else {
            unset($params['id_visitante_tipo']);
        }

        $model->fill($params);
        
        // $model->limparDados();
        
        $save = $model->save();

        if ($save) {
            return json_encode(['type' => 'success', 'msg' => 'Cadastrado com sucesso!']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar cadastrar tipo de visitante!']);
        }
    }

    public function excluir($id)
    {
        $model = new VisitanteTipo;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');

        $excluir = $obj->update();

        if ($excluir) {
            return json_encode(['type' => 'success', 'msg' => 'Tipo de visitante excluído com sucesso!']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar excluir tipo de visitante!']);
        }
        
        return response([]);
    }
}
