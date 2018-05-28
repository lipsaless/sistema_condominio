<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Visitante extends Model
{
    protected $table = 'visitante';
    protected $primaryKey = 'id_visitante';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('visitante_tipo', 'visitante_tipo.id_visitante_tipo', 'visitante_tipo.id_visitante_tipo');
        $query->select('visitante.*', 'visitante_tipo.*');
        $query->whereNull('visitante.dt_fim');

        $query->orderBy('visitante.dt_inicio');

        return $query->get();
    }
}