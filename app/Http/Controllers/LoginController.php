<?php

namespace App\Http\Controllers;

use App\Login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }
}
