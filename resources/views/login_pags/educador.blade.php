@extends('layouts.logins', ['title'=>'Skedoo - Educador'], ['nomelogin'=>'Educador'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_educador.css') }}">
@endsection

@section('content')
<br><br>
<div class="flex-cards">
    <x-card-funcoes tituloCard="Mensagens" href="{{route('educador.mensagem')}}" icon="uil uil-comments"/>
    <x-card-funcoes tituloCard="Turmas" href="{{route('educador.alunos')}}" icon="uil uil-kid"/>
    <x-card-funcoes tituloCard="Calendário" href="{{route('educador.calendario')}}" icon="uil uil-calendar-alt"/>
    <x-card-funcoes tituloCard="Ajuda" href="{{route('educador.ajuda')}}" icon="uil uil-question"/>
</div>

<script src="{{ asset('js/config.js') }}"></script>

@endsection