@extends('layouts.logins', ['title'=>'Skedoo - Responsável'], ['nomelogin'=>'Responsável'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_responsavel.css') }}">
@endsection

@section('content')
<div class="flex-cards">
    <x-card-funcoes tituloCard="Mensagens" href="{{route('responsavel.clientes')}}" icon="uil uil-comments"/>
    <x-card-funcoes tituloCard="Saúde" href="{{route('responsavel.clientes')}}" icon="uil uil-heart-medical"/>
    <x-card-funcoes tituloCard="Serviços" href="{{route('responsavel.clientes')}}" icon="uil uil-apps"/>
    <x-card-funcoes tituloCard="Configurações" href="{{route('responsavel.clientes')}}" icon="uil uil-setting"/>
</div>
<div class="flex-cards">
    
    <x-card-funcoes tituloCard="Ajuda" href="{{route('responsavel.ajuda')}}" icon="uil uil-question"/>
</div>

@endsection