@extends('sistema.sistema')

@section('view-principal')

<style>
    .card-block {
    border-radius: 5px;
    }
    .display-3 {
        font-size: 2em;
    }
    .card {
        border: 0 !important;
    }
    .bg-info {
        background-color: #3F72AF !important;
        color: white;
    }
    .text-info {
        color: white !important;
        border: 0px solid #ccc;
        border-radius: 5px;
        background-color: #393E46;
        font-style: italic;
        padding: 10px;
    }
    h2 {
        text-align: center;
    }
</style>

<body>

<h1 id="no_condominio" class="display-3 hidden-xs-down" style="text-align: center;">CondMin </h1>
<main id="menu-home" class="col-md-10">
            <hr>
            <div class="alert alert-warning fade collapse" role="alert" id="myAlert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Holy guacamole!</strong> It's free.. this is an example theme.
            </div>
            <div class="row mb-3">
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-inverse card-success">
                        <div class="card-block bg-info">
                            <h6 class="text-info text-center">Moradores</h6>
                            <h1 id="count-morador" class="display-1 text-center">0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-inverse card-info">
                        <div class="card-block bg-info">
                            <h6 class="text-info text-center">Visitantes</h6>
                            <h1 id="count-visitante" class="display-1 text-center">0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-inverse card-danger">
                        <div class="card-block bg-info">
                            <h6 class="text-info text-center">Reservas</h6>
                            <h1 id="count-reserva" class="display-1 text-center">0</h1>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6">
                    <div class="card card-inverse card-warning">
                        <div class="card-block bg-info">
                            <h6 class="text-info text-center">Funcionários</h6>
                            <h1 id="count-funcionario" class="display-1 text-center">0</h1>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

            <hr>

            <h2 class="sub-header mt-5">Tópicos importantes</h2>
            <div class="mb-3">
                <div class="card-deck">
                    <div class="card card-inverse card-success text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>It's really good news that the new Bootstrap 4 now has support for CSS 3 flexbox.</p>
                                <footer>Makes flexible layouts <cite title="Source Title">Faster</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                    <div class="card card-inverse card-danger text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>The Bootstrap 3.x element that was called "Panel" before, is now called a "Card".</p>
                                <footer>All of this makes more <cite title="Source Title">Sense</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                    <div class="card card-inverse card-warning text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>There are also some interesting new text classes for uppercase and capitalize.</p>
                                <footer>These handy utilities make it <cite title="Source Title">Easy</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                    <div class="card card-inverse card-info text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>If you want to use cool icons in Bootstrap 4, you'll have to find your own such as Font Awesome or Ionicons.</p>
                                <footer>The Glyphicons are not <cite title="Source Title">Included</cite></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
            <!--/row-->

            <hr>

            <!-- Fotos -->
            <!-- <h2 class="mt-5">Fotos</h2> -->

            <!-- <div class="card-columns mb-4">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ asset('assets/img/home1.jpg') }}" alt="Residencial 4 amigos">
                </div>
                <div class="card">
                    <img class="card-img img-fluid" src="{{ asset('assets/img/home1.jpg') }}" alt="Residencial 4 amigos">
                </div>
                <div class="card">
                    <img class="card-img img-fluid" src="{{ asset('assets/img/home1.jpg') }}" alt="Residencial 4 amigos">
                </div>
            </div> -->
        </main>
</body>

<script>
    $(document).ready(function() {
        //Carregar contagem da home
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function countMorador() {
            for (var i = 0; i < <?php echo $contagemMorador; ?>; i++) {
                await sleep(0.5);
                $("#count-morador").html(i + 1);
            }
        }

        async function countAutomovel()
        {
            for (var i = 0; i < <?php echo $contagemVisitante; ?>; i++) {
                await sleep(1);
                $("#count-visitante").html(i + 1);
            }
        }
        
        async function countReserva()
        {
            for (var i = 0; i < <?php echo $contagemReserva; ?>; i++) {
                await sleep(1);
                $("#count-reserva").html(i + 1);
            }
        }
        
        async function countFuncionario()
        {
            for (var i = 0; i < <?php echo $contagemFuncionario ?>; i++) {
                await sleep(1);
                $("#count-funcionario").html(i + 1);
            }
        }
        
        countMorador();
        countAutomovel();
        countReserva();
        countFuncionario();

        // const titulo = document.querySelector('#no_condominio');
        // typeWriter(titulo);
    });
</script>
@stop