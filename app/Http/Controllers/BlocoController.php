<?php

namespace App\Http\Controllers;

use App\Model\Bloco;
use Illuminate\Http\Request;

class BlocoController extends Controller
{
    public function principal()
    {
        $model = new Bloco();
        $moradores = Bloco::all()->toArray();
        return view('sistema.configuracoes.condominio.bloco.principal');
    }

    public function form()
    {
        $model = new Bloco();
        $moradores = Bloco::all()->toArray();

        $obj = $model;

        return view('sistema.configuracoes.condominio.bloco.form', ['obj' => $obj]);
    }

    public function grid()
    {
        $model = new Bloco;
        return $model->getAll();
    }

    public function editar($id)
    {
        $model = new Bloco;

        $obj = $model->find($id);

        return view('sistema.configuracoes.condominio.bloco.form', ['obj' => $obj]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new Bloco;

        if (!empty($params['id_bloco'])) {
            $model = $model->find($params['id_bloco']);
        } else {
            unset($params['id_bloco']);
        }

        $model->fill($params);
        
        $salvou = $model->save();

        if ($salvou) {
            return json_encode(['type' => 'success', 'msg' => 'Cadastro efetuado com sucesso.']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar cadastrar bloco.']);
        }
    }

    public function excluir($id)
    {
        $model = new Bloco;
        $obj = $model->find($id);
        $obj->dt_fim = date('Y-m-d H:i:s');
        $excluir = $obj->update();

        if ($excluir) {
            return json_encode(['type' => 'success', 'msg' => 'Bloco excluído com sucesso.']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar excluir bloco.']);
        }
        
        return response([]);
    }
}
