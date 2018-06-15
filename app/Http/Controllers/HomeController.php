<?php

namespace App\Http\Controllers;

use Session;
use App\Model\Morador;
use App\Model\Automovel;
use App\Model\Funcionario;
use App\Model\Reserva;
use App\Model\Visitante;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function principal()
    {
        $modelMorador = new Morador;
        $modelAutomovel = new Automovel;
        $modelFuncionario = new Funcionario;
        $modelReserva = new Reserva;
        $modelVisitante = new Visitante;

        //contagem de moradores cadastrados
        $contagemMoradores = $modelMorador->countMorador();
        $contagemAutomoveis = $modelAutomovel->countAutomoveis();
        $contagemFuncionarios = $modelFuncionario->countFuncionarios();
        $contagemReservas = $modelReserva->countReservas();
        $contagemVisitantes = $modelVisitante->countVisitante();

        return view('sistema.home.home', [
            'contagemMorador' => $contagemMoradores,
            'contagemAutomovel' => $contagemAutomoveis,
            'contagemFuncionario' => $contagemFuncionarios,
            'contagemReserva' => $contagemReservas,
            'contagemVisitante' => $contagemVisitantes
            ]
        );
    }
}
