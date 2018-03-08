<?php

namespace App\Http\Controllers;

use App\Morador;
use App\MoradorTipo;
use Illuminate\Http\Request;

class MoradorController extends Controller
{
    private $morador;
    protected $primaryKey = 'id_usuario';

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
        $modelTipo = new MoradorTipo;
        $tipos = $modelTipo->getAll();
        return view('sistema.morador.form', ['tipos' => $tipos]);
    }

    public function gravar(Request $request)
    {
        $model = new Morador($request->all());
        $inserir = $model->save();

        if ($inserir) {
            echo 'inserido com sucesso';
        } else {
            echo 'falha ao inserir';
        }
    }
}
