@extends('layouts.main')

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_login.css') }}">
@endsection

@section('title', 'Login')

@section('content')

<nav>
    <a href="{{ route('skedoo_pag') }}" class="imgLink"><img id="logo-skedoo" src="{{ asset('img/Skedoo.png') }}" alt="logo skedoo"></a>
    <ul class="menu_list">
        <li class="linkInicio"><a href="{{ route('inicio_pag') }}">Início</a></li>
        <li id="baixe_app-list" class="menu_item"><a id="baixe_app" href="">Baixe o App</a></li>
    </ul>
</nav>

<form method="post" action="">
    @csrf
    <div class="login-block">
        <h2>Área de Acesso</h2>
        <div class="login-text">
            <label for="">Login:</label>
            <br>
            <input type="text" name="user" id="user">
        </div>
        <div class="login-passw">
            <label for="">Senha:</label>
            <br>
            <input type="password" name="password" id="password">
        </div>
        <div class="login-check">
            <input type="checkbox">&nbsp; Mantenha-me conectado
        </div>
        <div class="btn-submit">
            <div class="btn-canc">
                <button type="submit">Cancelar</button>
            </div>
            <div class="btn-entr">
                <button type="submit">Entrar</button>
            </div>
        </div>
        <span><a href=""> Esqueceu sua senha?</a></span>
    </div>
</form>
@endsection