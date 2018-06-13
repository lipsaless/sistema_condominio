<?php

namespace App\Http\Controllers;

use App\Model\Morador;
use App\Model\MoradorTipo;
use Illuminate\Http\Request;

class MoradorTipoController extends Controller
{
    public function principal()
    {
        $model = new MoradorTipo();
        $visitantes = MoradorTipo::all()->toArray();
        return view('sistema.configuracoes.morador-tipo.principal');
    }

    public function form()
    {
        $model = new MoradorTipo();

        $obj = $model;

        return view('sistema.configuracoes.morador-tipo.form', ['obj' => $obj]);
    }

    public function grid()
    {
        $model = new MoradorTipo;
        return $model->getAll();
    }

    public function editar($id)
    {
        $model = new MoradorTipo;

        $obj = $model->find($id);

        return view('sistema.configuracoes.morador-tipo.form', ['obj' => $obj]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new MoradorTipo;

        if (!empty($params['id_morador_tipo'])) {
            $model = $model->find($params['id_morador_tipo']);
        } else {
            unset($params['id_morador_tipo']);
        }

        $model->fill($params);
        
        // $model->limparDados();
        
        $save = $model->save();

        if ($save) {
            return json_encode(['type' => 'success', 'msg' => 'Cadastrado com sucesso!']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar cadastrar tipo de morador!']);
        }
    }

    public function excluir($id)
    {
        $model = new MoradorTipo;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');

        $excluir = $obj->update();

        if ($excluir) {
            return json_encode(['type' => 'success', 'msg' => 'Tipo de morador excluído com sucesso!']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar excluir tipo de morador!']);
        }
        
        return response([]);
    }
}
