<?php

namespace App\Model;

use App\Model\BaseModel;

class Apartamento extends BaseModel
{
    protected $table = 'apartamento';
    protected $primaryKey = 'id_apartamento';
    protected $guarded = [];

    public function getAll($allParams = null, $fetchRow = false)
    {
        $query = $this->newQuery();
        $query->join('bloco', 'bloco.id_bloco', 'apartamento.id_bloco');
        $query->select('apartamento.*','bloco.*');

        $query->orderBy('apartamento.id_bloco','ASC','apartamento.no_apartamento', 'ASC');

        if (!empty($allParams['id_apartamento'])) {
            $query->where('apartamento.id_apartamento', $allParams['id_apartamento']);
        } else {
            $query->whereNull('apartamento.dt_fim');
        }

        if ($fetchRow) {
            return $query->first();
        }

        return $query->get();
    }

    public function moradorPorApartamento($idApt)
    {
        $query = $this->newQuery();
        $query->join('morador', 'morador.id_apartamento', 'apartamento.id_apartamento');
        $query->where('apartamento.id_apartamento', '=', $idApt);
        $query->whereNull('morador.dt_fim');
        
        $query->orderBy('morador.no_morador');

        return $query->get();
    }
}
