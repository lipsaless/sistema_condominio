<?php

namespace App\Http\Controllers;

use App\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function principal()
    {
        return view('sistema.reserva.principal');
    }

    public function form()
    {
        return view('sistema.reserva.form');
    }

    public function gravar()
    {
       
    }
}
