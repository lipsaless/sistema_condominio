<?php

namespace App\Http\Controllers;

use App\Model\Morador;
use App\Model\Automovel;
use App\Model\Funcionario;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function principal()
    {
        $modelMorador = new Morador;
        $modelAutomovel = new Automovel;
        $modelFuncionario = new Funcionario;

        //contagem de moradores cadastrados
        $contagemMoradores = $modelMorador->countMorador();
        $contagemAutomoveis = $modelAutomovel->countAutomoveis();
        $contagemFuncionarios = $modelFuncionario->countFuncionarios();

        return view('sistema.home.home', ['contagemMorador' => $contagemMoradores, 'contagemAutomovel' => $contagemAutomoveis, 'contagemFuncionario' => $contagemFuncionarios]);
    }
}
