@extends('layouts.logins', ['title'=>'Skedoo - Educador'], ['nomelogin'=>'Educador'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_educador.css') }}">
@endsection

@section('conteudo-nav')
<div class="nav">
    <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>

    <div class="perfil-bg flex">
        <h3>
            Bem-vindo, {{ session('login')['nm_login'] }}
        </h3>
            <a href="{{ route('educador.perfil') }}">
                @if($login->img_perfil)
                    <img name="image" class="img-perfil" class="img-personalizado" src="{{ url('storage/' . $login->img_perfil) }}" alt="">
                @else
                    <img name="image" class="img-perfil" src="{{ asset('/img/perfil-padrao.png') }}" alt="">
                @endif
            </a>
    </div>
</div>
@endsection

@section('content')
<div class="flex-cards">
    <x-card-funcoes tituloCard="Mensagens" href="{{route('educador.mensagem')}}" icon="uil uil-comments"/>
    <x-card-funcoes tituloCard="Turmas" href="{{route('educador.alunos')}}" icon="uil uil-kid"/>
    <x-card-funcoes tituloCard="Calendário" href="{{route('educador.calendario')}}" icon="uil uil-calendar-alt"/>
    <x-card-funcoes tituloCard="Ajuda" href="{{route('educador.ajuda')}}" icon="uil uil-question"/>
</div>

<script src="{{ asset('js/config.js') }}"></script>

@endsection