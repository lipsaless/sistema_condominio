<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $guarded = [];
    protected $table = 'funcionario';
    protected $primaryKey = 'id_funcionario';
    
    public function getAll($allParams = null)
    {
        $query = $this->newQuery();
        $query->whereNull('funcionario.dt_fim');
        $query->select('funcionario.*');
        $query->orderBy('funcionario.no_funcionario');

        return $query->get();
    }

    public function limparDados()
    {
        $this->nu_cpf_funcionario = str_replace('.','', $this->nu_cpf_funcionario);
        $this->nu_cpf_funcionario = str_replace('-','', $this->nu_cpf_funcionario);
        $this->nu_rg_funcionario = str_replace('.','', $this->nu_rg_funcionario);
        $this->nu_telefone_funcionario = str_replace('(','', $this->nu_telefone_funcionario);
        $this->nu_telefone_funcionario = str_replace(')','', $this->nu_telefone_funcionario);
        $this->nu_telefone_funcionario = str_replace('-','', $this->nu_telefone_funcionario);
        $this->nu_celular_funcionario = str_replace('(','', $this->nu_celular_funcionario);
        $this->nu_celular_funcionario = str_replace(')','', $this->nu_celular_funcionario);
        $this->nu_celular_funcionario = str_replace('.','', $this->nu_celular_funcionario);
        $this->nu_celular_funcionario = str_replace('-','', $this->nu_celular_funcionario);
        $this->dt_nascimento_funcionario = str_replace('/','-', $this->dt_nascimento_funcionario);
    }

    public function countFuncionarios()
    {
        $funcionarios = DB::table('funcionario')->whereNull('funcionario.dt_fim')->count();
        return $funcionarios;
    }
}
