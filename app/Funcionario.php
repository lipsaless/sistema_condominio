<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    protected $primary = 'id_funcionario';

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('usuario', 'usuario.id_usuario', 'funcionario.id_usuario');
        $query->whereNull('dt_fim');

        $query->orderBy('dt_inicio');

        return $query->get();
    }
}
