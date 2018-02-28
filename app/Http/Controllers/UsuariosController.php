<?php

namespace App\Http\Controllers;

use App\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function getUsuario(Request $request)
    {
        $model = new Usuarios();
        $allParams = $request->all();
        $id = $model->allParams['id_usuario'];
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit',compact('product'));
    }
}
