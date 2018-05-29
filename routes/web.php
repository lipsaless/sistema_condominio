<?php

Route::get('/', function() {
    return view('template.conteudo.conteudo');
});

//ROTAS DE LOGIN
Route::get('/Login',['as' => 'login', 'uses' => 'LoginController@login']);
Route::post('/Login',['as' => 'login.login', 'uses' => 'LoginController@outh']);

//ROTAS DO SISTEMA
Route::get('/sistema', ['as' => 'sistema', 'uses' => 'HomeController@principal']);

//VISITANTE
Route::get('/visitante', ['as' => 'visitante-principal', 'uses' => 'VisitanteController@principal']);
Route::get('/visitante/cadastro', ['as' => 'visitante-form', 'uses' => 'VisitanteController@form']);
Route::post('/visitante/gravar', ['as' => 'visitante-gravar', 'uses' => 'VisitanteController@gravar']);
Route::post('/visitante/grid', ['as' => 'visitante-grid', 'uses' => 'VisitanteController@grid']);
Route::get('/visitante/editar/{id?}', ['as' => 'visitante-editar', 'uses' => 'VisitanteController@editar']);
Route::get('/visitante/excluir/{id?}', ['as' => 'visitante-excluir', 'uses' => 'VisitanteController@excluir']);

//MORADOR
Route::get('/morador/morador', ['as' => 'morador-principal', 'uses' => 'MoradorController@principal']);
Route::get('/morador/morador/cadastro', ['as' => 'morador-form', 'uses' => 'MoradorController@form']);
Route::post('/morador/morador/gravar', ['as' => 'morador-gravar', 'uses' => 'MoradorController@gravar']);
Route::post('/morador/morador/grid', ['as' => 'morador-grid', 'uses' => 'MoradorController@grid']);
Route::get('/morador/morador/editar/{id?}', ['as' => 'morador-editar', 'uses' => 'MoradorController@editar']);
Route::get('/morador/morador/excluir/{id?}', ['as' => 'morador-excluir', 'uses' => 'MoradorController@excluir']);

//EX-MORADOR
Route::get('/morador/ex-morador', ['as' => 'ex-morador-principal', 'uses' => 'ExMoradorController@principal']);
Route::post('/morador/ex-morador/grid', ['as' => 'ex-morador-grid', 'uses' => 'ExMoradorController@grid']);
Route::get('/morador/ex-morador/recuperar/{id?}', ['as' => 'ex-morador-recuperar', 'uses' => 'ExMoradorController@recuperar']);

//MORADOR-AUTOMOVEL
Route::get('/morador/automovel', ['as' => 'morador-automovel-principal', 'uses' => 'AutomovelController@principal']);
Route::get('/morador/automovel/cadastro', ['as' => 'morador-automovel-form', 'uses' => 'AutomovelController@form']);
Route::post('/morador/automovel/grid', ['as' => 'morador-automovel-grid', 'uses' => 'AutomovelController@grid']);
Route::post('/morador/automovel/gravar', ['as' => 'morador-automovel-gravar', 'uses' => 'AutomovelController@gravar']);
Route::get('/morador/automovel/editar/{id?}', ['as' => 'morador-automovel-editar', 'uses' => 'AutomovelController@editar']);
Route::get('/morador/automovel/excluir/{id?}', ['as' => 'morador-automovel-excluir', 'uses' => 'AutomovelController@excluir']);

//SISTEMA
Route::get('/sistema/lista-morador', ['as' => 'morador-apt', 'uses' => 'AutomovelController@listaMoradoresPorApt']);

//MORADOR-ANIMAL
Route::get('/morador/animal', ['as' => 'morador-animal-principal', 'uses' => 'AnimalController@principal']);
Route::get('/morador/animal/cadastro', ['as' => 'morador-animal-form', 'uses' => 'AnimalController@form']);
Route::post('/morador/animal/gravar', ['as' => 'morador-animal-gravar', 'uses' => 'AnimalController@gravar']);
Route::post('/morador/animal/grid', ['as' => 'morador-animal-grid', 'uses' => 'AnimalController@grid']);
Route::get('/morador/animal/editar/{id?}', ['as' => 'morador-animal-editar', 'uses' => 'AnimalController@editar']);
Route::get('/morador/animal/excluir/{id?}', ['as' => 'morador-animal-excluir', 'uses' => 'AnimalController@excluir']);

//FUNCIONÁRIO
Route::get('/funcionario', ['as' => 'funcionario-principal', 'uses' => 'FuncionarioController@principal']);
Route::get('/funcionario/cadastro', ['as' => 'funcionario-form', 'uses' => 'FuncionarioController@form']);
Route::post('/funcionario/gravar', ['as' => 'funcionario-gravar', 'uses' => 'FuncionarioController@gravar']);
Route::post('/funcionario/grid', ['as' => 'funcionario-grid', 'uses' => 'FuncionarioController@grid']);
Route::get('/funcionario/editar/{id?}', ['as' => 'funcionario-editar', 'uses' => 'FuncionarioController@editar']);
Route::get('/funcionario/excluir/{id?}', ['as' => 'funcionario-excluir', 'uses' => 'FuncionarioController@excluir']);

//RESERVA
Route::get('/reserva', ['as' => 'reserva-principal', 'uses' => 'ReservaController@principal']);
Route::get('/reserva/cadastro', ['as' => 'reserva-form', 'uses' => 'ReservaController@form']);
Route::post('/reserva/gravar', ['as' => 'reserva-gravar', 'uses' => 'ReservaController@gravar']);
Route::post('/reserva/grid', ['as' => 'reserva-grid', 'uses' => 'ReservaController@grid']);
Route::get('/reserva/editar/{id?}', ['as' => 'reserva-editar', 'uses' => 'ReservaController@editar']);
Route::get('/reserva/excluir/{id?}', ['as' => 'reserva-excluir', 'uses' => 'ReservaController@excluir']);

//RESERVA-LOCAL
Route::get('/reserva-local', ['as' => 'reserva-local-principal', 'uses' => 'ReservaLocalController@principal']);
Route::get('/reserva-local/cadastro', ['as' => 'reserva-local-form', 'uses' => 'ReservaLocalController@form']);
Route::post('/reserva-local/gravar', ['as' => 'reserva-local-gravar', 'uses' => 'ReservaLocalController@gravar']);
Route::post('/reserva-local/grid', ['as' => 'reserva-local-grid', 'uses' => 'ReservaLocalController@grid']);
Route::get('/reserva-local/editar/{id?}', ['as' => 'reserva-local-editar', 'uses' => 'ReservaLocalController@editar']);
Route::get('/reserva-local/excluir/{id?}', ['as' => 'reserva-local-excluir', 'uses' => 'ReservaLocalController@excluir']);




