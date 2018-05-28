<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AnimalTipo extends Model
{
    protected $table = 'animal_tipo';
    protected $primaryKey = 'id_animal_tipo';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->whereNull('dt_fim');

        $query->orderBy('dt_inicio');

        return $query->get();
    }
}
