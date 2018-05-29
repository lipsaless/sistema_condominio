<?php

namespace App\Http\Controllers;

use App\Model\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public $title = 'Funcionários';
    public $primaryKey = 'id_funcionario';

    public function principal()
    {
        $model = new Funcionario();
        $funcionarios = Funcionario::all()->toArray();
        return view('sistema.funcionario.principal', ['']);
    }

    public function form()
    {
        $model = new Funcionario();
        $funcionarios = Funcionario::all()->toArray();

        $obj = $model;
        $sexoFuncionario = ['Masculino', 'Feminino'];
        $sexo =  $sexoFuncionario;
        return view('sistema.funcionario.form', ['sexo' => $sexo, 'obj' => $obj]);
    }

    public function grid()
    {
        $model = new Funcionario;
        return $model->getAll();
    }

    public function editar($id)
    {
        $model = new Funcionario;

        $sexoFuncionario = ['Masculino', 'Feminino'];
        $sexo =  $sexoFuncionario;

        $obj = $model->find($id);        

        return view('sistema.funcionario.form',['obj' => $obj, 'sexo' => $sexo]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new Funcionario;

        if (!empty($params['id_funcionario'])) {
            $model = $model->find($params['id_funcionario']);
        } else {
            unset($params['id_funcionario']);
        }

        $model->fill($params);
        
        $model->limparDados();
        
        $model->save();
    }

    public function excluir($id)
    {
        $model = new Funcionario;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $obj->update();

        return response([]);
    }
}
