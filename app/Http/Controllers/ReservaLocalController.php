<?php

namespace App\Http\Controllers;

use App\ReservaLocal;
use Illuminate\Http\Request;

class ReservaLocalController extends Controller
{
    public function principal()
    {
        return view('sistema.reserva-local.principal');
    }

    public function form()
    {
        return view('sistema.reserva-local.form');
    }

    public function gravar(Request $request)
    {
        $model = new ReservaLocal($request->all());
        $model->limparDados();

       $model->save();

        if ($model) {
            echo 'inserido com sucesso';
        } else {
            echo 'falha ao inserir';
        }
    }
}
