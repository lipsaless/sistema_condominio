<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animal';
    protected $primary = 'id_animal';
    
    public function search($allParams = null, $fetchRow = false, $qtdByPage = null, $page = 1)
    {
        if(empty($allParams['id_condominio'])) {
            throw new Exception('Informe o condomínio para consultar os Morador.');
        }

        $sql = "SELECT a.*
            ,cl.id_cor_layout
            ,cl.no_cor_layout
            ,cl.ref_cor_layout";
        $sql .= " FROM prioridade AS a";
        $sql .= " INNER JOIN animal_tipo AS at ON a.id_animal_tipo = at.id_animal_tipo";
        $sql .= " WHERE a.dt_fim IS NULL ";

        //ID
        if(!empty($allParams[$this->primary])) {
            $sql .= " AND a.".$this->primary." = ".$allParams[$this->primary];
        } else {
            //ID_COR_LAYOUT
            if(!empty($allParams['id_cor_layout'])) {
                $sql .= " AND cl.id_cor_layout = ".$allParams['id_cor_layout'];
            }
        }

        //ORDER
        $sql .= " ORDER BY a.dt_inicio ASC";

        //FETCH
        if($fetchRow === true) {
            return $this->fetchRow($sql);
        }
        return $this->fetchAll($sql);
    }

    public static function getRefById($idPrioridade)
    {
        $model = new Prioridade();
        return $model->search([ID_REFERENCE_NAME => ID_REFERENCE, 'id_prioridade' => $idPrioridade], true)->ref_cor_layout;
    }
}
