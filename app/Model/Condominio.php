<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    protected $table = 'condominio';
    protected $primary = 'id_condominio';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->whereNull('dt_fim');

        $query->orderBy('dt_inicio');

        return $query->get();
    }
}
