<?php

namespace App\Http\Controllers;

use App\Morador;
use Illuminate\Http\Request;

class MoradorController extends Controller
{
    public function principal()
    {
    	$moradores = Morador::all();
        return view('morador.morador')->with("Moradores", $moradores);
    }

    public function form()
    {
        return view('sistema.morador.form');
    }

    public function inserir()
    {
       $model = new Morador();

    }
}
