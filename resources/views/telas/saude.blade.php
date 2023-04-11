@extends('layouts.telas', ['title'=>'Saude'], ['nometela' => 'Saúde'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_instituicao.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilo_saude.css') }}">
@endsection

@section('voltar')
<x-button-back href="{{route('instituicao')}}" icon="uil uil-estate"/>
@endsection

@section('content')
<div class="flex-cards">
    <x-card-funcoes tituloCard="Problemas de Saúde" href="{{route('instituicao.problemassaude')}}" icon="uil uil-band-aid"/>
    {{-- <x-card-funcoes tituloCard="Alergias Alimentares" href="{{route('profissional.alunos')}}" icon="uil uil-crockery"/> --}}
    <x-card-funcoes tituloCard="Refeição" href="{{route('profissional.alunos')}}" icon="uil uil-crockery"/>
</div>


@endsection