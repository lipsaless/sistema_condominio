
<!--MY STYLE-->
<link rel="stylesheet" href="{{ asset('css/sistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/menuSistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/styleNav.css') }}">

<!--BOOTSTRAP CSS-->
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<!--jQuery-->
<script src="{{ asset('jQuery/jquery-3.3.1.min.js') }}"></script>

<!--FONT AWESOME-->
<link rel="stylesheet" href="{{ asset('font-awesome/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('font-awesome/css/fontawesome.min.css') }}">
<!--SEMANTIC CSS-->
<link rel="stylesheet" href="{{ asset('semantic/semantic.min.css') }}">
<link rel="stylesheet" href="{{ asset('semantic/semantic.min.js') }}">


<!--CONTEÚDO-->
<div id="nav-sistema">
    @include('sistema.nav.nav')
</div>

<div id="menu-sistema">
    @include('sistema.menu.menu')
    @yield('view-principal')
</div>
