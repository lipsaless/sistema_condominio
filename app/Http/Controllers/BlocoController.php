<?php

namespace App\Http\Controllers;

use App\Bloco;
use Illuminate\Http\Request;

class BlocoController extends Controller
{
    public function principal()
    {
        return view('sistema.bloco.principal');
    }

    public function form()
    {
        return view('sistema.bloco.form');
    }

    public function gravar()
    {
       
    }
}
