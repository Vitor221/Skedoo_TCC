@extends('layouts.main', ['title'=>'Skedoo - Login'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_login.css') }}">
@endsection

@section('content')
<form method="post" action="{{ route('login_pag') }}">
    @csrf
    <div class="login-main">
        <div class="left-login">
            <h2>Área de Acesso</h2>
            <img class="left-login-image" src="{{ asset('../img/img_login/bg-creche-criancas.svg') }}" alt="">
        </div>
        <div class="error">
            @if (session('mensagem'))
                <div class="alert alert-warn">
                    <p>{{ session('mensagem') }}</p>
                </div>
            @endif
        </div>
        <div class="error">
            @if ($mensagem = Session::get('erro'))
                {{ $mensagem }}
            @endif
        </div>
        <div class="right-login">
            <div class="card-login">
                <div class="textfield">
                    <div class="error">
                        {{ $errors->first('nm_login') }}
                    </div>
                    <label for="">Login:</label>
                    <input type="text" name="nm_login" id="user">
                </div>
                <div class="textfield">
                    <div class="error">
                        {{ $errors->first('cd_senha') }}
                    </div>
                    <label for="">Senha:</label>
                    <input type="password" name="cd_senha" id="password">
                </div>
                <div class="login-check">
                    <input type="checkbox">&nbsp; Mantenha-me conectado
                </div>

                <button class="btn-entr" type="submit">Entrar</button>
            
                <span><a href=""> Esqueceu sua senha?</a></span>
            </div>
        </div>
    </div>
    <a class="link-home" href="{{ route('skedoo_pag') }}">Voltar</a>
</form>
@endsection