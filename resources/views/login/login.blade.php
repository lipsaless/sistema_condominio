<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="{{ asset('css/styleLogin.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
</head>
<body>

    <div class="background">
        <div id="text-login-img">
            
        </div>
    </div>


        <section id="conteudo-view" class="login">

        <h1>Condomínio</h1>
        <h3>O melhor</h3>

        {!! Form::open(['route' =>'login.login', 'method' => 'post']) !!}

        <p>Acesse o Sistema</p>

        <label>
            {!! Form::text('email', null, ['class'=>'input', 'placeholder'=>'Digite o email'])!!}    
        <label>

        <label>
            {!! Form::password('password', ['class'=>'input', 'placeholder'=>'Digite a senha'])!!}    
        <label>

        {!! Form::submit('Entrar')!!}


        {!! Form::close() !!}
        </section>
</body>
</html>