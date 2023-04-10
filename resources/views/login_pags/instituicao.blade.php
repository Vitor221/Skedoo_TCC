@extends('layouts.logins', ['title'=>'Skedoo - Instituição'], ['nomelogin'=>'Instituição'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_instituicao.css') }}">
@endsection

@section('content')
<div class="flex-cards">
    <x-card-funcoes tituloCard="Mensagens" href="{{route('instituicao.clientes')}}" icon="uil uil-comments"/>
    <x-card-funcoes tituloCard="Clientes" href="{{route('instituicao.clientes')}}" icon="uil uil-head-side"/>
    <x-card-funcoes tituloCard="Colaboradores" href="{{route('instituicao.clientes')}}" icon="uil uil-book-reader"/>
    <x-card-funcoes tituloCard="Turmas" href="{{route('instituicao.alunos')}}" icon="uil uil-kid"/>
    <x-card-funcoes tituloCard="Saúde" href="{{route('instituicao.clientes')}}" icon="uil uil-heart-medical"/>
</div>
<div class="flex-cards">
    <x-card-funcoes tituloCard="Financeiro" href="{{route('instituicao.clientes')}}" icon="uil uil-money-withdraw"/>
    <x-card-funcoes tituloCard="Serviços" href="{{route('instituicao.clientes')}}" icon="uil uil-apps"/>
    <x-card-funcoes tituloCard="Configurações" href="{{route('instituicao.clientes')}}" icon="uil uil-setting"/>
    <x-card-funcoes tituloCard="Ajuda" href="{{route('instituicao.ajuda')}}" icon="uil uil-question"/>
</div>

@endsection