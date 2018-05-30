<?php

namespace App\Model;

use DB; 
use App\Model\BaseModel;

class Automovel extends BaseModel
{
    protected $table = 'automovel';
    protected $primaryKey = 'id_automovel';
    protected $guarded = [];

    public function getAll($allParams = false, $fetchRow = false)
    {
        $query = $this->newQuery();
        $query->join('morador', 'morador.id_morador', 'automovel.id_morador');
        $query->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento');
        $query->join('bloco', 'bloco.id_bloco', 'apartamento.id_bloco');
        $query->select('automovel.*','morador.*', 'apartamento.*', 'bloco.*');
        $query->whereNull('automovel.dt_fim');
        $query->orderBy('automovel.dt_inicio');

        if (!empty($allParams['id_automovel'])) {
            $query->where('automovel.id_automovel', $allParams['id_automovel']);
        }

        if ($fetchRow) {
            return $query->first();
        }

        return $query->get();
    }

    public function find($id)
    {
        return $this->getAll(['id_automovel' => $id], true);
    }

    public function limparDados()
    {
        $this->nu_placa = str_replace('-','', $this->nu_placa);
    }

    public function countAutomoveis()
    {
        $automoveis = DB::table('automovel')->whereNull('automovel.dt_fim')->count();
        return $automoveis;
    }
}
