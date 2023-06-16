@extends('layouts.logins', ['title'=>'Skedoo - Instituição'], ['nomelogin'=>'Instituição'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection

@section('backgrounds')

<div class="background"></div>

@endsection

@section('conteudo-nav')
<div class="nav">
    <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>

    <div class="perfil-bg flex">
        <h3>
            Bem-vindo, {{ session('login')['nm_login'] }}
        </h3>
            <a class="img-div" href="{{ route('instituicao.perfil') }}">
                @if($login->img_perfil)
                    <img name="image" class="img-perfil" class="img-personalizado" src="{{ url('storage/' . $login->img_perfil) }}" alt="">
                @else
                    <img name="image" class="img-perfil" src="https://i.stack.imgur.com/Bzcs0.png" alt="">
                @endif
            </a>
    </div>
</div>
@endsection

@section('content')
<div class="flex-cards">
    <x-card-funcoes tituloCard="Mensagens" href="{{route('instituicao.mensagem')}}" class="icon" icon="uil uil-comments"/>
    <x-card-funcoes tituloCard="Calendário" href="{{route('instituicao.calendario')}}" icon="uil uil-calendar-alt"/>
    <x-card-funcoes tituloCard="Refeição" href="{{route('instituicao.refeicao.insert')}}" icon="uil uil-crockery"/>
    <x-card-funcoes tituloCard="Saúde" href="{{route('instituicao.problemassaude')}}" icon="uil uil-band-aid"/>
    <x-card-funcoes tituloCard="Financeiro" href="{{route('instituicao.financeiro')}}" icon="uil uil-bill"/>
</div>
<div class="flex-cards" style="margin-bottom: 0px;">
    <x-card-funcoes tituloCard="Dashboard" href="{{route('instituicao.dashboard')}}" icon="uil uil-chart-line"/>
    <x-card-funcoes tituloCard="Clientes" href="{{route('instituicao.clientes')}}" class="icon" icon="uil uil-head-side"/>
    <x-card-funcoes tituloCard="Colaboradores" href="{{route('instituicao.colaborador')}}" class="icon" icon="uil uil-book-reader"/>
    <x-card-funcoes tituloCard="Turmas" href="{{route('instituicao.alunos')}}" icon="uil uil-kid"/>
    <x-card-funcoes tituloCard="Ajuda" href="{{route('instituicao.ajuda')}}" icon="uil uil-question"/>
</div>

<script src="{{ asset('js/config.js') }}"></script>

@endsection
