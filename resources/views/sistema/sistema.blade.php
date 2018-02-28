
<!--MY STYLE-->
<link rel="stylesheet" href="{{ asset('css/sistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/menuSistema.css') }}">

<!--BOOTSTRAP CSS-->
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

<!--FONT AWESOME-->
<link rel="stylesheet" href="{{ asset('font-awesome/css/fontawesome-all.min.css') }}">
<!--SEMANTIC CSS-->
<link rel="stylesheet" href="{{ asset('semantic/semantic.min.css') }}">
<link rel="stylesheet" href="{{ asset('semantic/semantic.min.js') }}">


<!--CONTEÚDO-->
<div id="nav-sistema">
    @include('sistema.nav.nav')
</div> -->

<div id="menu-sistema">
    @include('sistema.menu.menu')
</div>

<div id="principal-morador-sistema">
    @yield('principal-morador')
</div>

<div id="form-morador-sistema">
    @yield('form-morador')
</div>
