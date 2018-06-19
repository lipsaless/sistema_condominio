<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CondMin</title>
    <link rel="icon" type="image/png" href="{{ asset('login-style/images/icons/favicon.ico') }}"/>
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/flexslider.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/jquery.fancybox.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/font-icon.css') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
      .header-content {
        font-size: 14pt;
        color: white;
        font-weight: bold;
      }
    </style>
</head>

<body>
<!-- header section -->
    <section class="banner" role="banner"> 
    <!--header navigation -->
    <header id="header">
        <div class="header-content clearfix"> Condmin 
        <nav class="navigation" role="navigation">
            <ul class="primary-nav">
                <li><a href="#">Home</a></li>
                <li><a href="#sobre">Começo</a></li>
                <li><a href="#services">Curiosidades</a></li>
                <!-- <li><a href="#works">Trabalhos</a></li> -->
                <!-- <li><a href="#teams">Sobre o sistema</a></li> -->
                <li><a href="#testimonials">Mais informações</a></li>
                <li><a id="login-style" href="{{ route('login') }}">Login</a></li>
            </ul>
        </nav>
        <a href="#" class="nav-toggle">Menu<span></span></a> </div>
    </header>
    <!--header navigation --> 
    <!-- banner text -->
    <div class="container">
        <div class="col-md-10 col-md-offset-1">
            <div class="banner-text text-center">
                <h1>CondMin</h1>
                <p>sistema administrativo</p>
                <nav role="navigation"> <a href="#services" class="banner-btn"><img src="{{ asset('template/images/down-arrow.png') }}" alt=""></a></nav>
            </div>
        <!-- banner text --> 
        </div>
    </div>
    </section>
<!-- header section --> 
<!-- about section -->
<section id="sobre" class="section sobre no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="flexslider">
        <ul class="slides">
          <li>
            <div class="col-md-6">
              <div class="avatar"> <img src="{{ asset('template/images/tech-copia.jpg') }}" alt="s" class="img-responsive" data-zoom-image="large/image1.jpg"> </div>
            </div>
            <div class="col-md-6" style="margin-top: 10%;">
              <blockquote>
                <h1>Sistema administrativo de condomínio</h1>
                <p>Apresentamos o sistema CondMin - Sistema de Gestão de Condomínios, ele foi desenvolvido para melhorar a qualidade de vida de síndicos, administradores de condomínios e moradores, com uma interface amigável e intuitiva, está sempre um passo a frente de seus concorrentes de mercado, oferecendo uma ferramenta de trabalho capaz de economizar tempo e dinheiro aliado a um visual limpo e inovador. </p>
              </blockquote>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- about section --> 

<!-- services section -->
<section id="services" class="services service-section">
  <div class="container">
    <div class="row">
      <div class="col-md-4 col-sm-6 services"> <span class="icon icon-strategy"></span>
        <div class="services-content">
          <h5>Moderno</h5>
          <p>Desenvolvido com tecnologia de ponta, utilizada pelas principais instituições financeiras do mundo, garantindo a integridade e a segurança de suas informações.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services"> <span class="icon icon-briefcase"></span>
        <div class="services-content">
          <h5>Fácil de ser usado</h5>
          <p>Execute tarefas diversas de administração de um ou vários condomínios em poucos cliques. Seja síndico ou administradora de condomínios.</p>
        </div>
      </div>
      <div class="col-md-4 col-sm-6 services"> <span class="icon icon-tools"></span>
        <div class="services-content">
          <h5>BACKUP E SEGURANÇA</h5>
          <p>Não se preocupe com instalações e atualizações. Deixe a responsabilidade dos backups e segurança por nossa conta.</p>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- services section --> 
<!-- work section -->
<!--
<section id="works" class="works section no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/dt.jpg') }}" class="work-box"> <img id="work1" src="{{ asset('template/images/dt.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>-->
        <!-- overlay 
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/tattoo2.jpg') }}" class="work-box"> <img src="{{ asset('template/images/tattoo2.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/tattoo3.jpg') }}" class="work-box"> <img src="{{ asset('template/images/tattoo3.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/tattoo4.jpg') }}" class="work-box"> <img src="{{ asset('template/images/tattoo4.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/work-5.jpg') }}" class="work-box"> <img src="{{ asset('template/images/work-5.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/work-6.jpg') }}" class="work-box"> <img src="{{ asset('template/images/work-6.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/work-7.jpg') }}" class="work-box"> <img src="{{ asset('template/images/work-7.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay 
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/work-8.jpg') }}" class="work-box"> <img src="{{ asset('template/images/work-8.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/work-9.jpg') }}" class="work-box"> <img src="{{ asset('template/images/work-9.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/work-10.jpg') }}" class="work-box"> <img src="{{ asset('template/images/work-10.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/work-11.jpg') }}" class="work-box"> <img src="{{ asset('template/images/work-11.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay 
        </a> </div>
      <div class="col-lg-2 col-md-4 col-sm-4 work"> <a href="{{ asset('template/images/work-12.jpg') }}" class="work-box"> <img src="{{ asset('template/images/work-12.jpg') }}" alt="">
        <div class="overlay">
          <div class="overlay-caption">
            <p><span class="icon icon-magnifying-glass"></span></p>
          </div>
        </div>
        <!-- overlay 
        </a> </div>
    </div>
  </div>
