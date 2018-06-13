<?php

namespace App\Model;

use DB; 
use App\Model\BaseModel;

class Visitante extends BaseModel
{
    protected $table = 'visitante';
    protected $primaryKey = 'id_visitante';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->join('visitante_tipo', 'visitante_tipo.id_visitante_tipo', 'visitante.id_visitante_tipo');
        $query->join('morador', 'morador.id_morador', 'visitante.id_morador');
        $query->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento');
        $query->select('visitante.*', 'visitante_tipo.*', 'morador.*', 'apartamento.*');
        $query->whereNull('visitante.dt_fim');

        $query->orderBy('visitante.dt_inicio');

        return $query->get();
    }

    public function limparDados()
    {
        if ($this->nu_cpf) {
            $this->nu_cpf = str_replace('.','', $this->nu_cpf);
            $this->nu_cpf = str_replace('-','', $this->nu_cpf);
        }

        if ($this->nu_telefone) {
            $this->nu_telefone = str_replace('(','', $this->nu_telefone);
            $this->nu_telefone = str_replace(')','', $this->nu_telefone);
            $this->nu_telefone = str_replace('-','', $this->nu_telefone);
        }

        if ($this->nu_celular) {
            $this->nu_celular = str_replace('(','', $this->nu_celular);
            $this->nu_celular = str_replace(')','', $this->nu_celular);
            $this->nu_celular = str_replace('.','', $this->nu_celular);
            $this->nu_celular = str_replace('-','', $this->nu_celular);
        }
    }

    public function countVisitante()
    {
        $visitantes = DB::table('visitante')->whereNull('visitante.dt_fim')->count();
        return $visitantes;
    }

    public function findVisitante($idVisitante) 
    {
        return $this->newQuery()
            ->where('visitante.id_visitante', $idVisitante)
            ->join('morador', 'morador.id_morador', 'visitante.id_morador')
            ->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento')
            ->whereNull('visitante.dt_fim')
            ->first();
    }
}