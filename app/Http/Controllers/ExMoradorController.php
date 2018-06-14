<?php

namespace App\Http\Controllers;

use App\Model\Apartamento;
use App\Model\Bloco;
use App\Model\Morador;
use App\Model\ExMorador;
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
    }

    public function recuperar($id)
    {
        $sql = "UPDATE morador SET dt_fim = null WHERE id_morador = {$id}";

        $recuperou = \DB::statement($sql);

        if ($recuperou) {
            return json_encode(['type' => 'success', 'msg' => 'Morador realocado com sucesso.']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar realocar morador.']);
        }
        
        return response([]);
    }
}
