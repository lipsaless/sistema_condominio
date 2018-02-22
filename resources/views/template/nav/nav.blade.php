<link rel="stylesheet" href="style.css">

<nav>
    <div class="logo">LOGO</div>
    <ul>
        <li><a href="#">Home</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Blog</a></li>
        <li><a href="#">Contact</a></li>
        <li><a class="active" href="#" data-toggle="modal" data-target="#exampleModal">Login</a></li>
    </ul>
</nav>


<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="style.js"></script>

    <script type="text/javascript">
        $(window).on('scroll', function() {
            if ($(window).scrollTop()) {
                $('nav').addClass('black');
            } else {
                $('nav').removeClass('black');
            }
        });
    </script>