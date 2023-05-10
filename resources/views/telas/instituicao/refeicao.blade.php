@extends('layouts.telas', ['title'=>'Skedoo - Refeição'], ['nometela' => 'Refeição'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection
@section('voltar')
<x-button-back href="{{route('instituicao')}}" icon="uil uil-estate"/>
@endsection

@section('content')
<div class="div-conteudo">
    <h1 style="color:white; margin-left: 28%;">CONTROLE DE CARDÁPIO</h1>
    <br>
    <form method="POST" action="{{ route('instituicao.saude.refeicao.insert') }}" enctype="multipart/form-data">
    @csrf
    <label>Arquivo:</label>
    <input type="file" id="url" name="url" />
    <input type="submit" value="Enviar" />
    </form>

</div>
@endsection
