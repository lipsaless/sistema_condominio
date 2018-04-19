<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    protected $primary = 'id_funcionario';
    protected $guarded = [];

    public function getAll()
    {
        $query = $this->newQuery();
        $query->whereNull('funcionario.dt_fim');
        $query->orderBy('funcionario.dt_inicio');

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
}
