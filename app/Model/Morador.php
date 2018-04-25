<?php

namespace App\Model;

use DB; 
use Illuminate\Database\Eloquent\Model;

class Morador extends Model
{
    protected $guarded = [];
    protected $table = 'morador';
    protected $primaryKey = 'id_morador';

    public function getAll($allParams = null)
    {
        $query = $this->newQuery();
        $query->whereNull('morador.dt_fim');
        $query->join('apartamento', 'apartamento.id_apartamento', 'morador.id_apartamento');
        $query->join('morador_tipo', 'morador_tipo.id_morador_tipo', 'morador.id_morador_tipo');
        $query->select('morador.*','apartamento.*','morador_tipo.*');

        if (!empty($allParams['no_morador'])) {
            $query->where('morador.no_morador','ILIKE', '%'.$allParams['no_morador'].'%');
        }

        $query->orderBy('morador.dt_inicio');

        return $query->get();
    }

    public function limparDados()
    {
        $this->nu_cpf_morador = str_replace('.','', $this->nu_cpf_morador);
        $this->nu_cpf_morador = str_replace('-','', $this->nu_cpf_morador);
        $this->nu_rg_morador = str_replace('.','', $this->nu_rg_morador);
        $this->nu_telefone_morador = str_replace('(','', $this->nu_telefone_morador);
        $this->nu_telefone_morador = str_replace(')','', $this->nu_telefone_morador);
        $this->nu_telefone_morador = str_replace('-','', $this->nu_telefone_morador);
        $this->nu_celular_morador = str_replace('(','', $this->nu_celular_morador);
        $this->nu_celular_morador = str_replace(')','', $this->nu_celular_morador);
        $this->nu_celular_morador = str_replace('.','', $this->nu_celular_morador);
        $this->nu_celular_morador = str_replace('-','', $this->nu_celular_morador);
        $this->dt_nascimento_morador = str_replace('/','-', $this->dt_nascimento_morador);
        $this->sg_sexo_morador = str_replace(' ','', $this->sg_sexo_morador);
    }

    public function contagemMorador()
    {
        $moradores = DB::table('morador')->count();
        return $moradores;
    }
}
