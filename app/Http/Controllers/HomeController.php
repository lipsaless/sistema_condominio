<?php

namespace App\Http\Controllers;

use Session;
use App\Model\Morador;
use App\Model\Automovel;
use App\Model\Funcionario;
use App\Model\Reserva;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function principal()
    {
        dd($_SESSION['usuario']);
        $modelMorador = new Morador;
        $modelAutomovel = new Automovel;
        $modelFuncionario = new Funcionario;
        $modelReserva = new Reserva;

        //contagem de moradores cadastrados
        $contagemMoradores = $modelMorador->countMorador();
        $contagemAutomoveis = $modelAutomovel->countAutomoveis();
        $contagemFuncionarios = $modelFuncionario->countFuncionarios();
        $contagemReservas = $modelReserva->countReservas();

        return view('sistema.home.home', [
            'contagemMorador' => $contagemMoradores,
            'contagemAutomovel' => $contagemAutomoveis,
            'contagemFuncionario' => $contagemFuncionarios,
            'contagemReserva' => $contagemReservas
            ]
        );
    }
}
