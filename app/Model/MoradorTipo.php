<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MoradorTipo extends Model
{
    protected $guarded = [];
    protected $table = 'morador_tipo';
    protected $primaryKey = 'id_morador_tipo';

    public function getAll()
    {
        $query = $this->newQuery();
        $query->whereNull('dt_fim');
        $query->orderBy('dt_inicio');

        return $query->get();
    }
}
