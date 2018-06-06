<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('font-awesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css')}}">
    <link rel="stylesheet" href="{{ asset('semantic/semantic.css')}}">

    <!--FONTS GOOGLE-->
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">

    <script src="{{ asset('jQuery/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</head>
<body>

    <div class="background">
        <div id="text-login-img">
        </div>
    </div>

    <section id="conteudo-view" class="login">
        <h1>Login</h1>
        <h2>
            <i class="fa fa-building" style="font-size:48px;color: white;"></i> Condomínio
        </h2>

        <form class="ui form" action="{{ route('login/autenticar') }}" method="POST">
            <div class="field">
                <label></label>
                <input type="text" name="email">
            </div>
            <div class="field">
                <label></label>
                <input type="text" name="password">
            </div>
            <button class="ui blue button" type="submit">Entrar</button>
        </form>
    </section>
</body>
</html>