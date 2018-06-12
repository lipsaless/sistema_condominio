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
    <style>
        #loader-login {
            margin-left: 8px;
        }
    </style>
</head>
<body>

    <!-- Parte da imagem -->
    <div class="background">
        <div id="text-login-img">
        </div>
    </div>
    
    <!-- Parte do login -->
    <section id="conteudo-view" class="login">
        <h2>
            <i class="fa fa-building" style="font-size:48px;color: white;"></i> Condomínio
        </h2>
        <!-- Formulário -->
        <form id="form-login" class="ui form" action="{{ route('login/autenticar') }}" method="POST">
            <h1>Login</h1>
            <!-- Mensagem erro -->
            <div id="msg-error" class="ui negative message" style="display:none;">
                <i class="close icon"></i>
                <div class="header">Dados inválidos.</div>
            </div>
            <div class="field">
                <label></label>
                <input type="text" name="email">
            </div>
            <div class="field">
                <label></label>
                <input type="password" name="password">
            </div>
            <button class="ui blue fluid button" type="submit"><span>Entrar</span></button>
        </form>
    </section>
</body>
</html>

<script>
    $(document).ready(function() {
        /* Enviar formulário de login para validação para rota 
        que está definida na action dele */
        $('#form-login').unbind('submit').submit(function(e) {
            e.preventDefault()

            $('#msg-error').css('display', 'none')

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') { 
                        window.location.href = json.redirect; // Caso seja autenticado o usuário redireciona para o sistema
                    } else {
                        $('#msg-error').css('display', 'block') // Caso não seja autenticado mostrar mensagem de erro
                        setTimeout(function(){ 
                            $('#msg-error').css('display', 'none')
                        }, 3000);
                    }
                },
                beforeSend: function () { // Antes de mandar o ajax adiciona loader no botão
                    $('#form-login button[type="submit"]').append('<div id="loader-login" class="ui mini active centered inline loader"></div>')
                },
                complete: function() {
                    $('#loader-login').remove()
                }
            })
        })
    })
</script>