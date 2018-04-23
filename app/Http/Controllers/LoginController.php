<?php

namespace App\Http\Controllers;

use App\Model\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }
}
