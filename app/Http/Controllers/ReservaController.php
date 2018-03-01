<?php

namespace App\Http\Controllers;

use App\Reserva;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    public function principal()
    {
        $model = new Reserva();
        $moradores = Reserva::all()->toArray();
        return view('sistema.reserva.principal');
    }

    public function form()
    {
        $model = new Reserva();
        $moradores = Reserva::all()->toArray();
        return view('sistema.reserva.form');
    }
}
