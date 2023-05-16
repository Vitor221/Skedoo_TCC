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
        <div class="div-mensagens">
            <div class="topo-mensagens">
                <h3>Nome do destinatario</h3>
            </div>
            <div class="mensagens">
                <div class="mensagem enviada">
                    <p>Ola</p>
                    <span>03/01/21</span>
                </div>
                <div class="mensagem recebida">
                    <p>Oi</p>
                    <span>03/01/21</span>
                </div>
                <div class="div-form">
                    <form class="form-mensagem">
                        <input type="text">
                        <button type="submit">Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
