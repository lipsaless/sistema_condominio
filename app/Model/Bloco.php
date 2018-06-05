<?php

namespace App\Model;

use App\Model\BaseModel;

class Bloco extends BaseModel
{
    protected $table = 'bloco';
    protected $primaryKey = 'id_bloco';
    protected $guarded = [];

    public function getAll($allParams = null, $fetchRow = false)
    {
        $query = $this->newQuery();
        $query->join('condominio', 'condominio.id_condominio', 'bloco.id_condominio');
        $query->whereNull('bloco.dt_fim');

        if (!empty($allParams['id_bloco'])) {
            $query->where('bloco.id_bloco', $allParams['id_bloco']);
        } else {
            $query->whereNull('bloco.dt_fim');
        }

        if ($fetchRow) {
            return $query->first();
        }

        $query->orderBy('bloco.dt_inicio');

        return $query->get();
    }

    public function save(array $options = []) 
    {
        $model = new Condominio;

        $condominio = $model->first();
        $this->id_condominio = $condominio->id_condominio;

        return parent::save($options);
    }
}
