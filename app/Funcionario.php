<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    protected $primary = 'id_funcionario';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->whereNull('dt_fim');

        $query->orderBy('dt_inicio');

        return $query->get();
    }
}
