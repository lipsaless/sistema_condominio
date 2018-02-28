<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bloco extends Model
{
    protected $table = 'bloco';
    protected $primary = 'id_bloco';

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('condominio', 'condominio.id_condominio', 'bloco.id_condominio');
        $query->whereNull('dt_fim');

        $query->orderBy('dt_inicio');

        return $query->get();
    }
}
