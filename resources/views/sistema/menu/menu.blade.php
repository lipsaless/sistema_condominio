<!--BOOTSTRAP CSS-->
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

<!--MY STYLE MENU-->
<link rel="stylesheet" href="{{ asset('css/menuSistema.css') }}">
<!--FONT AWESOME-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<div class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="col-md-3 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
            
                <div class="list-group border-0 card text-center text-md-left">
                    <div id="img-condominio">
                        <img src="{{ asset('assets/img/cond.jpg') }}" alt="">
                    </div>
                <a href="{{ asset('sistemamorador.morador') }}" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar"><i class="fa fa-home"></i> Home </a>
                
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-film"></i> <span class="d-none d-md-inline">Reserva</span></a>
                <a href="#menu3" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fa fa-user"></i> <span class="d-none d-md-inline">Morador </span></a>
                <div class="collapse" id="menu3">
                    <a href="#" class="list-group-item" data-parent="#menu3">Morador</a>
                    <a href="#" class="list-group-item" data-toggle="">Automóvel</a>
                    <a href="#" class="list-group-item" data-parent="#menu3">Animal</a>
                </div>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-users"></i> <span class="d-none d-md-inline">Funcionários</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-cogs"></i> <span class="d-none d-md-inline">Configurações</span></a>
                
            </div>
        </div>
        
        
        <!--BUTTON CLOSE MENU-->
        <main class="col-md-9 float-left col px-5 pl-md-2 pt-2 main">
            <a id="menu-close" href="#" data-target="#sidebar" data-toggle="collapse"><i class="fa fa-navicon fa-2x py-2 p-1"></i></a>
        </main>

        
            <div class="page-header">
                <h2>Bootstrap 4 Sidebar Menu</h2>
            </div>
            <p class="lead">A responsive, multi-level vertical accordion.</p>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <button role="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo" aria-expanded="true">
                        horizontal collapsible
                    </button>
                    <div id="demo" class="width collapse show" aria-expanded="true">
                        <div class="list-group" style="width: 400px;">
                           <img src="{{ asset('assets/img/condo.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <button role="button" class="btn btn-danger" data-toggle="collapse" data-target="#demo2" aria-expanded="true">
                       vertical collapsible
                    </button>
                    <div id="demo2" class="height collapse show" aria-expanded="true">
                        <div>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<script src="{{ asset('jQuery/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>