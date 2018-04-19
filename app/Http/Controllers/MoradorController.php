<?php

namespace App\Http\Controllers;

use App\Morador;
use App\MoradorTipo;
use App\Bloco;
use App\Apartamento;
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
        $modelApartamento = new Apartamento;
        $modelBloco = new Bloco;

        $blocos = $modelBloco->getAll();
        $apartamentos = $modelApartamento->getAll();
        $moradores = Morador::all()->toArray();

    	return view('sistema.morador.principal', ['blocos' => $blocos, 'apartamentos' => $apartamentos]);
    }

    public function form()
    {
        $modelTipo = new MoradorTipo;
        $modelApartamento = new Apartamento;
        
        $tipos = $modelTipo->getAll();
        $apartamentos = $modelApartamento->getAll();

        $sexoMorador = ['Masculino', 'Feminino'];
        $sexo =  $sexoMorador;

        return view('sistema.morador.form', ['tipos' => $tipos, 'apartamentos' => $apartamentos, 'sexo' => $sexo]);
    }

    public function gravar(Request $request)
    {
        $model = new Morador($request->all());
        $model->limparDados();

       $model->save();

        if ($model) {
            echo 'inserido com sucesso';
        } else {
            echo 'falha ao inserir';
        }
    }

    public function grid()
    {
        $model = new Morador;
        return $model->getAll();
    }

    public function editar($id)
    {
        $model = new Morador;
        $modelTipo = new MoradorTipo;
        $modelApartamento = new Apartamento;

        $sexoMorador = ['Masculino', 'Feminino'];
        $sexo =  $sexoMorador;

        $obj = $model->find($id);
        $tipos = $modelTipo->getAll();
        $apartamentos = $modelApartamento->getAll();

        return view('sistema.morador.form', ['tipos' => $tipos, 'obj' => $obj, 'apartamentos' => $apartamentos, 'sexo' => $sexo]);
    }
    public function excluir($id)
    {
        $model = new Morador;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $obj->update();
        
        return response([]);
    }
}
