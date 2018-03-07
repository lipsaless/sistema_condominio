<?php

namespace App\Http\Controllers;

use App\Morador;
use Illuminate\Http\Request;

class MoradorController extends Controller
{
    private $morador;

    public function __construct(Request $morador)
    {
        $this->morador = $morador;
    }

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
        $dados = $request->all()->except('_token');
        Morador::create($dados);

        // $model = new Morador;
        // $model->no_morador = $request->input('no_morador'); // Vem do Form
        // $model->no_apartamento = $request->input('no_apartamento'); // Vem do Form
        // $model->no_morador_tipo = $request->input('no_morador_tipo'); // Vem do Form
        // $model->nu_morador_telefone = $request->input('nu_morador_telefone'); // Vem do Form
        // $model->nu_celular_morador = $request->input('nu_celular_morador'); // Vem do Form
        // $model->nu_rg_morador = $request->input('nu_rg_morador'); // Vem do Form
        // $model->dt_nascimento_morador = $request->input('dt_nascimento_morador'); // Vem do Form
        // $model->ds_email_morador = $request->input('ds_email_morador'); // Vem do Form
        
        // $inserir = $model->save();

        // if ($inserir) {
        //     echo 'inserido com sucesso';
        // } else {
        //     echo 'falha ao inserir';
        // }
    }
}
