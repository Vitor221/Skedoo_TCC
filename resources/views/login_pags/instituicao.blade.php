@extends('layouts.logins', ['title'=>'Skedoo - Instituição'], ['nomelogin'=>'Instituição'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_instituicao.css') }}">
@endsection

@section('content')
<div class="flex-cards">
    <x-card-funcoes/>
    <x-card-funcoes/>
    <x-card-funcoes/>
    <x-card-funcoes/>
    <x-card-funcoes/>
</div><br><br>
<div class="flex-cards">
    <x-card-funcoes/>
    <x-card-funcoes/>
    <x-card-funcoes/>
    <x-card-funcoes/>
    <x-card-funcoes/>
</div>

@endsection