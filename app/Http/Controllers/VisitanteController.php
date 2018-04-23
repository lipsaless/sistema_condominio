<?php

namespace App\Http\Controllers;

use App\Model\Visitante;
use App\Model\VisitanteTipo;
use Illuminate\Http\Request;

class VisitanteController extends Controller
{
    public function principal()
    {
        $model = new Visitante();
        $moradores = Visitante::all()->toArray();
        return view('sistema.visitante.principal');
    }

    public function form()
    {
        $model = new Visitante();
        $moradores = Visitante::all()->toArray();
        return view('sistema.visitante.form');
    }

    public function gravar(Request $request)
    {
        $model = new Visitante($request->all());
        $model->limparDados();

       $model->save();

        if ($model) {
            echo 'inserido com sucesso';
        } else {
            echo 'falha ao inserir';
        }
    }

    public function grid()
    {
        $model = new Visitante;
        return $model->getAll();
    }
}
