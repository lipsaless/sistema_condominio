<?php



Route::get('/', function() {
    return view('template.conteudo.conteudo');
});

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
Route::get('/morador/automovel', ['as' => 'morador-automovel-principal', 'uses' => 'AutomovelController@principal']);
Route::get('/morador/automovel/cadastro', ['as' => 'morador-automovel-form', 'uses' => 'AutomovelController@form']);
Route::get('/morador/automovel/grid', ['as' => 'morador-automovel-grid', 'uses' => 'AutomovelController@grid']);

//MORADOR-ANIMAL
Route::get('/morador/animal', ['as' => 'morador-animal-principal', 'uses' => 'AnimalController@principal']);
Route::get('/morador/animal/cadastro', ['as' => 'morador-animal-form', 'uses' => 'AnimalController@form']);
Route::get('/morador/animal/grid', ['as' => 'morador-animal-grid', 'uses' => 'AnimalController@grid']);

//FUNCIONÁRIO
Route::get('/funcionario', ['as' => 'funcionario-principal', 'uses' => 'FuncionarioController@principal']);
Route::get('/funcionario/cadastro', ['as' => 'funcionario-form', 'uses' => 'FuncionarioController@form']);
Route::get('/funcionario/gravar', ['as' => 'funcionario-gravar', 'uses' => 'FuncionarioController@gravar']);
Route::get('/funcionario/grid', ['as' => 'funcionario-grid', 'uses' => 'FuncionarioController@grid']);

//FUNCIONÁRIO
Route::get('/reserva/reserva', ['as' => 'reserva-principal', 'uses' => 'ReservaController@principal']);
Route::get('/reserva/cadastro', ['as' => 'reserva-form', 'uses' => 'ReservaController@form']);
Route::get('/reserva/gravar', ['as' => 'reserva-gravar', 'uses' => 'ReservaController@gravar']);
Route::get('/reserva/grid', ['as' => 'reserva-grid', 'uses' => 'ReservaController@grid']);
