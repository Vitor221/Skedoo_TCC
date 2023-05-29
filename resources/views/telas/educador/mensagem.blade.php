@extends('layouts.telas', ['title' => 'Skedoo - Calendário'], ['nometela' => 'Mensagens'])

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_colaborador.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mensagens.css') }}">
@endsection
@section('voltar')
    <x-button-back href="{{ route('educador') }}" icon="uil uil-estate" />
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
    <div class="div-conteudo">
        <div class="div-usuarios">
            <h3>Usuários</h3>
            <div class="usuarios">
                {{-- @foreach ($TbResponsavel as $TbResponsavel)
                    <div class="usuario">
                        <p>{{ $TbResponsavel->nm_responsavel }}</p>
                    </div>
                @endforeach --}}
            </div>
        </div>
        <div class="block">
            <div class="div-mensagens">
                <div class="topo-mensagens">
                    <h3>Nome do destinatario</h3>
                </div>
                <div id="div-mensagens" class="mensagens">
                    <div class="mensagem enviada">
                        <p>Ola</p>
                        <span>03/01/21</span>
                    </div>
                    <div class="mensagem recebida">
                        <p>Oi</p>
                        <span>03/01/21</span>
                    </div>
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
