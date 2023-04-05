@extends('layouts.logins', ['title'=>'Skedoo - Instituição'], ['nomelogin'=>'Instituição'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_instituicao.css') }}">
@endsection

@section('content')
<div class="flex-cards">
    <x-card-funcoes tituloCard="Mensagens" href="{{route('clientes')}}" icon="uil uil-comments"/>
    <x-card-funcoes tituloCard="Clientes" href="{{route('clientes')}}" icon="uil uil-head-side"/>
    <x-card-funcoes tituloCard="Colaboradores" href="{{route('clientes')}}" icon="uil uil-book-reader"/>
    <x-card-funcoes tituloCard="Turmas" href="{{route('alunos')}}" icon="uil uil-kid"/>
    <x-card-funcoes tituloCard="Saúde" href="{{route('clientes')}}" icon="uil uil-heart-medical"/>
</div>
<div class="flex-cards">
    <x-card-funcoes tituloCard="Financeiro" href="{{route('clientes')}}" icon="uil uil-money-withdraw"/>
    <x-card-funcoes tituloCard="Serviços" href="{{route('clientes')}}" icon="uil uil-apps"/>
    <x-card-funcoes tituloCard="Configurações" href="{{route('clientes')}}" icon="uil uil-setting"/>
    <x-card-funcoes tituloCard="Ajuda" href="{{route('clientes')}}" icon="uil uil-question"/>
</div>

@endsection