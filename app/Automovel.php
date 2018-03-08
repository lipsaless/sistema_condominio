<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $table = 'automovel';
    protected $primary = 'id_automovel';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('morador', 'morador.id_morador', 'automovel.id_morador');
        $query->whereNull('dt_fim');

        $query->orderBy('dt_inicio');

        return $query->get();
    }

    public function salvar($allParams)
    {
        $id = $allParams['id_automovel'];

        if ($id == null) {
            $id->insert($allParams);
        }
    }
}
