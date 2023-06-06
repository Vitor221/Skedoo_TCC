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
    <div class="container text-center conteudo-ajuda">
        <h2>Funções</h2>
        
        <div class="bg-ajuda">
            <div class="row align-items-start">

                <div class="col">
                    <i class="uil uil-envelope-add"></i>
                    <h3 class="sub-titulo">Mensagens</h3>
                    <p class="paragrafo">Permite enviar e receber mensagens em chats privados, direcionadas a educadores, responsáveis ou ambos. É uma forma de comunicação interna dentro do sistema.</p>
                </div>

                <div class="col">
                        <i class="uil uil-calendar-alt"></i>
                        <h3 class="sub-titulo">Calendário</h3>
                        <p class="paragrafo">Nesta seção, é possível realizar a visualização de eventos, inserir e excluir eventos criados. Os eventos podem ser marcados para o dia todo ou em uma hora específica. Além disso, é possível criar lembretes e notificações relacionados aos eventos.</p>
                </div>

                <div class="col">
                    <i class="uil uil-users-alt"></i>
                    <h3 class="sub-titulo">Turmas</h3>
                    <p class="paragrafo">Na seção das Turmas é possivel fazer a verificação de quais alunos pertencem a cada sala, editar, e criar novas salas.</p>
                </div>

            </div>
        </div>
    </div>

    <div class="contato-ajuda">
        <h2>Alguma duvida ou problema? Fale conosco.</h2>
        <p class="paragrafo"> <strong>email:</strong> skedoo@skedoo.com</p>
        <p class="paragrafo"> <strong>tel:</strong> (13) 996334709</p>
    </div>
@endsection
