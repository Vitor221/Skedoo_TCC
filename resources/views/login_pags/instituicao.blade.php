@extends('layouts.logins', ['title'=>'Skedoo - Instituição'], ['nomelogin'=>'Instituição'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection

@section('content')
<div class="flex-cards">
    <x-card-funcoes tituloCard="Mensagens" href="{{route('instituicao.mensagem')}}" class="icon" icon="uil uil-comments"/>
    <x-card-funcoes tituloCard="Clientes" href="{{route('instituicao.clientes')}}" class="icon" icon="uil uil-head-side"/>
    <x-card-funcoes tituloCard="Colaboradores" href="{{route('instituicao.colaborador')}}" class="icon" icon="uil uil-book-reader"/>
    <x-card-funcoes tituloCard="Turmas" href="{{route('instituicao.alunos')}}" icon="uil uil-kid"/>
    <x-card-funcoes tituloCard="Saúde" href="{{route('instituicao.problemassaude')}}" icon="uil uil-band-aid"/>
</div>
<div class="flex-cards" style="margin-bottom: 0px;">
    <x-card-funcoes tituloCard="Refeição" href="{{route('instituicao.refeicao')}}" icon="uil uil-crockery"/>
    <x-card-funcoes tituloCard="Financeiro" href="{{route('instituicao.financeiro')}}" icon="uil uil-money-withdraw"/>
    <x-card-funcoes tituloCard="Calendário" href="{{route('instituicao.calendario')}}" icon="uil uil-calendar-alt"/>
    <x-card-funcoes tituloCard="Ajuda" href="{{route('instituicao.ajuda')}}" icon="uil uil-question"/>
</div>

<script src="{{ asset('js/config.js') }}"></script>

@endsection