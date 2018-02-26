<?php

namespace App\Http\Controllers;

use App\Apartamento;
use Illuminate\Http\Request;

class ApartamentoController extends Controller
{
    public function principal()
    {
        return view('sistema.apartamento.principal');
    }

    public function form()
    {
        return view('sistema.apartamento.form');
    }

    public function gravar()
    {
       
    }
}
