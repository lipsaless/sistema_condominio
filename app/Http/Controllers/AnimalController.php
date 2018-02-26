<?php

namespace App\Http\Controllers;

use App\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public function principal()
    {
        return view('sistema.animal.principal');
    }

    public function form()
    {
        return view('sistema.animal.form');
    }

    public function gravar()
    {
       
    }

    public function store(AnimalRequest $request)
    {
        $product = new Animal;
        $product->name        = $request->name;
        $product->description = $request->description;
        $product->quantity    = $request->quantity;
        $product->price       = $request->price;
        $product->save();
        return redirect()->route('products.index')->with('message', 'Product created successfully!');
    }
}
