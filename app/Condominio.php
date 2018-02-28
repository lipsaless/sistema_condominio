<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    protected $table = 'condominio';
    protected $primary = 'id_condominio';

    public function getAll()
    {
        $query = $this->newQuery();
        $query->whereNull('dt_fim');

        $query->orderBy('dt_inicio');

        return $query->get();
    }
}
