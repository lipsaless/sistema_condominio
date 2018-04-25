<?php

namespace App\Http\Controllers;

use App\Model\Morador;
use Illuminate\Http\Request;

class ExMoradorController extends Controller
{
    public function principal()
    {
        $model = new Morador();

        $moradores = Morador::all()->toArray();

    	return view('sistema.ex-morador.principal');
    }

    public function grid()
    {
        $model = new Morador();

        return $model->getExMorador();
    }

    public function recuperar($id)
    {
        $model = new Morador;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $obj->update();

        return response([]);
    }
}
