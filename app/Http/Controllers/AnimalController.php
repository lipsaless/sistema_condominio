<?php

namespace App\Http\Controllers;

use App\Model\Animal;
use App\Model\AnimalTipo;
use App\Model\Apartamento;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function principal()
    {
        $model = new Animal();
        $modelTipo = new AnimalTipo();

        $animais = Animal::all()->toArray();
        $tipos = $modelTipo->getAll();

        return view('sistema.animal.principal', ['tipos' => $tipos]);
    }

    public function form()
    {
        $model = new Animal;
        $modelTipo = new AnimalTipo();

        $tipos = $modelTipo->getAll();
        $listaMoradores = '';
        $obj = $model;

        return view('sistema.animal.form', ['obj' => $obj, 'tipos' => $tipos, 'listaMoradores' => $listaMoradores]);
    }

    public function grid()
    {
        $model = new Animal;
        return $model->getAll();
    }

    public function editar($id)
    {
        $model = new Animal;
        $modelAnimalTipo = new AnimalTipo;
        $modelApartamento = new Apartamento;

        $obj = $model->find($id);
        
        $tipos = $modelAnimalTipo->getAll();
        $listaMoradores = $modelApartamento->moradorPorApartamento($obj->id_apartamento);

        return view('sistema.animal.form', ['obj' => $obj, 'tipos' => $tipos, 'listaMoradores' => $listaMoradores]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new Animal;

        if (!empty($params['id_animal'])) {
            $model = $model->find($params['id_animal']);
        } else {
            unset($params['id_animal']);
        }

        $model->fill($params);
        
        $salvou = $model->save();

        if ($salvou) {
            return json_encode(['type' => 'success', 'msg' => 'Cadastro efetuado com sucesso.']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar cadastrar animal.']);
        }
    }

    public function excluir($id)
    {
        $model = new Animal;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $excluir = $obj->update();

        if ($excluir) {
            return json_encode(['type' => 'success', 'msg' => 'Animal excluído com sucesso.']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar excluir animal.']);
        }

        return response([]);
    }
}
