@extends('layouts.telas', ['title' => 'Skedoo - Ajuda'], ['nometela' => 'Como Utilizar o Software'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_educador.css') }}">
@endsection

@section('voltar')
<x-button-back href="{{route('educador')}}" icon="uil uil-estate"/>
@endsection

@section('nav-telas')
<div class="nav">
    <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>
    <div class="perfil-bg">
        <h3>
            Bem-vindo, {{ session('login')['nm_login'] }}
            <a href="{{ route('educador.perfil') }}">
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
        <p class="paragrafo">Permite enviar e receber mensagens em chats privados ou de modo geral, direcionadas a educadores, responsáveis ou ambos. É uma forma de comunicação interna dentro do sistema.</p>
        <h3 class="sub-titulo">Calendario</h3>
        <p class="paragrafo" >Nesta seção, é possível realizar a visualização de eventos. Além disso, é possível criar lembretes e notificações relacionados aos eventos.</p>
        <h3 class="sub-titulo">Turmas</h3>
        <p class="paragrafo">Na seção das Turmas é possivel fazer a verificação de quais alunos pertencem a cada sala.</p>
        <h3 class="sub-titulo">Configurações</h3>
        <h2>Alguma duvida ou problema? Fale conosco.</h2>
        <p class="paragrafo">email: skedoo@skedoo.com</p>
        <p class="paragrafo">tel: (13) 996334709</p>
    </div>
@endsection
