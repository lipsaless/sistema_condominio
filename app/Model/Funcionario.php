<?php

namespace App\Model;

use DB;
use App\Model\BaseModel;

class Funcionario extends BaseModel
{
    protected $guarded = [];
    protected $table = 'funcionario';
    protected $primaryKey = 'id_funcionario';
    
    public function getAll($allParams = null, $fetchRow = false)
    {
        $query = $this->newQuery();
        $query->whereNull('funcionario.dt_fim');
        $query->select('funcionario.*');
        $query->orderBy('funcionario.no_funcionario');

        if (!empty($allParams['id_funcionario'])) {
            $query->where('funcionario.id_funcionario', $allParams['id_funcionario']);
        } else {
            $query->whereNull('funcionario.dt_fim');

            if (!empty($allParams['no_funcionario'])) {
                $query->where('funcionario.no_funcionario','ILIKE', '%'.$allParams['no_funcionario'].'%');
            }
        }

        if ($fetchRow) {
            return $query->first();
        }

        return $query->get();
    }

    public function limparDados()
    {
        //Formatando sexo  antes de ir para o banco
        $this->sg_sexo_funcionario = str_replace(' ', '', $this->sg_sexo_funcionario);

        //Formatando cpf antes de ir para o banco
        if ($this->nu_cpf_funcionario) {
            $this->nu_cpf_funcionario = str_replace('.','', $this->nu_cpf_funcionario);
            $this->nu_cpf_funcionario = str_replace('-','', $this->nu_cpf_funcionario);
        }

        //Formatando rg antes de ir para o banco
        $this->nu_rg_funcionario = str_replace('.','', $this->nu_rg_funcionario);

        //Formatando telefone antes de ir para o banco
        if ($this->nu_telefone_funcionario) {
            $this->nu_telefone_funcionario = str_replace('(','', $this->nu_telefone_funcionario);
            $this->nu_telefone_funcionario = str_replace(')','', $this->nu_telefone_funcionario);
            $this->nu_telefone_funcionario = str_replace('-','', $this->nu_telefone_funcionario);
        }

        //Formatando celular antes de ir para o banco
        if ($this->nu_celular_funcionario) {
            $this->nu_celular_funcionario = str_replace('(','', $this->nu_celular_funcionario);
            $this->nu_celular_funcionario = str_replace(')','', $this->nu_celular_funcionario);
            $this->nu_celular_funcionario = str_replace('.','', $this->nu_celular_funcionario);
            $this->nu_celular_funcionario = str_replace('-','', $this->nu_celular_funcionario);
        }
        $this->dt_nascimento_funcionario = str_replace('/','-', $this->dt_nascimento_funcionario);
        
        //Se ele não tiver digitado senha ele continua com a senha antigo
        if (!$this->ds_senha_funcionario) {
            $this->ds_senha_funcionario = $this->ds_senha_funcionario_antiga;
        } else {
            $this->ds_senha_funcionario = md5($this->ds_senha_funcionario);
        }
    }

    public function countFuncionarios()
    {
        $funcionarios = DB::table('funcionario')->whereNull('funcionario.dt_fim')->count();
        return $funcionarios;
    }

    public function autenticaUsuario($email, $senha)
    {
        return $this->newQuery()
            ->select('funcionario.*')
            ->where('ds_email_funcionario', $email)
            ->where('ds_senha_funcionario', $senha)
            ->whereNull('dt_fim')
            ->orderBy('no_funcionario')
            ->first();
    }

    public function findFuncionario($idFuncionario) 
    {
        return $this->newQuery()
            ->where('funcionario.id_funcionario', $idFuncionario)
            ->whereNotNull('funcionario.dt_fim')
            ->first();
    }
}
