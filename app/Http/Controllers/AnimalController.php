<?php

namespace App\Http\Controllers;

use App\Model\Animal;
use App\Model\AnimalTipo;
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
        $modelTipo = new AnimalTipo();
        $tipos = $modelTipo->getAll();
        return view('sistema.animal.form', ['tipos' => $tipos]);
    }

    public function grid()
    {
        $model = new Animal;
        return $model->getAll();
    }

    public function gravar(Request $request)
    {
        $model = new Animal($request->all());
        $inserir = $model->save();

        if ($inserir) {
            echo 'inserido com sucesso';
        } else {
            echo 'falha ao inserir';
        }
    }
}
