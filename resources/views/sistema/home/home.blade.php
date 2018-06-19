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

<h2>Seja bem-vindo(a), <?php echo $_SESSION['usuario']['no_funcionario']; ?></h2>
<main id="menu-home" class="col-md-10">
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
            
            <h2 class="sub-header mt-5">Tópicos importantes</h2>
            <hr>
            <div class="mb-3">
                <div class="card-deck">
                    <div class="card card-inverse card-success text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>Conheça e respeite as regras que regem o seu condomínio. Por mais que você não concorde com algumas, terá que obedecê-las, pois foram aprovadas pela maioria
Jamais chame a empregada ou babá do vizinho para trabalhar na sua casa
Evite entrar em quaisquer tipos de fofocas ou boatos relacionados aos seus vizinhos
Lembre-se, a conversa amigável será sempre a melhor saída para resolução de conflitos com seu vizinho.
Procure sempre participar das assembleias e conhecer a pauta antecipadamente. É lá que os assuntos de interesse de todos são discutidos e votados. Quem não comparece fica sem condição de discutir depois.</p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="card card-inverse card-danger text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>O eficaz controle de visitantes no condomínio ajuda a manter a segurança dos moradores. Mas é preciso seguir regras para não haver falhas.</p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="card card-inverse card-warning text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>Respeite os horários de uso e não deixe a área toda suja após o uso – o ideal é retirar toda a parte principal do lixo e restos de comida e bebida
Faça uma lista com os nomes dos convidados para deixar na portaria
Informe-se e respeite as regras do local, principalmente em relação a barulho
Na churrasqueira, tenha bom senso no uso de aparelhos sonoros, que propagam muito mais ruído quando estão ao ar livre.</p>
                            </blockquote>
                        </div>
                    </div>
                    <div class="card card-inverse card-info text-center">
                        <div class="card-block">
                            <blockquote class="card-blockquote">
                                <p>Trate-os sempre com cordialidade
Se quiser fazer alguma reclamação, direcione-a ao zelador ou ao síndico
Lembre-se que o funcionário do condomínio não é seu empregado. Evite pedir que execute serviços particulares.</p>
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
        let msg = '<?php echo (session("msg")) ? session("msg")[0] : null ?>';
        if (msg) {
            message('error', msg);
        }

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