<?php

namespace App\Http\Controllers;

use App\MoradorTipo;
use Illuminate\Http\Request;

class MoradorTipoController extends Controller
{
    public function principal()
    {
        return view('sistema.moradorTipo.principal');
    }

    public function form()
    {
        return view('sistema.moradorTipo.form');
    }

    public function gravar()
    {
       
    }
}
