<!DOCTYPE html>
<html lang="en">
<head>
	<title>CondMin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('login-style/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-style/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-style/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-style/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('login-style/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-style/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('login-style/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('login-style/css/main.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('semantic/semantic.css') }}">
<!--===============================================================================================-->

<style>
	#msg-error, #msg-sucesso {
		width: 100%;
	}
	#loader-login {
		margin-left: 8px;
	}
	.alert-danger {
		color: #ffffff;
		background-color: #f9717d;
		border-color: #d4bcbf00;
	}
</style>

</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-190 p-b-30">
				<form id="form-login" class="login100-form validate-form" action="{{ route('login/autenticar') }}" method="POST">
					<div class="login100-form-avatar">
						<img src="{{ asset('assets/img/predios.png') }}" alt="AVATAR">
					</div>

					<span class="login100-form-title p-t-20 p-b-45">
						CondMin
					</span>

					<!-- Mensagem sucesso -->
					<div id="msg-sucesso" class="alert alert-success" role="alert" style="display:none;">
						<strong>Validando dados...</strong>
					</div>

					<!-- Mensagem erro -->
					<div id="msg-error" class="alert alert-danger" role="alert" style="display:none;">
						<strong>Dados inválidos!</strong>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Username is required">
						<input class="input100" type="text" name="email" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-user"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input m-b-10" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock"></i>
						</span>
					</div>

					<div class="container-login100-form-btn p-t-10">
						<button class="login100-form-btn" type="submit"><span>Entrar</span></button>
					</div>

					<div class="text-center w-full p-t-25 p-b-230">
						<p class="txt1">Versão 1.0</p>
					</div>

					<!-- <div class="text-center w-full">
						<a class="txt1" href="#">
							Create new account
							<i class="fa fa-long-arrow-right"></i>						
						</a>
					</div> -->
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{ asset('login-style/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login-style/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login-style/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('login-style/js/main.js') }}"></script>

</body>


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
						$('#msg-sucesso').css('display', 'block')
                        window.location.href = json.redirect; // Caso seja autenticado o usuário redireciona para o sistema
                    } else {
                        $('#msg-error').css('display', 'block') // Caso não seja autenticado mostrar mensagem de erro
                        setTimeout(function(){ 
                            $('#msg-error').css('display', 'none')
                        }, 3000);
                    }
                },
                beforeSend: function () { // Antes de mandar o ajax adiciona loader no botão
                    $('.container-login100-form-btn button').append('<div id="loader-login" class="ui mini active centered inline loader"></div>')
                },
                complete: function() {
                    $('#loader-login').remove()
                }
            })
        })
    })
</script>

</html>