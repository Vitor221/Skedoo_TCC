@extends('layouts.logins', ['title'=>'Skedoo - Responsável'], ['nomelogin'=>'Responsável'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_responsavel.css') }}">
@endsection

@section('content')
<div class="flex-cards">
    <x-card-funcoes tituloCard="Mensagens" href="{{route('responsavel.mensagens')}}" icon="uil uil-comments"/>
    <x-card-funcoes tituloCard="Saúde" href="{{route('responsavel.saude')}}" icon="uil uil-heart-medical"/>
    <x-card-funcoes tituloCard="Transporte" href="{{route('responsavel.transporte')}}" icon="uil uil-bus" />
    <x-card-funcoes tituloCard="Calendário" href="{{route('responsavel.calendario')}}" icon="uil uil-calendar-alt"/>
</div>
<div class="flex-cards" style="margin-bottom: 0px;">
    <x-card-funcoes tituloCard="Ajuda" href="{{route('responsavel.ajuda')}}" icon="uil uil-question"/>
</div>

<script src="{{ asset('js/config.js') }}"></script>

@endsection