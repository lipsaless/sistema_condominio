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

<h1 id="no_condominio" class="display-3 hidden-xs-down" style="text-align: center;">Condomínio 4 Amigos </h1>
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
                            <h6 class="text-info text-center">Automóveis</h6>
                            <h1 id="count-reserva" class="display-1 text-center">0</h1>
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
                            <h1 id="count-reserva" class="display-1 text-center">0</h1>
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

            <div class="row my-4">
                <div id="table-info-home" class="col-lg-9 col-md-8">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead class="thead-inverse">
                                <tr>
                                    <th>#</th>
                                    <th>Label</th>
                                    <th>Header</th>
                                    <th>Column</th>
                                    <th>Data</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1,001</td>
                                    <td>responsive</td>
                                    <td>bootstrap</td>
                                    <td>cards</td>
                                    <td>grid</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!--/row-->

            <hr>

            <!-- Fotos -->
            <h2 class="mt-5">Fotos</h2>

            <div class="card-columns mb-3">
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ asset('assets/img/home1.jpg') }}" alt="Residencial 4 amigos">
                    <div class="card-block">
                        <h4 class="card-title">Residencial 4 amigos</h4>
                        <p class="card-text">With screens getting smaller, Bootstrap 4 introduces a new grid breakpoint with the col-xl-* classes. This extra tier extends the media query range all the way down to 576 px. Eventhough the new XL tier would make one think it’s
                            been added to support extra large screens, it’s actually the opposite.</p>
                    </div>
                </div>
                <div class="card card-block">
                    <blockquote class="card-blockquote">
                        <p>Bootstrap 4 will be lighter and easier to customize.</p>
                        <footer>
                            <small class="text-muted">
                              Someone famous like <cite title="Source Title">Mark Otto</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
                <div class="card">
                    <img class="card-img-top img-fluid" src="{{ asset('assets/img/home1.jpg') }}." alt="Residencial 4 amigos">
                    <div class="card-block">
                        <h4 class="card-title">Card title</h4>
                        <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    </div>
                </div>
                <div class="card card-block text-center">
                    <h4 class="card-title">Clever heading</h4>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card">
                    <img class="card-img img-fluid" src="{{ asset('assets/img/home1.jpg') }}" alt="Residencial 4 amigos">
                </div>
                <div class="card card-block text-right">
                    <blockquote class="card-blockquote">
                        <p>There are also some interesting new text classes to uppercase or capitalize.</p>
                        <footer>
                            <small class="text-muted">
                              Someone famous in <cite title="Source Title">Bootstrap</cite>
                            </small>
                        </footer>
                    </blockquote>
                </div>
            </div>
            <!--/card-columns-->

            <a id="layouts"></a>
            <hr>
            <h2 class="sub-header mt-5">Interesting layouts and elements</h2>
            <div class="row mb-3">
                <div class="col-lg-6">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#home1" role="tab" data-toggle="tab">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#profile1" role="tab" data-toggle="tab">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#messages1" role="tab" data-toggle="tab">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#settings1" role="tab" data-toggle="tab">Settings</a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <br>
                        <div role="tabpanel" class="tab-pane active" id="home1">
                            <h4>Home</h4>
                            <p>
                                1. These Bootstrap 4 Tabs work basically the same as the Bootstrap 3.x tabs.
                                <br>
                                <br>
                                <button class="btn btn-primary-outline btn-lg">Wow</button>
                            </p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="profile1">
                            <h4>Pro</h4>
                            <p>
                                2. Tabs are helpful to hide or collapse some addtional content.
                            </p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="messages1">
                            <h4>Messages</h4>
                            <p>
                                3. You can really put whatever you want into the tab pane.
                            </p>
                        </div>
                        <div role="tabpanel" class="tab-pane" id="settings1">
                            <h4>Settings</h4>
                            <p>
                                4. Some of the Bootstrap 3.x components like well and panel have been dropped for the new card component.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-6">
                    <div class="card card-default card-block">
                        <ul id="tabsJustified" class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a class="nav-link" href="" data-target="#tab1" data-toggle="tab">List</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" href="" data-target="#tab2" data-toggle="tab">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="" data-target="#tab3" data-toggle="tab">More</a>
                            </li>
                        </ul>
                        <!--/tabs-->
                        <br>
                        <div id="tabsJustifiedContent" class="tab-content">
                            <div class="tab-pane" id="tab1">
                                <div class="list-group">
                                    <a href="" class="list-group-item"><span class="float-right label label-success">51</span> Home Link</a>
                                    <a href="" class="list-group-item"><span class="float-right label label-success">8</span> Link 2</a>
                                    <a href="" class="list-group-item"><span class="float-right label label-success">23</span> Link 3</a>
                                    <a href="" class="list-group-item text-muted">Link n..</a>
                                </div>
                            </div>
                            <div class="tab-pane active" id="tab2">
                                <div class="row">
                                    <div class="col-sm-7">
                                        <h4>Profile Section</h4>
                                        <p>Imagine creating this simple user profile inside a tab card.</p>
                                    </div>
                                    <div class="col-sm-5"><img src="//placehold.it/170" class="float-right img-responsive img-rounded"></div>
                                </div>
                                <hr>
                                <div class="spacer5"></div>
                            </div>
                            <div class="tab-pane" id="tab3">
                                <div class="list-group">
                                    <a href="" class="list-group-item"><span class="float-right label label-info label-pill">44</span> <code>.panel</code> is now <code>.card</code></a>
                                    <a href="" class="list-group-item"><span class="float-right label label-info label-pill">8</span> <code>.nav-justified</code> is deprecated</a>
                                    <a href="" class="list-group-item"><span class="float-right label label-info label-pill">23</span> <code>.badge</code> is now <code>.label-pill</code></a>
                                    <a href="" class="list-group-item text-muted">Message n..</a>
                                </div>
                            </div>
                        </div>
                        <!--/tabs content-->
                    </div>
                    <!--/card-->
                </div>
                <!--/col-->
                <div class="col-lg-6">
                    <div id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="card">
                            <div class="card-header" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Accordion example
                            </div>
                            <div id="collapseOne" class="card-block collapse in" role="tabpanel" aria-labelledby="headingOne">
                                <p>This is a Bootstrap 4 accordion that uses the <code>.card</code> classes instead of <code>.panel</code>. The single-open section aspect is not working because the parent option (dependent on .panel) has not yet been finalized
                                    in BS 4 alpha. </p>
                            </div>
                            <div class="card-header" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Mobile-first
                            </div>
                            <div id="collapseTwo" class="card-block collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <p>Just like it's predecesor, Bootstrap 4 is mobile-first so that you start by designing for smaller devices such as smartphones and tablets, then proceed to laptop and desktop layouts.</p>
                            </div>
                            <div class="card-header" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                Built for CSS3
                            </div>
                            <div id="collapseThree" class="card-block collapse" role="tabpanel" aria-labelledby="headingThree">
                                <p>Bootstrap employs a handful of important global styles and settings that you’ll need to be aware of when using it, all of which are almost exclusively geared towards the normalization of cross browser styles.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/col-->
            </div>
            <!--/row-->
        </main>
</body>

<script>
    $(document).ready(function() {
        //Carregar contagem da home
        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function countMorador() {
            for (var i = 0; i < <?php echo $contagemMorador ?>; i++) {
                await sleep(0.5);
                $("#count-morador").html(i + 1);
            }
        }

        async function countAutomovel()
        {
            for (var i = 0; i < 300; i++) {
                await sleep(1);
                $("#count-automovel").html(i + 1);
            }
        }
        
        async function countReserva()
        {
            for (var i = 0; i < 400; i++) {
                await sleep(1);
                $("#count-reserva").html(i + 1);
            }
        }
        
        async function countFuncionario()
        {
            for (var i = 0; i < 250; i++) {
                await sleep(1);
                $("#count-funcionario").html(i + 1);
            }
        }
        
        countMorador();
        countAutomovel();
        countReserva();
        countFuncionario();

        const titulo = document.querySelector('#no_condominio');
        typeWriter(titulo);
    });
</script>
@stop