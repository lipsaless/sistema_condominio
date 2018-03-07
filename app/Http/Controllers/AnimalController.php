<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function principal()
    {
        $model = new Animal();
        $moradores = Animal::all()->toArray();
        return view('sistema.animal.principal');
        
    }

    public function form()
    {
        $model = new Animal();
        $moradores = Animal::all()->toArray();
        return view('sistema.animal.form');
    }
}
