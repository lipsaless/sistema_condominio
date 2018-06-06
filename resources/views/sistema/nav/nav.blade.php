
<div id="nav-sistema" class="container-fluid">
    <nav class="navbar navbar-expand-lg navbar-light bg-faded">
        <a id="logo" class="navbar-brand" href="{{ route('sistema') }}">Condomínio</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div id="navbarNavDropdown" class="navbar-collapse collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#"> <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
            </ul>
            <ul class="navbar-nav"  style="float: right; right: 0;">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user"></i>
                      Perfil
                    </a>
                    <div id="perfil" class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}">Sair</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Sair  <i class="fas fa-sign-out-alt" style="color: red;"></i></a>
                </li>
            </ul>
        </div>
    </nav>
</div>

<script>
  $(document).ready(function() {
        $('#navbarDropdownMenuLink').unbind('click').click(function() {
            $(this).next('div').slideToggle();
        });
  });
</script>