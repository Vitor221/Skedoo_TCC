@extends('layouts.main', ['title'=>'Skedoo - Login'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_login.css') }}">
@endsection

@section('content')

<nav>
    <a href="{{ route('skedoo_pag') }}"><img id="logo-skedoo" src="{{ asset('img/Skedoo.png') }}" alt="logo skedoo"></a>
    <ul class="menu_list">
        <li class="linkInicio"><a href="{{ route('inicio_pag') }}">Início</a></li>
        <x-botao-app />
    </ul>
</nav>

<form method="post" action="{{ route('login_pag') }}">
    @csrf
    <div class="login-block">
        <h2>Área de Acesso</h2>
            @if (session('mensagem'))
                <div class="alert alert-warn">
                    <p>{{ session('mensagem') }}</p>
                </div>
            @endif
        <div class="error">
            @if ($mensagem = Session::get('erro'))
                {{ $mensagem }}
            @endif
        </div>
        <div class="login-text">
            <div class="error">
                {{ $errors->first('nm_login') }}
            </div>
            <label for="">Login:</label>
            <br>
            <input type="text" name="nm_login" id="user">
        </div>
        <div class="login-passw">
            <div class="error">
                {{ $errors->first('cd_senha') }}
            </div>
            <label for="">Senha:</label>
            <br>
            <input type="password" name="cd_senha" id="password">
        </div>
        <div class="login-check">
            <input type="checkbox">&nbsp; Mantenha-me conectado
        </div>
        <div class="btn-submit">
            <div class="btn-entr">
                <button type="submit">Entrar</button>
            </div>
        </div>
        <span><a href=""> Esqueceu sua senha?</a></span>
    </div>
</form>
@endsection