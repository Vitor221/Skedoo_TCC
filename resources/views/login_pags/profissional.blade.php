@extends('layouts.logins', ['title'=>'Skedoo - Educador'], ['nomelogin'=>'Educador'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_educador.css') }}">
@endsection

@section('content')
<div class="flex-cards">
    <x-card-funcoes tituloCard="Mensagens" href="{{route('profissional.clientes')}}" icon="uil uil-comments"/>
    <x-card-funcoes tituloCard="Turmas" href="{{route('profissional.alunos')}}" icon="uil uil-kid"/>
    <x-card-funcoes tituloCard="Saúde" href="{{route('profissional.clientes')}}" icon="uil uil-heart-medical"/>
</div>
<div class="flex-cards">
    <x-card-funcoes tituloCard="Serviços" href="{{route('profissional.clientes')}}" icon="uil uil-apps"/>
    <x-card-funcoes tituloCard="Configurações" href="{{route('profissional.clientes')}}" icon="uil uil-setting"/>
    <x-card-funcoes tituloCard="Ajuda" href="{{route('profissional.clientes')}}" icon="uil uil-question"/>
</div>

@endsection