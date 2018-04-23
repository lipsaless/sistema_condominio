<?php

namespace App\Http\Controllers;

use App\Model\Automovel;
use App\Model\Apartamento;
use App\Model\Bloco;
use Illuminate\Http\Request;

class AutomovelController extends Controller
{
    public function principal()
    {
        $model = new Automovel();
        $modelApartamento = new Apartamento;
        $modelBloco = new Bloco;

        $moradores = Automovel::all()->toArray();
        $apartamentos = $modelApartamento->getAll();
        $blocos = $modelBloco->getAll();

        return view('sistema.automovel.principal', ['apartamentos' => $apartamentos, 'blocos' => $blocos]);
    }

    public function form()
    {
        $model = new Automovel();
        $modelApartamento = new Apartamento;

        $moradores = Automovel::all()->toArray();
        $apartamentos = $modelApartamento->getAll();

        return view('sistema.automovel.form', ['apartamentos' => $apartamentos]);
    }

    public function gravar(Request $request)
    {
        $model = new Automovel($request->all());
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
        $model = new Automovel;
        return $model->getAll();
    }

    public function editar($id)
    {
        $model = new Automovel;
        $modelApartamento = new Apartamento;

        $obj = $model->find($id);
        $apartamentos = $modelApartamento->getAll();

        return view('sistema.automovel.form', ['obj' => $obj, 'apartamentos' => $apartamentos,]);
    }
    public function excluir($id)
    {
        $model = new Automovel;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $obj->update();
        
        return response([]);
    }

}
