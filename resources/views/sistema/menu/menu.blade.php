<div class="container-fluid">
    <div class="row d-flex d-md-block flex-nowrap wrapper">
        <div class="col-md-2 float-left col-1 pl-0 pr-0 collapse width show" id="sidebar">
            <div class="list-group border-0 card bg-faded text-center text-md-left">
                <div id="img">
                    <img src="{{ asset('assets/img/predios.png') }}" alt="">
                </div>
                <hr style="background: white; padding: 1px;">
                <a href="{{ route('sistema') }}" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fas fa-home"></i> Home</a>
                <a href="#reserva" class="list-group-item" data-toggle="collapse">Reserva</a>
                    <div class="collapse" id="reserva">
                        <a href="#" class="list-group-item">Reserva</a>
                        <a href="#" class="list-group-item">Local de Reserva</a>
                    </div>
                <a href="#morador" class="list-group-item d-inline-block collapsed" data-toggle="collapse" data-parent="#sidebar" aria-expanded="false"><i class="fas fa-user"></i> Morador</a>
                <div class="collapse" id="morador">
                    <a href="{{ route('morador-principal') }}" class="list-group-item" data-parent="#menu3"><i class="fas fa-user"></i> Morador</a>
                    <a href="#" class="list-group-item" data-toggle="collapse"><i class="fas fa-car"></i> Automóveis</a>
                    <a href="#" class="list-group-item" data-parent="#menu3"><i class="fas fa-paw"></i> Animais</a>
                </div>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-users"></i> <span class="hidden-sm-down">Funcionários</span></a>
                <a href="#" class="list-group-item d-inline-block collapsed" data-parent="#sidebar"><i class="fa fa-cogs"></i> <span class="hidden-sm-down">Configurações</span></a>
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