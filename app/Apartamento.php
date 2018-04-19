<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    protected $table = 'apartamento';
    protected $primary = 'id_apartamento';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('bloco', 'bloco.id_bloco', 'apartamento.id_bloco');
        $query->whereNull('apartamento.dt_fim');

        $query->orderBy('apartamento.dt_inicio');

        return $query->get();
    }
}
