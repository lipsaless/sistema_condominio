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
Route::get('/Login',['uses' => 'LoginController@login']);
Route::post('/Login',['as' => 'login.login', 'uses' => 'LoginController@outh']);

//ROTAS DO SISTEMA
Route::get('/sistema', ['as' => 'sistema', 'uses' => 'SistemaController@sistema']);