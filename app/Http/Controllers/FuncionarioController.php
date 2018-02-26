<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function principal()
    {
        return view('sistema.funcionario.principal');
    }

    public function form()
    {
        return view('sistema.funcionario.form');
    }

    public function gravar()
    {
       
    }
}
