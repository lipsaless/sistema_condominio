<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Menu</title>
   <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="{{ asset('css/materialize.min.css') }}">
   <!-- Compiled and minified JS -->
   <link rel="stylesheet" href="{{ asset('js/materialize.min.js') }}">
  <!-- Custom fonts for this template-->
  <link href="{{ asset('font-awesome/css/fontawesome.min.css') }}" rel="stylesheet" type="text/css">
</head>

<nav>
  <ul class="hide-on-med-and-down">
    <li><a href="{{ asset('assets/img/condominio.png') }}"></a></li>
    <li><a href="#!">First Sidebar Link</a></li>
    <li><a href="#!">Second Sidebar Link</a></li>
  </ul>
  <ul id="slide-out" class="side-nav fixed">
      <li class="bold"><a href="#!" class="waves-effect waves-teal">First Sidebar Link</a></li>
      <li class="bold"><a href="#!" class="">Second Sidebar Link</a></li>
      <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
          <li>
            <a class="collapsible-header waves-effect waves-teal">Morador<i class="mdi-navigation-arrow-drop-down"></i></a>
            <div class="collapsible-body">
              <ul>
                <li><a href="#!">Morador</a></li>
                <li><a href="#!">Automóvel</a></li>
                <li><a href="#!">Animal</a></li>
              </ul>
            </div>
          </li>
        </ul>
      </li>
    </ul>
  <a href="#" data-activates="slide-out" class="button-collapse"><i class="mdi-navigation-menu"></i></a>
</nav>
    
<script src="{{ asset('jQuery/jquery-3.3.1.min.js') }}"></script>

<script>
  $(function() {
      
    

    $('.button-collapse').sideNav({
      menuWidth: 300,
      closeOnClick: true 
    });
  $('.collapsible').collapsible();
      
  });
</script>

</html>
