<?php

namespace App\Http\Controllers;

use App\Automovel;
use Illuminate\Http\Request;

class AutomovelController extends Controller
{
    public function principal()
    {
        return view('sistema.automovel.principal');
    }

    public function form()
    {
        return view('sistema.automovel.form');
    }

    public function gravar()
    {
       
    }
}
