@extends('layouts.main', ['title'=>'Skedoo - Login'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_login.css') }}">
@endsection

@section('content')
<form method="post" id="form" action="{{ route('login_pag') }}">
    @csrf
    <div class="login-main">
        <div class="left-login">
            <h2>Área de Acesso</h2>
            <img class="left-login-image" src="{{ asset('../img/img_login/bg-creche-criancas.svg') }}" alt="">
        </div>
        <div class="right-login">
            <div class="card-login">
                <div class="textfield">
                    <div class="error">
                        <p id="erroLogin"></p>
                    </div>
                    <label for="">Login:</label>
                    <input type="text" name="nm_login" id="nm_login" autocomplete="off">
                </div>
                <div class="textfield">
                    <div class="error">
                        <p id="erroSenha"></p>
                    </div>
                    <label for="">Senha:</label>
                    <input type="password" name="cd_senha" id="cd_senha">
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

<script src="../js/validacoesLogin.js"></script>
@endsection
