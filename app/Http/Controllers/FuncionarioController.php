<?php

namespace App\Http\Controllers;

use App\Model\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public $title = 'Funcionários';

    public function principal()
    {
        $model = new Funcionario();
        $moradores = Funcionario::all()->toArray();
        return view('sistema.funcionario.principal');
    }

    public function form()
    {
        $model = new Funcionario();
        $moradores = Funcionario::all()->toArray();
        return view('sistema.funcionario.form');
    }

    public function grid()
    {
        $model = new Funcionario;
        return $model->getAll();
    }

    public function gravar(Request $request)
    {
        $model = new Funcionario($request->all());
        $model->limparDados();

       $model->save();

        if ($model) {
            echo 'inserido com sucesso';
        } else {
            echo 'falha ao inserir';
        }
    }
}
