<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Automovel extends Model
{
    protected $table = 'automovel';
    protected $primaryKey = 'id_automovel';
    protected $guarded = [];

    public function getAll($allParams = false)
    {
        $query = $this->newQuery();
        $query->join('morador', 'morador.id_morador', 'automovel.id_morador');
        $query->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento');
        $query->join('bloco', 'bloco.id_bloco', 'apartamento.id_bloco');
        $query->select('automovel.*','morador.*', 'apartamento.*', 'bloco.*');
        $query->whereNull('automovel.dt_fim');
        $query->orderBy('automovel.dt_inicio');

        return $query->get();
    }

    public function limparDados()
    {
        $this->nu_placa = str_replace('-','', $this->nu_placa);
    }

    public function donoAutomovel($idMorador)
    {
        $sql = " SELECT m.no_morador";
        $sql .= " FROM morador m";
        $sql .= " INNER JOIN automovel a ON a.id_morador = m.id_morador";
        $sql .= " WHERE m.id_morador = {$idMorador}";

        return $sql->get();
    }
}
