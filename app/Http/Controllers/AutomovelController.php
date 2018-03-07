<?php

namespace App\Http\Controllers;

use App\Automovel;
use Illuminate\Http\Request;

class AutomovelController extends Controller
{
    public function principal()
    {
        $model = new Automovel();
        $moradores = Automovel::all()->toArray();
        return view('sistema.automovel.principal');
    }

    public function form()
    {
        $model = new Automovel();
        $moradores = Automovel::all()->toArray();
        return view('sistema.automovel.form');
    }

    public function gravar(Request $request)
    {
        $dados = $request->all();
        dd($dados);
        // $dados->salvar();
    
        if ($inserir) {
            echo 'inserido com sucesso!';
        } else {
            echo 'falha ao inserir';
        }
    }
}
