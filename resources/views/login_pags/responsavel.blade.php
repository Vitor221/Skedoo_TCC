@extends('layouts.logins', ['title'=>'Skedoo - Responsável'], ['nomelogin'=>'Responsável'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_responsavel.css') }}">
@endsection

@section('content')
<div class="flex-cards1 flex-cards2">
    <x-card-funcoes tituloCard="Mensagens" href="{{route('responsavel.clientes')}}" icon="uil uil-comments"/>
    <x-card-funcoes tituloCard="Saúde" href="{{route('responsavel.clientes')}}" icon="uil uil-heart-medical"/>
    <x-card-funcoes tituloCard="Transporte" href="{{route('profissional.clientes')}}" icon="uil uil-bus" />
    <x-card-funcoes tituloCard="Configurações" href="{{route('responsavel.clientes')}}" icon="uil uil-setting"/>
</div>
<div class="flex-cards2">
    <x-card-funcoes tituloCard="Ajuda" href="{{route('responsavel.ajuda')}}" icon="uil uil-question"/>
</div>

<script src="{{ asset('js/config.js') }}"></script>

@endsection