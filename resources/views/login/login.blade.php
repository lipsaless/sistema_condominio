<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/styleLogin.css')}}">

    <!--FONTS GOOGLE-->
    <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
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