<?php

namespace App\Model;

use App\Model\BaseModel;

class Animal extends BaseModel
{
    protected $table = 'animal';
    protected $primaryKey = 'id_animal';
    protected $guarded = [];

    public function getAll($allParams = false, $fetchRow = null)
    {
        $query = $this->newQuery();
        $query->join('morador', 'morador.id_morador', 'animal.id_morador');
        $query->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento');
        $query->join('bloco', 'bloco.id_bloco', 'apartamento.id_bloco');
        $query->join('animal_tipo', 'animal_tipo.id_animal_tipo', 'animal.id_animal_tipo');
        $query->select('animal.*','morador.*','animal_tipo.*', 'apartamento.*', 'bloco.*');
        $query->whereNull('animal.dt_fim');

        if (!empty($allParams['id_animal'])) {
            $query->where('animal.id_animal', $allParams['id_animal']);
        }

        if ($fetchRow) {
            return $query->first();
        }

        $query->orderBy('animal.dt_inicio');

        return $query->get();
    }
}
