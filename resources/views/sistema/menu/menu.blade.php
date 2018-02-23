<!--BOOTSTRAP CSS-->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<!--MY STYLE MENU-->
<link rel="stylesheet" href="{{ asset('css/menuSistema.css') }}">
<!--FONT AWESOME-->
<link rel="stylesheet" href="{{ asset('font-awesome/css/fontawesome.min.css') }}">


<div class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="col-md-3 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
            
                <div class="list-group border-0 card text-center text-md-left">
                    <div id="img-condominio">
                        <img src="{{ asset('assets/img/cond.jpg') }}" alt="">
                    </div>
                <a href="{{route('sistema')}}" class="list-group-item d-inline-block collapsed"><i class="fa fa-home"></i> Home </a>
                
                <a href="#" class="list-group-item d-inline-block collapsed"><i class="fa fa-film"></i> <span class="d-none d-md-inline">Reserva</span></a>
                <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-user"></i> <span class="d-none d-md-inline">Morador </span></a>
                <div class="collapse" id="menu3">
                    <a href="#" class="list-group-item">Morador</a>
                    <a href="#" class="list-group-item">Automóvel</a>
                    <a href="#" class="list-group-item">Animal</a>
                </div>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-users"></i> <span class="d-none d-md-inline">Funcionários</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-cogs"></i> <span class="d-none d-md-inline">Configurações</span></a>
                
    </div>
</div>
        
        
        <!--BUTTON CLOSE MENU-->
        <main class="col-md-9 float-left col px-5 pl-md-2 pt-2 main">
            <a id="menu-close" href="#" data-target="#sidebar" data-toggle="collapse"><i class="fa fa-navicon fa-2x py-2 p-1"></i></a>
        </main>

<script src="{{ asset('jQuery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>