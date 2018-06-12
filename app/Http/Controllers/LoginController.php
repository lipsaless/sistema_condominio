<?php

namespace App\Http\Controllers;

use Session;
use Artisan;
use Auth;
use App\Model\Funcionario;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function principal()
    {
        return view('login.login');
    }

    public function loginIndex() {
        return view('login-index.index');
    }

    public function realizarLogin(Request $request)
    {
        $model = new Funcionario;

        $email = $request->input('email');
        $senha = $request->input('password');
        $senhacrypt = md5($senha);

        $usuarioEncontrado = $model->autenticaUsuario($email, $senhacrypt);

        if ($usuarioEncontrado) {
            $_SESSION['usuario'] = $usuarioEncontrado;
            return json_encode(['type' => 'success', 'msg' => 'Usuário autenticado com sucesso', 'redirect' => route('sistema')]);
        } else {
            return json_encode(['type' => 'error', 'msg' => 'Erro ao tentar autenticar usuário']);
        }
    }

    public function realizarLogout(Request $request)
    {
        unset($_SESSION['usuario']);
        return redirect('Login');
    }
}
