<?php

namespace App\Http\Controllers;

use App\Reserva;
use App\ReservaLocal;
use App\Apartamento;
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

    public function gravar(Request $request)
    {
        $model = new Reserva($request->all());
        $model->limparDados();

       $model->save();

        if ($model) {
            echo 'inserido com sucesso';
        } else {
            echo 'falha ao inserir';
        }
    }
}
