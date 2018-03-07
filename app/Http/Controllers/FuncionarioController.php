<?php

namespace App\Http\Controllers;

use App\Funcionario;
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

    public function gravar()
    {
       
    }
}
