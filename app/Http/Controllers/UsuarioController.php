<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function getUsuario(Request $request)
    {
        $model = new Usuarios();
        $allParams = $request->all();
        $id = $model->allParams['id_usuario'];
    }

    
}
