<?php

namespace App\Http\Controllers;

use App\Morador;
use App\Usuarios;
use Illuminate\Http\Request;

class MoradorController extends Controller
{
    public function principal()
    {
        $model = new Morador();
        $moradores = Morador::all()->toArray();
    	return view('sistema.morador.principal');
    }

    public function form()
    {
        $model = new Morador();
        $moradores = Morador::all()->toArray();
        return view('sistema.morador.form');
    }

    public function gravar(Request $request)
    {
        $model = new Morador;
        $model->no_morador = $request->input('no_morador'); // Vem do Form
        $model->id_apartamento = $request->input('no_email'); // Vem do Form
        $model->no_apartamento = $request->input('no_email'); // Vem do Form
        $model->nu_telefone = $request->input('nu_telefone'); // Vem do Form

        $model->salvar();
    }
}
