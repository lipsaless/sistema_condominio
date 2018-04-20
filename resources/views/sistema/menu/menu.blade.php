<style>
    #menu-sistema {
        margin-top: -21px;
    }
</style>

<div id="menu-sistema" class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="col-md-2 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
            <div class="list-group border-0 card bg-faded text-center text-md-left">
                <!-- <div id="img">
                    <img id="img-menu" src="{{ asset('assets/img/img-condominio.jpg') }}" alt="">
                </div> -->
                <hr style="background: white; padding: 1px;">
                <a id="a-menu" href="{{ route('sistema') }}" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fas fa-home"></i> Home</a>
                <a id="a-menu" href="#" class="list-group-item" data-toggle="collapse"><i class="fas fa-map-marker"></i>  Visitantes </a>
                <a id="a-menu" href="#" class="list-group-item" data-toggle="collapse"><i class="fas fa-map-marker"></i>  Reserva <i id="seta" class="fas fa-angle-down" style="float: right; right:0;"></i></a>
                    <div class="collapse" id="reserva">
                        <a id="a-menu" href="{{ route('reserva-principal') }}" class="list-group-item">Reserva</a>
                        <a id="a-menu" href="#" class="list-group-item">Local de Reserva</a>
                    </div>
                <a id="a-menu" href="#" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fas fa-users"></i> Moradores <i id="seta" class="fas fa-angle-down" style="float: right; right:0;"></i></a>
                <div class="collapse" id="morador">
                    <a id="a-menu" href="{{ route('morador-principal') }}" class="list-group-item" data-parent="#menu3"><i class="fas fa-user"></i> Morador</a>
                    <a id="a-menu" href="{{ route('morador-automovel-principal') }}" class="list-group-item" data-toggle="collapse"><i class="fas fa-car"></i> Automóveis</a>
                    <a id="a-menu" href="{{ route('morador-animal-principal') }}" class="list-group-item"><i class="fas fa-paw"></i> Animais de estimação</a>
                </div>
                <a id="a-menu" href="{{ route('funcionario-principal') }}" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-users"></i> <span class="hidden-sm-down">Funcionários</span></a>
                <a id="a-menu" href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-cogs"></i> <span class="hidden-sm-down">Configurações</span></a>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function( $ ){
        $('a[data-toggle="collapse"]').click(function() {
            $(this).next('div').slideToggle();
        });
    });
</script>
