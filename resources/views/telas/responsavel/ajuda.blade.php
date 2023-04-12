@extends('layouts.telas', ['title' => 'Skedoo - Ajuda'], ['nometela' => 'Como Utilizar o Software'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_responsavel.css') }}">
@endsection

@section('voltar')
<x-button-back href="{{route('responsavel')}}" icon="uil uil-estate"/>
@endsection

@section('content')
    <div class="div-conteudo" style="margin-top: 0px;">
        <h2>Funções</h2>
        <h3 class="sub-titulo">Mensagens</h3>
        <p class="paragrafo">Na seção mensagens serão recebidas mensagens da instituição e o envio de mensagens em chats privados ou de modo geral para responsaveis.</p>
        <h3 class="sub-titulo">Turmas</h3>
        <p class="paragrafo">Na seção das Turmas é possivel enviar mensagens individualmente para uma turma especifica ou selecionar as turmas que receberão o recado.</p>
        <h3 class="sub-titulo">Saúde</h3>
        <p class="paragrafo">Na seção saúde é possivel visualizar alunos com problemas de saúde como alergias, problemas respiratórios ou cardiacos.</p>
        <h3 class="sub-titulo">Configurações</h3>
        <p class="paragrafo">Em configurações é possivel alterar as configuracões do software como tamanho de fontes e modos de daltonismo ou modo escuro.</p>
        <h2>Alguma duvida ou problema? Fale conosco.</h2>
        <p class="paragrafo">email: skedoo@skedoo.com</p>
        <p class="paragrafo">tel: (13) 996334709</p>
    </div>
@endsection
