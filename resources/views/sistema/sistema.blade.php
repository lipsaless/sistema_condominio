<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="shortcut icon" type="image/png" href="{{ asset('logo/oie_transparent.png') }}"/>

<!--MY STYLE-->
<link rel="stylesheet" href="{{ asset('css/sistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalVisitante.css') }}">
<link rel="stylesheet" href="{{ asset('css/menuSistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalReservaLocal.css') }}"
<link rel="stylesheet" href="{{ asset('css/menuHomeSistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/styleNav.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalMorador.css') }}">
<link rel="stylesheet" href="{{ asset('css/formMorador.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalExMorador.css') }}">
<link rel="stylesheet" href="{{ asset('css/formAutomovel.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalAutomovel.css') }}">
<link rel="stylesheet" href="{{ asset('css/formAnimal.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalAnimal.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalFuncionario.css') }}">
<link rel="stylesheet" href="{{ asset('css/formFuncionario.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalReserva.css') }}">
<link rel="stylesheet" href="{{ asset('css/formReserva.css') }}">
<link rel="stylesheet" href="{{ asset('css/configApt.css') }}">

<!--BOOTSTRAP CSS-->
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
<link rel="stylesheet" href="{{ asset('css/bootstrap.js') }}">

<!--jQuery-->
<script src="{{ asset('jQuery/jquery-3.3.1.min.js') }}"></script>
<link rel="stylesheet" href="{{ asset('semantic/semantic.js') }}">

<!-- Datatable -->
<link rel="stylesheet" href="{{ asset('DataTable/dataTables.semanticui.css') }}">
<script src="{{ asset('DataTable/datatables.js') }}"></script>

<!--jQuery MASK-->
<script src="{{ asset('jQuery-Mask/jquery.mask.js') }}"></script>

<!--jQuery UI-->
<link rel="stylesheet" href="{{ asset('jQuery-ui/jquery-ui.css') }}">
<script src="{{ asset('jQuery-ui/jquery-ui.js') }}"></script>

<!--FONT AWESOME-->
<link rel="stylesheet" href="{{ asset('font-awesome/css/fontawesome-all.min.css') }}">
<link rel="stylesheet" href="{{ asset('font-awesome/css/fontawesome.min.css') }}">

<!--SEMANTIC CSS-->
<link rel="stylesheet" href="{{ asset('semantic/semantic.css') }}">

<!--TOASTR MSG-->
<link rel="stylesheet" href="{{ asset('toastr/toastr.css') }}">
<script rel="stylesheet" src="{{ asset('toastr/toastr.min.js') }}"></script>

<!--PRINCIPAL JS-->
<script src="{{ asset('principal/principal.js') }}"></script>

<!--CONTEÚDO-->
<div id="nav-sistema">
    @include('sistema.nav.nav')
</div>

<!-- LOADER -->
<div id="loader" style="display:none;">
    <div class="ui segment">
        <div class="ui active dimmer">
            <div class="ui big text loader">Carregando...</div>
        </div>
        <p></p>
        <p></p>
        <p></p>
    </div>
</div>

<!-- MENU -->
<div id="menu-sistema">
    @include('sistema.menu.menu')
    @yield('view-principal')
</div>