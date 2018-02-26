
<!--MY STYLE MENU-->
<link rel="stylesheet" href="{{ asset('css/menuSistema.css') }}">

<div id="nav-sistema">
    @include('sistema.nav.nav')
</div>



<div id="menu-sistema">
    @include('sistema.menu.menu')
</div>

<div id="form-morador-sistema">
    @yield('form-morador')
</div>
