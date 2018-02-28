<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function principal()
    {
        $model = new Animal();
        
    }

    public function form()
    {
        return view('sistema.animal.form');
    }
}
