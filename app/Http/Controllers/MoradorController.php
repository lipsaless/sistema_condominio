<?php

namespace App\Http\Controllers;

use App\Morador;
use Illuminate\Http\Request;

class MoradorController extends Controller
{
    public function index()
    {
    	$moradores = Morador::all();
        return view('morador.morador')->with("Moradores", $moradores);
    }
}
