@extends('layouts.telas', ['title' => 'Skedoo - Responsaveis'], ['nometela' => 'Colaboradores -  Dados'])

@section('voltar')
    <x-button-back href="{{ route('instituicao.colaborador') }}" icon="uil uil-angle-left" />
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection

@section('content')
    <div class="div-visualizar">
        <h1 style="text-align: center;">Informações do cliente</h1><br>
        <div class="visualizar" style="background-color: white;">
        <h4>Colaborador</h4><br>
        <p>Nome: {{ $educador->nm_profissional }}</p>
        <p>CPF: {{ $educador->cd_cpf }}</p>
        <p>Turma: {{$educador->tb_turma->nm_turma}}  -  {{$educador->tb_turma->ds_periodo}}</p>
        </div>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
