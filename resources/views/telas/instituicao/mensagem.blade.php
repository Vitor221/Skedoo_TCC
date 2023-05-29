@extends('layouts.telas', ['title' => 'Skedoo - Calendário'], ['nometela' => 'Mensagens'])

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mensagens.css') }}">
@endsection
@section('voltar')
    <x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
@endsection

@section('content')
    <div class="div-conteudo">
        <div class="div-usuarios">
            <h3>Usuários</h3>
            <div class="usuarios">
                @foreach ($TbResponsavel as $TbResponsavel)
                    <div class="usuario">
                        <p>{{ $TbResponsavel->nm_responsavel }}</p>
                    </div>
                @endforeach
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
