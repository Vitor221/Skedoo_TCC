@extends('layouts.telas', ['title' => 'Skedoo - Ajuda'], ['nometela' => 'Como Utilizar o Software'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_responsavel.css') }}">
@endsection

@section('voltar')
<x-button-back href="{{route('responsavel')}}" icon="uil uil-estate"/>
@endsection

@section('nav-telas')
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
    <div class="div-conteudo" style="margin-top: 0px;">
        <h2>Funções</h2>
        <h3 class="sub-titulo">Mensagens</h3>
        <p class="paragrafo"> Permite enviar e receber mensagens em chats privados ou de modo geral, direcionadas a educadores, responsáveis ou ambos. É uma forma de comunicação interna dentro do sistema.</p>
        <h3 class="sub-titulo">Refeição</h3>
        <p class="paragrafo">Nesta seção, você pode visualizar as refeições que serão servidas, seja por semana ou pode fazer o download um PDF com as refeições do mês.</p>
        <h3 class="sub-titulo">Saúde</h3>
        <p class="paragrafo">Nesta seção, é possível solicitar o cadastro de condição de risco a saúde, como alergias, problemas respiratórios ou cardíacos. Essas informações ficam visíveis para a instituição.</p>
        <h3 class="sub-titulo">Calendario</h3>
        <p class="paragrafo">Nesta seção, é possível realizar a visualização de eventos, notificações e lembretes. Os eventos podem ser marcados para o dia ou uma sequencia de data escolhida.</p>
        <h2>Alguma duvida ou problema? Fale conosco.</h2>
        <p class="paragrafo">email: skedoo@skedoo.com</p>
        <p class="paragrafo">tel: (13) 996334709</p>
    </div>
@endsection
