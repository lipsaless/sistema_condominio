<?php

namespace App\Http\Controllers;

use App\Model\Animal;
use App\Model\AnimalTipo;
use Illuminate\Http\Request;

class AnimalTipoController extends Controller
{
    public function principal()
    {
        $model = new AnimalTipo();
        $visitantes = AnimalTipo::all()->toArray();
        return view('sistema.configuracoes.animal-tipo.principal');
    }

    public function form()
    {
        $model = new AnimalTipo();

        $obj = $model;

        return view('sistema.configuracoes.animal-tipo.form', ['obj' => $obj]);
    }

    public function grid()
    {
        $model = new AnimalTipo;
        return $model->getAll();
    }

    public function editar($id)
    {
        $model = new AnimalTipo;

        $obj = $model->find($id);

        return view('sistema.configuracoes.animal-tipo.form', ['obj' => $obj]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new AnimalTipo;

        if (!empty($params['id_animal_tipo'])) {
            $model = $model->find($params['id_animal_tipo']);
        } else {
            unset($params['id_animal_tipo']);
        }

        $model->fill($params);
        
        // $model->limparDados();
        
        $save = $model->save();

        if ($save) {
            return json_encode(['type' => 'success', 'msg' => 'Cadastrado com sucesso!']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar cadastrar tipo de animal!']);
        }
    }

    public function excluir($id)
    {
        $model = new AnimalTipo;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');

        $excluir = $obj->update();

        if ($excluir) {
            return json_encode(['type' => 'success', 'msg' => 'Tipo de animal excluído com sucesso!']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar excluir tipo de animal!']);
        }
        
        return response([]);
    }
}
