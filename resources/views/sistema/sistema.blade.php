
<!--MY STYLE-->
<link rel="stylesheet" href="{{ asset('css/sistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/menuSistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/menuHomeSistema.css') }}">
<link rel="stylesheet" href="{{ asset('css/styleNav.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalMorador.css') }}">
<link rel="stylesheet" href="{{ asset('css/formMorador.css') }}">
<link rel="stylesheet" href="{{ asset('css/formAutomovel.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalAutomovel.css') }}">
<link rel="stylesheet" href="{{ asset('css/formAnimal.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalAnimal.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalFuncionario.css') }}">
<link rel="stylesheet" href="{{ asset('css/formFuncionario.css') }}">
<link rel="stylesheet" href="{{ asset('css/principalReserva.css') }}">
<link rel="stylesheet" href="{{ asset('css/formReserva.css') }}">
<link rel="stylesheet" href="{{ asset('principal/principal.js') }}">

<!--PRINCIPAL JS-->
<script src="{{ asset('principal/principal.js') }}"></script>

<!--BOOTSTRAP CSS-->
<link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

<!--jQuery-->
<script src="{{ asset('jQuery/jquery-3.3.1.min.js') }}"></script>

<!--TOASTR MSG-->
<link rel="stylesheet" href="{{ asset('toastr/toastr.css') }}">
<script rel="stylesheet" src="{{ asset('toastr/toastr.min.js') }}"></script>

<!-- Datatable -->
<script src="{{ asset('DataTable/datatables.js') }}"></script>
<link rel="stylesheet" href="{{ asset('DataTables/dataTables.semanticui.css') }}">

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

<div id="loading" class="ui segment" style="position: absolute;">
  <div class="ui active dimmer">
    <div class="ui text loader">Loading</div>
  </div>
  <p></p>
</div>

<script>
    $(document).ready(function() {
        $('#loading').hide();
    })
</script>

<!--CONTEÚDO-->
<div id="nav-sistema">
    @include('sistema.nav.nav')
</div>

<div id="menu-sistema">
    @include('sistema.menu.menu')
    @yield('view-principal')
</div>

