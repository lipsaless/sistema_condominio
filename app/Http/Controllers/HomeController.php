<?php

namespace App\Http\Controllers;

use App\Model\Morador;
use App\Model\Automovel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function principal()
    {
        $model = new Morador;

        //contagem de moradores cadastrados
        $contagemMoradores = $model->countMorador();

        return view('sistema.home.home', ['contagemMorador' => $contagemMoradores]);
    }
}
