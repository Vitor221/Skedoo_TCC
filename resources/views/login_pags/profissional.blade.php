@extends('layouts.logins', ['title'=>'Skedoo - Educador'], ['nomelogin'=>'Educador'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_educador.css') }}">
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