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