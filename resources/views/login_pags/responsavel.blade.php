@extends('layouts.logins', ['title'=>'Skedoo - Responsável'], ['nomelogin'=>'Responsável'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_responsavel.css') }}">
@endsection

@section('conteudo-nav')
<div class="nav">
    <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>

    <div class="perfil-bg">
        <h3>
            Bem-vindo, {{ session('login')['nm_login'] }}
            <a href="{{ route('responsavel.perfil') }}">
                @if($login->img_perfil)
                    <img name="image" class="img-perfil" class="img-personalizado" src="{{ url('storage/' . $login->img_perfil) }}" alt="">
                @else
                    <img name="image" class="img-perfil" src="https://i.stack.imgur.com/Bzcs0.png" alt="">
                @endif
            </a>
        </h3>
    </div>
</div>
@endsection

@section('content')
<div class="flex-cards">
    <x-card-funcoes tituloCard="Mensagens" href="{{route('responsavel.mensagens')}}" icon="uil uil-comments"/>
    <x-card-funcoes tituloCard="Refeição" href="{{route('responsavel.refeicao')}}" icon="uil uil-crockery"/>
    <x-card-funcoes tituloCard="Saúde" href="{{route('responsavel.saude')}}" icon="uil uil-band-aid"/>
    <x-card-funcoes tituloCard="Calendário" href="{{route('responsavel.calendario')}}" icon="uil uil-calendar-alt"/>
    <x-card-funcoes tituloCard="Ajuda" href="{{route('responsavel.ajuda')}}" icon="uil uil-question"/>

</div>


<script src="{{ asset('js/config.js') }}"></script>

@endsection