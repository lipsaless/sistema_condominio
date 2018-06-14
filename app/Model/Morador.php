<?php

namespace App\Model;

use DB; 
use App\Model\BaseModel;

class Morador extends BaseModel
{
    protected $guarded = [];
    protected $table = 'morador';
    protected $primaryKey = 'id_morador';

    public function getAll($allParams = null, $fetchRow = false)
    {
        $query = $this->newQuery();
        $query->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento');
        $query->join('bloco', 'bloco.id_bloco', 'apartamento.id_bloco');
        $query->join('morador_tipo', 'morador_tipo.id_morador_tipo', 'morador.id_morador_tipo');
        $query->select('morador.*','apartamento.*','morador_tipo.*', 'bloco.*');
        
        if (!empty($allParams['id_morador'])) {
            $query->where('morador.id_morador', $allParams['id_morador']);
        } else {
            $query->whereNull('morador.dt_fim');

            if (!empty($allParams['no_morador'])) {
                $query->where('morador.no_morador','ILIKE', '%'.$allParams['no_morador'].'%');
            }
        }

        if ($fetchRow) {
            return $query->first();
        }

        $query->orderBy('morador.dt_inicio');

        return $query->get();
    }

    public function limparDados()
    {
        $this->nu_cpf_morador = str_replace('.','', $this->nu_cpf_morador);
        $this->nu_cpf_morador = str_replace('-','', $this->nu_cpf_morador);
        $this->nu_rg_morador = str_replace('.','', $this->nu_rg_morador);

        if ($this->nu_telefone_morador) {
            $this->nu_telefone_morador = str_replace('(','', $this->nu_telefone_morador);
            $this->nu_telefone_morador = str_replace(')','', $this->nu_telefone_morador);
            $this->nu_telefone_morador = str_replace('-','', $this->nu_telefone_morador);
        }

        if ($this->nu_celular_morador) {
            $this->nu_celular_morador = str_replace('(','', $this->nu_celular_morador);
            $this->nu_celular_morador = str_replace(')','', $this->nu_celular_morador);
            $this->nu_celular_morador = str_replace('.','', $this->nu_celular_morador);
            $this->nu_celular_morador = str_replace('-','', $this->nu_celular_morador);
        }

        $this->dt_nascimento_morador = str_replace('/','-', $this->dt_nascimento_morador);
        $this->sg_sexo_morador = str_replace(' ','', $this->sg_sexo_morador);
    }

    public function countMorador()
    {
        $moradores = DB::table('morador')->whereNull('morador.dt_fim')->count();
        return $moradores;
    }

    public function getExMorador()
    {
        $moradores = DB::table('morador')->whereNotNull('morador.dt_fim')
        ->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento')
        ->join('bloco', 'bloco.id_bloco', 'apartamento.id_bloco')
        ->join('morador_tipo', 'morador_tipo.id_morador_tipo', 'morador.id_morador_tipo')
        ->select('morador.*','apartamento.*','morador_tipo.*', 'bloco.*')
        ->whereNotNull('morador.dt_fim'); 
        return $moradores->get();
    }

    public function findExMorador($idExMorador) 
    {
        return $this->newQuery()
            ->where('morador.id_morador', $idExMorador)
            ->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento')
            ->whereNotNull('morador.dt_fim')
            ->first();
    }
}
