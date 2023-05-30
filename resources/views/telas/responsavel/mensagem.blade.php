@extends('layouts.telas', ['title' => 'Skedoo - Calendário'], ['nometela' => 'Mensagens'])

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_responsavel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mensagens.css') }}">
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
    <div class="div-conteudo">
        <div class="div-usuarios">
            <h3>Usuários</h3>
            <div class="usuarios">
                <h5 class="tt-usuarios">Instituição</h5>
                @foreach ($TbInstituicao as $TbInstituicao)
                    <button class="usuario" onclick="getID({{ $TbInstituicao->cd_cadastro }})">
                        <p id="nm{{ $TbInstituicao->cd_cadastro }}">{{ $TbInstituicao->nm_instituicao }}</p>
                    </button>
                @endforeach
                <h5 class="tt-usuarios">Educadores</h5>
                @foreach ($TbEducadores as $TbEducador)
                    <button class="usuario" onclick="getID({{ $TbEducador->cd_cadastro }})">
                        <p id="nm{{ $TbEducador->cd_cadastro }}">{{ $TbEducador->nm_profissional }}</p>
                    </button>
                @endforeach
            </div>
        </div>
        <div class="block">
            <div class="div-mensagens">
                <div class="topo-mensagens">
                    <h3 id="nomeChat">Nome do destinatario</h3>
                </div>
                <div id="div-mensagens" class="mensagens">
                    <h3 style="height:100%; width:100%; text-align:center; margin-top:10%">Carregando...</h3>
                </div>
            </div>
            <div class="div-form">
                <div class="form-mensagem" action="">
                    <input type="text" id="mensagem">
                    <button onclick="enviarMensagem()">Enviar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/configChat.js') }}"></script>
@endsection
