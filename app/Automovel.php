<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $table = 'automovel';
    protected $primary = 'id_automovel';

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('morador', 'morador.id_morador', 'automovel.id_morador');
        $query->whereNull('dt_fim');

        $query->orderBy('dt_inicio');

        return $query->get();
    }
}
