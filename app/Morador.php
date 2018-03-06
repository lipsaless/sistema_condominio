<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Morador extends Model
{
    protected $table = 'morador';
    protected $primary = 'id_morador';

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('usuario', 'morador.id_usuario', 'usuario.id_usuario');
        $query->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento');
        $query->join('morador_tipo', 'morador_tipo.id_morador_tipo', 'morador.id_morador_tipo');
        $query->whereNull('dt_fim');

        $query->orderBy('dt_inicio');

        return $query->get();
    }

    public function salvar($allParams)
    {
        $allParams['id_usuario'];
        dd($allParams);
    }
}
