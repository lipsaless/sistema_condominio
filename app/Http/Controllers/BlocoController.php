<?php

namespace App\Http\Controllers;

use App\Bloco;
use Illuminate\Http\Request;

class BlocoController extends Controller
{
    public function principal()
    {
        $model = new Bloco();
        $moradores = Bloco::all()->toArray();
        return view('sistema.bloco.principal');
    }

    public function form()
    {
        $model = new Bloco();
        $moradores = Bloco::all()->toArray();
        return view('sistema.bloco.form');
    }

    public function gravar()
    {
       
    }
}
