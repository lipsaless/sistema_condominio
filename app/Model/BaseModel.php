<?php 

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model as Eloquent;

class BaseModel extends Eloquent
{
    protected $guarded = [];

    public function save(array $options = []) 
    {
        //Todos os atributos
        $atributos = $this->getAttributes();
        
        $colunas = DB::getSchemaBuilder()->getColumnListing($this->getTable());
        
        foreach ($atributos as $nomeAtributo => $atributo) {
            if (!in_array($nomeAtributo, $colunas)) {
                unset($this->$nomeAtributo);
            }
        }

        return parent::save($options);
    }  

    public function find($id)
    {
        return $this->getAll([$this->getKeyName() => $id], true);
    }
}