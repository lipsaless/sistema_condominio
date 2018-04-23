<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animal';
    protected $primary = 'id_animal';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('morador', 'morador.id_morador', 'animal.id_morador');
        $query->join('animal_tipo', 'animal_tipo.id_animal_tipo', 'animal.id_animal_tipo');
        $query->select('animal.*','animal_tipo.id_animal_tipo', 'animal_tipo.no_animal_tipo', 'morador.*');
        $query->whereNull('animal.dt_fim');

        $query->orderBy('animal.dt_inicio');

        return $query->get();
    }
}
