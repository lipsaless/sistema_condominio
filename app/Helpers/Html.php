<?php 

namespace App\Helpers;

use App\Model\Apartamento;

class Html 
{
    public static function listaApt($idApt = null) 
    {
        $listaApt = (new Apartamento)->getAll();

        foreach ($listaApt as $key => $value) {
            $value->id = $value->id_apartamento;
            $value->label = $value->no_apartamento;
        }

        $listaApt = json_encode($listaApt);

        return "
            <input type='hidden' id='lista-apt' value='{$listaApt}'>
            <input type='hidden' name='id_apartamento' value='{$idApt}'>
            <input type='hidden' id='rota-morador-apt' value='".route('morador-apt')."'>
        ";
    }
}