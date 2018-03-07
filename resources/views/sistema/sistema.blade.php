
<!--MY STYLE-->
<link rel="stylesheet" href="{{ asset('css/sistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/menuSistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/menuHomeSistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/styleNav.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalMorador.css') }}">
<link rel="stylesheet" href="{{ asset('css/conteudoFormMorador.css') }}">

<!--PRINCIPAL JS-->
<script src="{{ asset('principal/principal.js') }}"></script>

<!--BOOTSTRAP CSS-->
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

<!--jQuery-->
<script src="{{ asset('jQuery/jquery-3.3.1.min.js') }}"></script>

<!--jQuery MASK-->
<script src="{{ asset('jQuery-Mask/jquery.mask.js') }}"></script>

<!--jQuery UI-->
<link rel="stylesheet" href="{{ asset('jQuery-ui/jquery-ui.css') }}">
<script src="{{ asset('jQuery-ui/jquery-ui.js') }}"></script>

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
