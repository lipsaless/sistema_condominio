<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    protected $table = 'usuarios';
    protected $primary = 'id_usuario';

    public function getAll($allParams = null)
    {
        $query = $this->newQuery();
        $query->join('morador', 'morador.id_usuario', 'usuarios.id_usuario');
        $query->join('funcionario', 'funcionario.id_usuario', 'usuarios.id_usuario');
        $query->whereNull('dt_fim');

        $query->orderBy('dt_inicio');
    }
}
