<?php

namespace App\Http\Controllers;

use Session;
use App\Model\Morador;
use App\Model\MoradorTipo;
use App\Model\Bloco;
use App\Model\Apartamento;
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
        $title = 'Morador';

        $model = new Morador();
        $modelApartamento = new Apartamento;
        $modelBloco = new Bloco;

        $blocos = $modelBloco->getAll();
        $apartamentos = $modelApartamento->getAll();
        $moradores = Morador::all()->toArray();

    	return view('sistema.morador.principal', ['title' => $title, 'blocos' => $blocos, 'apartamentos' => $apartamentos]);
    }

    public function form()
    {
        $title = 'Cadastro de Morador';

        $model = new Morador;
        $modelTipo = new MoradorTipo;
        $modelApartamento = new Apartamento;
        
        $tipos = $modelTipo->getAll();
        $apartamentos = $modelApartamento->getAll();

        $obj = $model;
        $sexoMorador = ['Masculino', 'Feminino'];
        $sexo =  $sexoMorador;

        return view('sistema.morador.form', ['title' => $title, 'tipos' => $tipos, 'obj' => $obj, 'apartamentos' => $apartamentos, 'sexo' => $sexo]);
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

        return view('sistema.morador.form', ['tipos' => $tipos, 'obj' => $obj, 'apartamentos' =>$apartamentos, 'sexo' => $sexo]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new Morador;

        if (!empty($params['id_morador'])) {
            $model = $model->find($params['id_morador']);
        } else {
            unset($params['id_morador']);
        }

        $model->fill($params);
        
        $model->limparDados();
        
        $salvou = $model->save();

        if ($salvou) {
            return json_encode(['type' => 'success', 'msg' => 'Cadastro efetuado com sucesso.']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar cadastrar morador.']);
        }
    }

    public function excluir($id)
    {
        $model = new Morador;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $excluir = $obj->update();

        if ($excluir) {
            return json_encode(['type' => 'success', 'msg' => 'Morador excluído com sucesso.']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar excluir morador.']);
        }

        return response([]);
    }
}