</section>
<!-- work section --> 
<!-- our team section
<section id="teams" class="section teams">
  <div class="container">
    <div class="row"> 
      <!-- team member 1
      <div class="col-md-4 col-sm-8 hidden">
        <div class="person"> <img src="{{ asset('template/images/team-1.png') }}" alt="" class="img-responsive">
          <div class="person-content">
            <h4>Marcos Antônio</h4>
            <h5 class="role">Tatuador</h5>
            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. </p>
          </div>
          <ul class="social-icons clearfix">
            <li><a href="#"><span class="fa fa-facebook"></span></a></li>
            <li><a href="#"><span class="fa fa-twitter"></span></a></li>
            <li><a href="#"><span class="fa fa-linkedin"></span></a></li>
            <li><a href="#"><span class="fa fa-google-plus"></span></a></li>
            <li><a href="#"><span class="fa fa-dribbble"></span></a></li>
          </ul>
        </div>
      </div>
      <!-- team member 1

      <!-- team member 2
      <div class="col-md-4 col-sm-8" style="float: center !important; ">
        <div class="person"> <img src="images/team-1.png" alt="" class="img-responsive">
          <div class="person-content">
            <h4>Marcos Antônio</h4>
            <h5 class="role">Tatuador</h5>
            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          </div>
          <ul class="social-icons clearfix">
            <li><a href="#" class=""><span class="fa fa-facebook"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-twitter"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-linkedin"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-google-plus"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-dribbble"></span></a></li>
          </ul>
        </div>
      </div>
      <!-- team member 2 
      
      <!-- team member 3 
      <div class="col-md-4 col-sm-8 hidden">
        <div class="person"> <img src="{{ asset('template/images/team-3.png') }}" alt="" class="img-responsive">
          <div class="person-content">
            <h4>Mike Collins</h4>
            <h5 class="role">Technical lead</h5>
            <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          </div>
          <ul class="social-icons clearfix">
            <li><a href="#" class=""><span class="fa fa-facebook"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-twitter"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-linkedin"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-google-plus"></span></a></li>
            <li><a href="#" class=""><span class="fa fa-dribbble"></span></a></li>
          </ul>
        </div>
      </div>
      <!-- team member 1
    </div>
  </div>
</section>
<!-- our team section --> 
<!-- Testimonials section -->
<section id="testimonials" class="section testimonials no-padding">
  <div class="container-fluid">
    <div class="row no-gutter">
      <div class="flexslider">
        <ul class="slides">
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>" Revolucione sua administração de condomínios com o sistema online mais inteligente do mercado.."</h1>
                <p></p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"O sistema que se adapta a você!." </h1>
                <p></p>
              </blockquote>
            </div>
          </li>
          <li>
            <div class="col-md-12">
              <blockquote>
                <h1>"Faça mais com uma plataforma completa e moderna.." </h1>
                <p></p>
              </blockquote>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>
<!-- Testimonials section --> 
<!-- Get a quote section -->
<section id="contact" class="section quote">
  <div class="container">
    <div class="col-md-8 col-md-offset-2 text-center">
      <a href="#" class="btn btn-large">Voltar para o topo <span class="glyphicon glyphicon-arrow-up" aria-hidden="true"></span></i>

      </a>
    </div>
  </div>
</section>
<!-- Get a quote section --> 
<!-- Footer section -->
<footer class="footer">
  <div class="footer-top section">
    <div class="container">
      <div class="row">
        <div class="footer-col col-md-6">
          <h5>Localização</h5>
          <p>Brasília - DF.<br>
            Samambaia Norte<br>
            suporte@gmail.com</p>
        </div>
        <div class="footer-col col-md-3">
          <h5>Redes Sociais</h5>
          <ul class="footer-share">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <p style="text-align: center;">Design by CondMin</p>
  </div>
  <!-- footer top --> 
  
</footer>
<!-- Footer section --> 
<!-- JS FILES --> 
<script src="{{ asset('template/js/jquery.min.js') }}"></script> 
<script src="{{ asset('template/js/bootstrap.min.js') }}"></script> 
<script src="{{ asset('template/js/jquery.flexslider-min.js') }}"></script> 
<script src="{{ asset('template/js/jquery.fancybox.pack.js') }}"></script> 
<script src="{{ asset('template/js/retina.min.js') }}"></script> 
<script src="{{ asset('template/js/modernizr.js') }}"></script> 
<script src="{{ asset('template/js/main.js') }}"></script>

</body>
</html>
