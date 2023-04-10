@extends('layouts.logins', ['title'=>'Skedoo - Educador'], ['nomelogin' => 'Serviços'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_instituicao.css') }}">
@endsection

@section('content')

<div class="flex-cards">
    <x-card-funcoes tituloCard="Transporte" href="{{route('profissional.clientes')}}" icon="uil uil-bus" />
    <x-card-funcoes tituloCard="Refeição" href="{{route('profissional.alunos')}}" icon="uil uil-crockery"/>
</div>

<div class="flex">
    <div class="div-voltar">
        <a href="{{ url()->previous() }}" class="voltar-link">Voltar</a>
    </div>
</div>


@endsection