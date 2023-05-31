@extends('layouts.telas', ['title' => 'Skedoo - Chat'], ['nometela' => 'Mensagens'])

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mensagens.css') }}">
@endsection
@section('voltar')
    <x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
@endsection

@section('nav-telas')
<div class="nav">
    <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>
    <div class="perfil-bg">
        <h3>
            Bem-vindo, {{ session('login')['nm_login'] }}
            <a href="{{ route('instituicao.perfil') }}">
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
                <h5 class="tt-usuarios">Responsaveis</h5>
                @for($i = 0; $i < count($TbResponsavel); $i++)
                @foreach ($TbResponsavel[$i] as $Responsavel[$i])    
                <button class="usuario" onclick="getID({{$Responsavel[$i]->cd_cadastro}})">
                    <p id="nm{{$Responsavel[$i]->cd_cadastro}}">{{ $Responsavel[$i]->nm_responsavel }}</p>
                </button>
                @endforeach 
                @endfor
                <h5 class="tt-usuarios">Educadores</h5>
                @foreach ($TbEducadores as $Educador)    
                <button class="usuario" onclick="getID({{$Educador->nm_profissional}})">
                    <p id="nm{{$Educador->cd_cadastro}}">{{ $Educador->nm_profissional }}</p>
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
