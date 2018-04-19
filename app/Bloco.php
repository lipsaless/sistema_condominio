<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloco extends Model
{
    protected $table = 'bloco';
    protected $primary = 'id_bloco';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('condominio', 'condominio.id_condominio', 'bloco.id_condominio');
        $query->select('bloco.*', 'condominio.*');
        $query->whereNull('bloco.dt_fim');

        $query->orderBy('bloco.dt_inicio');

        return $query->get();
    }
}
