@extends('layouts.telas', ['title'=>'Skedoo - Saúde'], ['nometela' => 'Saúde'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_responsavel.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilo_desenvolvimento.css') }}">
@endsection
@section('voltar')
<x-button-back href="{{route('responsavel')}}" icon="uil uil-estate"/>
@endsection

@section('content')
<div class="desenvolvimento-area">
    <img class="img" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <span class="texto-desenvolvimento">Em Desenvolvimento</span>
</div>
@endsection
