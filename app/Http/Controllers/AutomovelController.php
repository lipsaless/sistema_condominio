<?php

namespace App\Http\Controllers;

use App\Automovel;
use App\Apartamento;
use App\Bloco;
use Illuminate\Http\Request;

class AutomovelController extends Controller
{
    public function principal()
    {
        $model = new Automovel();
        $modelApartamento = new Apartamento;
        $modelBloco = new Bloco;

        $moradores = Automovel::all()->toArray();
        $apartamentos = $modelApartamento->getAll();
        $blocos = $modelBloco->getAll();

        return view('sistema.automovel.principal', ['apartamentos' => $apartamentos, 'blocos' => $blocos]);
    }

    public function form()
    {
        $model = new Automovel();
        $modelApartamento = new Apartamento;

        $moradores = Automovel::all()->toArray();
        $apartamentos = $modelApartamento->getAll();

        return view('sistema.automovel.form', ['apartamentos' => $apartamentos]);
    }

    public function gravar(Request $request)
    {
        $model = new Automovel($request->all());
        $model->limparDados();

       $model->save();

        if ($model) {
            echo 'inserido com sucesso';
        } else {
            echo 'falha ao inserir';
        }
    }

}
