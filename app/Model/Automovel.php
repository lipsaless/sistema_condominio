<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $table = 'automovel';
    protected $primary = 'id_automovel';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('morador', 'morador.id_morador', 'automovel.id_morador');
        $query->select('automovel.*','apartamento.*','morador.*');
        $query->whereNull('automovel.dt_fim');
        $query->orderBy('automovel.dt_inicio');

        return $query->get();
    }

    public function limparDados()
    {
        $this->nu_placa = str_replace('-','', $this->nu_placa);
    }
}
