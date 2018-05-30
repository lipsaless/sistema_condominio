<?php

namespace App\Model;

use App\Model\BaseModel;

class Visitante extends BaseModel
{
    protected $table = 'visitante';
    protected $primaryKey = 'id_visitante';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('visitante_tipo', 'visitante_tipo.id_visitante_tipo', 'visitante_tipo.id_visitante_tipo');
        $query->join('morador', 'morador.id_morador', 'visitante.id_morador');
        $query->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento');
        $query->select('visitante.*', 'visitante_tipo.*', 'morador.*', 'apartamento.*');
        $query->whereNull('visitante.dt_fim');

        $query->orderBy('visitante.dt_inicio');

        return $query->get();
    }

    public function limparDados()
    {
        $this->nu_cpf = str_replace('.','', $this->nu_cpf);
        $this->nu_cpf = str_replace('-','', $this->nu_cpf);
        $this->nu_rg = str_replace('.','', $this->nu_rg);
        $this->nu_telefone = str_replace('(','', $this->nu_telefone);
        $this->nu_telefone = str_replace(')','', $this->nu_telefone);
        $this->nu_telefone = str_replace('-','', $this->nu_telefone);
        $this->nu_celular = str_replace('(','', $this->nu_celular);
        $this->nu_celular = str_replace(')','', $this->nu_celular);
        $this->nu_celular = str_replace('.','', $this->nu_celular);
        $this->nu_celular = str_replace('-','', $this->nu_celular);
    }
}