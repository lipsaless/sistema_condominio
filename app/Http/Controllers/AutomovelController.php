<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;

use App\Model\Morador;
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

        $automoveis = Automovel::all()->toArray();
        $apartamentos = $modelApartamento->getAll();
        $blocos = $modelBloco->getAll();

        return view('sistema.automovel.principal', ['apartamentos' => $apartamentos, 'blocos' => $blocos]);
    }

    public function form()
    {
        $model = new Automovel();
        $modelMorador = new Morador();
        $modelApartamento = new Apartamento;

        $obj = $model;

        $moradores = Automovel::all()->toArray();
        $apartamentos = $modelApartamento->getAll();

        $listaMoradores = '';

        return view('sistema.automovel.form', ['obj' => $obj, 'apartamentos' => $apartamentos, 'listaMoradores' => $listaMoradores]);
    }

    public function grid()
    {
        $model = new Automovel;
        return $model->getAll();
    }

    public function listaMoradoresPorApt(Request $request)
    {
        $model = new Apartamento;

        $idApt = $request->input('id_apartamento');
        
        $listaMoradores = $model->moradorPorApartamento($idApt);

        return response()->json($listaMoradores);
    }

    public function editar($id)
    {
        $model = new Automovel;
        $modelMorador = new Morador;
        $modelApartamento = new Apartamento;

        $obj = $model->find($id);

        $listaMoradores = $modelApartamento->moradorPorApartamento($obj->id_apartamento);
        
        return view('sistema.automovel.form', ['obj' => $obj, 'listaMoradores' => $listaMoradores]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new Automovel;

        if (!empty($params['id_automovel'])) {
            $model = $model->find($params['id_automovel']);
        } else {
            unset($params['id_automovel']);
        }

        $model->fill($params);

        $model->limparDados();
        
        $model->save();

        return response()->json(['type' => 'success', 'msg' => 'Automóvel salvo com sucesso']);
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
