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

    public function realizarLogin(Request $request)
    {
        $model = new Funcionario;

        $email = $request->input('email');
        $senha = $request->input('password');
        $senhacrypt = md5($senha);

        $usuarioEncontrado = $model->autenticaUsuario($email, $senhacrypt);

        if ($usuarioEncontrado) {
            $_SESSION['usuario'] = $usuarioEncontrado;
            return redirect('sistema');
        } else {
            return redirect('Login');
        }
    }

    public function realizarLogout(Request $request)
    {
        unset($_SESSION['usuario']);
        return redirect('Login');
    }
}
