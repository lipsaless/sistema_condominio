<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    protected $table = 'apartamento';
    protected $primary = 'id_apartamento';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('bloco', 'bloco.id_bloco', 'apartamento.id_bloco');
        $query->select('apartamento.*','bloco.*');
        $query->whereNull('apartamento.dt_fim');

        $query->orderBy('apartamento.no_apartamento');

        return $query->get();
    }

    public function moradorPorApartamento($idApt)
    {
        $query = $this->newQuery();
        $query->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento');
        $query->where('apartamento.id_apt', '=', $idApt);
        
        $query->orderBy('morador.no_morador');

        return $query->get();
    }
}
