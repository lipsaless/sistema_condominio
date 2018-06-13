<?php

namespace App\Http\Controllers;

use App\Model\Apartamento;
use App\Model\Bloco;
use Illuminate\Http\Request;

class ApartamentoController extends Controller
{
    public function principal()
    {
        return view('sistema.configuracoes.condominio.apartamento.principal');
    }

    public function form()
    {
        $model = new Apartamento;
        $modelBloco = new Bloco;

        $obj = $model;
        $blocos = $modelBloco->getAll();

        return view('sistema.configuracoes.condominio.apartamento.form', ['obj' => $obj, 'blocos' => $blocos]);
    }

    public function grid() 
    {
        $model = new Apartamento;

        return $model->getAll();
    }

    public function editar($id)
    {
        $model = new Apartamento;
        $modelBloco = new Bloco;

        $obj = $model->find($id);

        $blocos = $modelBloco->getAll();

        return view('sistema.configuracoes.condominio.apartamento.form', ['obj' => $obj, 'blocos' => $blocos]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new Apartamento;

        if (!empty($params['id_apartamento'])) {
            $model = $model->find($params['id_apartamento']);
        } else {
            unset($params['id_apartamento']);
        }

        $model->fill($params);
        
        $salvou = $model->save();

        if ($salvou) {
            return json_encode(['type' => 'success', 'msg' => 'Cadastro efetuado com sucesso.']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar cadastrar apartamento.']);
        }
    }

    public function excluir($id)
    {
        $model = new Apartamento;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $excluir = $obj->update();

        if ($excluir) {
            return json_encode(['type' => 'success', 'msg' => 'Apartamento excluído com sucesso.']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar excluir apartamento.']);
        }
        
        return response([]);
    }
}
