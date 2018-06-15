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
        $funcionarios = Funcionario::first()->toArray();

        $obj = $model;
        $sexoFuncionario = [
            'M' => 'Masculino',
            'F' =>'Feminino'
        ];

        $sexo =  $sexoFuncionario;

        $perfis = ['Portaria','Master'];

        return view('sistema.funcionario.form', ['sexo' => $sexo, 'obj' => $obj, 'perfis' => $perfis]);
    }

    public function grid()
    {
        $model = new Funcionario;
        return $model->getAll();
    }

    public function editar($id)
    {
        $model = new Funcionario;

        $sexoFuncionario = [
            'M' => 'Masculino',
            'F' => 'Feminino'
        ];

        $sexo =  $sexoFuncionario;
        $perfis = ['Portaria','Master'];

        $obj = $model->find($id);

        return view('sistema.funcionario.form',['obj' => $obj, 'sexo' => $sexo, 'perfis' => $perfis]);
    }

    public function gravar(Request $request)
    {
        $params = $request->all();

        $model = new Funcionario;
        
        // if (!$params['ds_senha_funcionario']) {
        //     $params['ds_senha_funcionario'] = $params['ds_senha_funcionario_antiga'];
        // }

        if (!empty($params['id_funcionario'])) {
            $model = $model->find($params['id_funcionario']);
        } else {
            unset($params['id_funcionario']);
        }

        $model->fill($params);
        
        $model->limparDados();
       
        $salvou = $model->save($params);
        
        if ($salvou) {
            return json_encode(['type' => 'success', 'msg' => 'Cadastro efetuado com sucesso.']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar cadastrar funcionário.']);
        }
    }

    public function excluir($id)
    {
        $model = new Funcionario;
        $obj = $model->find($id);
        
        $obj->dt_fim = date('Y-m-d H:i:s');
        $excluir = $obj->update();

        if ($excluir) {
            return json_encode(['type' => 'success', 'msg' => 'Funcionário excluído com sucesso.']);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar excluir funcionário.']);
        }

        return response([]);
    }
}
