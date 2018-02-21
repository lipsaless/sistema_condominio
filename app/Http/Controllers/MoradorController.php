<?php

namespace App\Http\Controllers;

use App\Morador;
use Illuminate\Http\Request;

class MoradorController extends Controller
{
    public function index()
    {
    	$morador = Morador::all();   
        return $morador;
    }
}
