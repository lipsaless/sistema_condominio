<?php

Route::get('/', function() {
    return view('template.template');
});

Route::group(['middleware' => ['auth.role', 'auth.routes']], function() {

    //ROTAS DO SISTEMA
    Route::get('/sistema', ['as' => 'sistema', 'uses' => 'HomeController@principal']);

    //VISITANTE
    Route::get('/sistema/visitante', ['as' => 'visitante-principal', 'uses' => 'VisitanteController@principal']);
    Route::get('/sistema/visitante/cadastro', ['as' => 'visitante-form', 'uses' => 'VisitanteController@form']);
    Route::post('/sistema/visitante/gravar', ['as' => 'visitante-gravar', 'uses' => 'VisitanteController@gravar']);
    Route::post('/sistema/visitante/grid', ['as' => 'visitante-grid', 'uses' => 'VisitanteController@grid']);
    Route::get('/sistema/visitante/editar/{id?}', ['as' => 'visitante-editar', 'uses' => 'VisitanteController@editar']);
    Route::get('/sistema/visitante/excluir/{id?}', ['as' => 'visitante-excluir', 'uses' => 'VisitanteController@excluir']);

    //MORADOR
    Route::get('/sistema/morador/morador', ['as' => 'morador-principal', 'uses' => 'MoradorController@principal']);
    Route::get('/sistema/morador/morador/cadastro', ['as' => 'morador-form', 'uses' => 'MoradorController@form']);
    Route::post('/sistema/morador/morador/gravar', ['as' => 'morador-gravar', 'uses' => 'MoradorController@gravar']);
    Route::post('/sistema/morador/morador/grid', ['as' => 'morador-grid', 'uses' => 'MoradorController@grid']);
    Route::get('/sistema/morador/morador/editar/{id?}', ['as' => 'morador-editar', 'uses' => 'MoradorController@editar']);
    Route::get('/sistema/morador/morador/excluir/{id?}', ['as' => 'morador-excluir', 'uses' => 'MoradorController@excluir']);

    //EX-MORADOR
    Route::get('/sistema/morador/ex-morador', ['as' => 'ex-morador-principal', 'uses' => 'ExMoradorController@principal']);
    Route::post('/sistema/morador/ex-morador/grid', ['as' => 'ex-morador-grid', 'uses' => 'ExMoradorController@grid']);
    Route::get('/sistema/morador/ex-morador/recuperar/{id?}', ['as' => 'ex-morador-recuperar', 'uses' => 'ExMoradorController@recuperar']);

    //MORADOR-AUTOMOVEL
    Route::get('/sistema/morador/automovel', ['as' => 'morador-automovel-principal', 'uses' => 'AutomovelController@principal']);
    Route::get('/sistema/morador/automovel/cadastro', ['as' => 'morador-automovel-form', 'uses' => 'AutomovelController@form']);
    Route::post('/sistema/morador/automovel/grid', ['as' => 'morador-automovel-grid', 'uses' => 'AutomovelController@grid']);
    Route::post('/sistema/morador/automovel/gravar', ['as' => 'morador-automovel-gravar', 'uses' => 'AutomovelController@gravar']);
    Route::get('/sistema/morador/automovel/editar/{id?}', ['as' => 'morador-automovel-editar', 'uses' => 'AutomovelController@editar']);
    Route::get('/sistema/morador/automovel/excluir/{id?}', ['as' => 'morador-automovel-excluir', 'uses' => 'AutomovelController@excluir']);

    //SISTEMA
    Route::get('/sistema/lista-morador', ['as' => 'morador-apt', 'uses' => 'AutomovelController@listaMoradoresPorApt']);

    //MORADOR-ANIMAL
    Route::get('/sistema/morador/animal', ['as' => 'morador-animal-principal', 'uses' => 'AnimalController@principal']);
    Route::get('/sistema/morador/animal/cadastro', ['as' => 'morador-animal-form', 'uses' => 'AnimalController@form']);
    Route::post('/sistema/morador/animal/gravar', ['as' => 'morador-animal-gravar', 'uses' => 'AnimalController@gravar']);
    Route::post('/sistema/morador/animal/grid', ['as' => 'morador-animal-grid', 'uses' => 'AnimalController@grid']);
    Route::get('/sistema/morador/animal/editar/{id?}', ['as' => 'morador-animal-editar', 'uses' => 'AnimalController@editar']);
    Route::get('/sistema/morador/animal/excluir/{id?}', ['as' => 'morador-animal-excluir', 'uses' => 'AnimalController@excluir']);

    //FUNCIONÁRIO
    Route::get('/sistema/funcionario', ['as' => 'funcionario-principal', 'uses' => 'FuncionarioController@principal']);
    Route::get('/sistema/funcionario/cadastro', ['as' => 'funcionario-form', 'uses' => 'FuncionarioController@form']);
    Route::post('/sistema/funcionario/gravar', ['as' => 'funcionario-gravar', 'uses' => 'FuncionarioController@gravar']);
    Route::post('/sistema/funcionario/grid', ['as' => 'funcionario-grid', 'uses' => 'FuncionarioController@grid']);
    Route::get('/sistema/funcionario/editar/{id?}', ['as' => 'funcionario-editar', 'uses' => 'FuncionarioController@editar']);
    Route::get('/sistema/funcionario/excluir/{id?}', ['as' => 'funcionario-excluir', 'uses' => 'FuncionarioController@excluir']);

    //RESERVA
    Route::get('/sistema/reserva', ['as' => 'reserva-principal', 'uses' => 'ReservaController@principal']);
    Route::get('/sistema/reserva/cadastro', ['as' => 'reserva-form', 'uses' => 'ReservaController@form']);
    Route::post('/sistema/reserva/gravar', ['as' => 'reserva-gravar', 'uses' => 'ReservaController@gravar']);
    Route::post('/sistema/reserva/grid', ['as' => 'reserva-grid', 'uses' => 'ReservaController@grid']);
    Route::get('/sistema/reserva/editar/{id?}', ['as' => 'reserva-editar', 'uses' => 'ReservaController@editar']);
    Route::get('/sistema/reserva/excluir/{id?}', ['as' => 'reserva-excluir', 'uses' => 'ReservaController@excluir']);
    Route::get('/sistema/reserva/datas-bloqueio', ['as' => 'datas-bloqueio', 'uses' => 'ReservaController@datasBloqueadas']);

    //RESERVA-LOCAL
    Route::get('/sistema/reserva-local', ['as' => 'reserva-local-principal', 'uses' => 'ReservaLocalController@principal']);
    Route::get('/sistema/reserva-local/cadastro', ['as' => 'reserva-local-form', 'uses' => 'ReservaLocalController@form']);
    Route::post('/sistema/reserva-local/gravar', ['as' => 'reserva-local-gravar', 'uses' => 'ReservaLocalController@gravar']);
    Route::post('/sistema/reserva-local/grid', ['as' => 'reserva-local-grid', 'uses' => 'ReservaLocalController@grid']);
    Route::get('/sistema/reserva-local/editar/{id?}', ['as' => 'reserva-local-editar', 'uses' => 'ReservaLocalController@editar']);
    Route::get('/sistema/reserva-local/excluir/{id?}', ['as' => 'reserva-local-excluir', 'uses' => 'ReservaLocalController@excluir']);

    //CONFIGURAÇÕES - APT
    Route::get('/sistema/configuracoes/apartamento', ['as' => 'apt-principal', 'uses' => 'ApartamentoController@principal']);
    Route::get('/sistema/configuracoes/apartamento/cadastro', ['as' => 'apt-form', 'uses' => 'ApartamentoController@form']);
    Route::post('/sistema/configuracoes/apartamento/gravar', ['as' => 'apt-gravar', 'uses' => 'ApartamentoController@gravar']);
    Route::post('/sistema/configuracoes/apartamento/grid', ['as' => 'apt-grid', 'uses' => 'ApartamentoController@grid']);
    Route::get('/sistema/configuracoes/apartamento/editar/{id?}', ['as' => 'apt-editar', 'uses' => 'ApartamentoController@editar']);
    Route::get('/sistema/configuracoes/apartamento/excluir/{id?}', ['as' => 'apt-excluir', 'uses' => 'ApartamentoController@excluir']);

    //CONFIGURAÇÕES - BLOCO
    Route::get('/sistema/configuracoes/bloco', ['as' => 'bloco-principal', 'uses' => 'BlocoController@principal']);
    Route::get('/sistema/configuracoes/bloco/cadastro', ['as' => 'bloco-form', 'uses' => 'BlocoController@form']);
    Route::post('/sistema/configuracoes/bloco/gravar', ['as' => 'bloco-gravar', 'uses' => 'BlocoController@gravar']);
    Route::post('/sistema/configuracoes/bloco/grid', ['as' => 'bloco-grid', 'uses' => 'BlocoController@grid']);
    Route::get('/sistema/configuracoes/bloco/editar/{id?}', ['as' => 'bloco-editar', 'uses' => 'BlocoController@editar']);
    Route::get('/sistema/configuracoes/bloco/excluir/{id?}', ['as' => 'bloco-excluir', 'uses' => 'BlocoController@excluir']);

    //CONFIGURACOES = MORADOR-TIPO
    Route::get('/sistema/configuracoes/morador-tipo', ['as' => 'morador-tipo-principal', 'uses' => 'MoradorTipoController@principal']);
    Route::get('/sistema/configuracoes/morador-tipo/cadastro', ['as' => 'morador-tipo-form', 'uses' => 'MoradorTipoController@form']);
    Route::post('/sistema/configuracoes/morador-tipo/grid', ['as' => 'morador-tipo-grid', 'uses' => 'MoradorTipoController@grid']);
    Route::post('/sistema/configuracoes/morador-tipo/gravar', ['as' => 'morador-tipo-gravar', 'uses' => 'MoradorTipoController@gravar']);
    Route::get('/sistema/configuracoes/morador-tipo/editar/{id?}', ['as' => 'morador-tipo-editar', 'uses' => 'MoradorTipoController@editar']);
    Route::get('/sistema/configuracoes/morador-tipo/excluir/{id?}', ['as' => 'morador-tipo-excluir', 'uses' => 'MoradorTipoController@excluir']);

    //CONFIGURACOES = VISITANTE-TIPO
    Route::get('/sistema/configuracoes/visitante-tipo', ['as' => 'visitante-tipo-principal', 'uses' => 'VisitanteTipoController@principal']);
    Route::get('/sistema/configuracoes/visitante-tipo/cadastro', ['as' => 'visitante-tipo-form', 'uses' => 'VisitanteTipoController@form']);
    Route::post('/sistema/configuracoes/visitante-tipo/grid', ['as' => 'visitante-tipo-grid', 'uses' => 'VisitanteTipoController@grid']);
    Route::post('/sistema/configuracoes/visitante-tipo/gravar', ['as' => 'visitante-tipo-gravar', 'uses' => 'VisitanteTipoController@gravar']);
    Route::get('/sistema/configuracoes/visitante-tipo/editar/{id?}', ['as' => 'visitante-tipo-editar', 'uses' => 'VisitanteTipoController@editar']);
    Route::get('/sistema/configuracoes/visitante-tipo/excluir/{id?}', ['as' => 'visitante-tipo-excluir', 'uses' => 'VisitanteTipoController@excluir']);

    //CONFIGURACOES = ANIMAL-TIPO
    Route::get('/sistema/configuracoes/animal-tipo', ['as' => 'animal-tipo-principal', 'uses' => 'AnimalTipoController@principal']);
    Route::get('/sistema/configuracoes/animal-tipo/cadastro', ['as' => 'animal-tipo-form', 'uses' => 'AnimalTipoController@form']);
    Route::post('/sistema/configuracoes/animal-tipo/grid', ['as' => 'animal-tipo-grid', 'uses' => 'AnimalTipoController@grid']);
    Route::post('/sistema/configuracoes/animal-tipo/gravar', ['as' => 'animal-tipo-gravar', 'uses' => 'AnimalTipoController@gravar']);
    Route::get('/sistema/configuracoes/animal-tipo/editar/{id?}', ['as' => 'animal-tipo-editar', 'uses' => 'AnimalTipoController@editar']);
    Route::get('/sistema/configuracoes/animal-tipo/excluir/{id?}', ['as' => 'animal-tipo-excluir', 'uses' => 'AnimalTipoController@excluir']);
});

//ROTAS DE LOGIN
Route::get('/Login',['as' => 'login', 'uses' => 'LoginController@principal']);
Route::get('/login-index',['as' => 'login-index', 'uses' => 'LoginController@loginIndex']);
Route::post('/Login/autenticar',['as' => 'login/autenticar', 'uses' => 'LoginController@realizarLogin']);
Route::get('/logout',['as' => 'logout', 'uses' => 'LoginController@realizarLogout']);


