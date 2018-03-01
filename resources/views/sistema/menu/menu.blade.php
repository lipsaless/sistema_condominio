
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Menu</title>


</head>

<body id="menu">

<div id="wrapper" class="toggled">
    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Start Bootstrap
                </a>
            </li>
            <li>
                <a id="dropdown" href="#" data-toggle="collapse" aria-expanded="false">morador</a>
                <div id="sub-links">
                    <a href="">Moradores</a>
                    <a href="">Automóveis</a>
                    <a href="">Animais</a>
                </div>
            </li>
            <li>
                <a href="#">Shortcuts</a>
            </li>
            <li>
                <a href="#">Overview</a>
            </li>
            <li>
                <a href="#">Events</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </div>
</div>

<script>
    $(function() {
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

        
             
            //Clica no botão para abrir e fechar o dropDown
            $('#dropdown').on('click', function(event){
               $('sub-links').slideToggle();
                //Evita que o evento seja notificado aos outros elementos. 
                event.stopPropagation();
            });
            
            //Clicando no html vai fechar o dorpDown
            $('html').on('click', function(){
                $('#opcoes').slideUp();
            });
    });
    
</script>
</body>



</html>
