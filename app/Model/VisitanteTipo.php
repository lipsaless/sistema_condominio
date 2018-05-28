<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class VisitanteTipo extends Model
{
    protected $table = 'visitante_tipo';
    protected $primaryKey = 'id_visitante_tipo';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->select('visitante_tipo.*');
        $query->whereNull('visitante_tipo.dt_fim');

        $query->orderBy('visitante_tipo.dt_inicio');

        return $query->get();
    }
}
