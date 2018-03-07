<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('template.conteudo.conteudo');
});


Route::get('/morador', 'MoradorController@index');

Route::view('/nav', 'template.nav.nav');

//ROTAS DE LOGIN
Route::get('/Login',['as' => 'login', 'uses' => 'LoginController@login']);
Route::post('/Login',['as' => 'login.login', 'uses' => 'LoginController@outh']);

//ROTAS DO SISTEMA
Route::get('/sistema', ['as' => 'sistema', 'uses' => 'SistemaController@sistema']);

//MORADOR-MORADOR
Route::get('/morador/morador', ['as' => 'morador-principal', 'uses' => 'MoradorController@principal']);
Route::get('/morador/morador/cadastro', ['as' => 'morador-form', 'uses' => 'MoradorController@form']);
Route::get('/morador/morador/gravar', ['as' => 'morador-gravar', 'uses' => 'MoradorController@gravar']);
Route::get('/morador/morador/grid', ['as' => 'morador-grid', 'uses' => 'MoradorController@grid']);

//MORADOR-AUTOMOVEL
Route::get('/morador/automovel', ['as' => 'morador-automovel', 'uses' => 'AutomovelController@principal']);

//MORADOR-ANIMAL
Route::get('/morador/animal', ['as' => 'morador-animal', 'uses' => 'AnimalController@principal']);
