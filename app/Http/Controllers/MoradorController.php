<?php

namespace App\Http\Controllers;

use App\Morador;
use Illuminate\Http\Request;

class MoradorController extends Controller
{
    public function principal()
    {
        // $model = new Morador();
        // $moradores = Morador::all()->toArray();
    	return view('sistema.morador.principal');
    }

    public function form()
    {
        return view('sistema.morador.form');
    }

    public function inserir()
    {

    }
}
