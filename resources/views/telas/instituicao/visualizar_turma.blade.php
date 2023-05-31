@extends('layouts.telas', ['title' => 'Skedoo - Responsaveis'], ['nometela' => 'Clientes - Responsaveis dos Alunos'])

@section('voltar')
    <x-button-back href="{{ route('instituicao.clientes') }}" icon="uil uil-angle-left" />
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection

@section('nav-telas')
<div class="nav">
    <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>
    <div class="perfil-bg">
        <h3>
            Bem-vindo, {{ session('login')['nm_login'] }}
            <a href="{{ route('instituicao.perfil') }}">
                @if($login->img_perfil)
                    <img name="image" class="img-perfil" class="img-personalizado" src="{{ url('storage/' . $login->img_perfil) }}" alt="">
                @else
                    <img name="image" class="img-perfil" src="https://i.stack.imgur.com/Bzcs0.png" alt="">
                @endif
            </a>
        </h3>
    </div>
</div>
@endsection

@section('content')
    <div class="div-visualizar">
        <h1 style="text-align: center;">Informações da Turma</h1><br>
        <div class="visualizar" style="background-color: white;">
        <h4>Turma</h4><br>
        <p>Nome: {{ $turma->nm_turma }}</p>
        <p>Periodo: {{ $turma->ds_periodo }}</p>
        <p>Sigla: {{ $turma->sg_turma }}</p>
        <p>Quantidade de alunos: quant. do banco - {{$turma->cd_total_aluno}}</p>
        <br>

        {{-- <h4>Alunos</h4><br>
        <p>Nome: {{ $aluno->nm_aluno }}</p>
        <p>Registro: {{$aluno->dt_nascimento}}</p>
        <p>Status 'Manipulação': {{$aluno->tb_turma->nm_turma}}  -  {{$aluno->tb_turma->ds_periodo}}</p> --}}
        </div>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
