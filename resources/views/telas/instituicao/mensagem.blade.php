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
                    <button class="usuario" onclick="getID({{$TbResponsavel->cd_cadastro}})">
                        <p id="nm{{$TbResponsavel->cd_cadastro}}">{{ $TbResponsavel->nm_responsavel }}</p>
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
