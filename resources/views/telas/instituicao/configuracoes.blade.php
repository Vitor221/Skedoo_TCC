@extends('layouts.telas', ['title'=>'Skedoo - Configurações'], ['nometela' => 'Configurações'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilo_desenvolvimento.css') }}">
@endsection
@section('voltar')
<x-button-back href="{{route('instituicao')}}" icon="uil uil-estate"/>
@endsection

@section('content')
<div class="desenvolvimento-area">
    <img class="img" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <span class="texto-desenvolvimento">Em Desenvolvimento</span>
</div>
@endsection
