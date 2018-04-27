<?php

namespace App\Http\Controllers;

use App\Model\Apartamento;
use App\Model\Bloco;
use App\Model\Morador;
use App\Model\MoradorTipo;
use Illuminate\Http\Request;

class ExMoradorController extends Controller
{
    public function principal()
    {
        $model = new Morador();
        $modelBloco = new Bloco();
        $modelApartamento = new Apartamento();

        $blocos = $modelBloco->getAll();
        $apartamentos = $modelApartamento->getAll();
        
    	return view('sistema.ex-morador.principal', ['blocos' => $blocos, 'apartamentos' => $apartamentos]);
    }

    public function grid()
    {
        $model = new Morador;
        return $model->getExMorador();
        dd($model);
    }

    public function recuperar($id)
    {
        $model = new Morador;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('');
        $obj->update();

        return response([]);
    }
}
