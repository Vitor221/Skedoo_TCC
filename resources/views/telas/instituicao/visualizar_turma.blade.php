@extends('layouts.telas', ['title' => 'Skedoo - Turmas'], ['nometela' => 'Turmas - Informações da turma'])

@section('voltar')
    <x-button-back href="{{ route('instituicao.alunos') }}" icon="uil uil-angle-left" />
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
        <p>Sigla: {{ $turma->sg_turma }}</p >
        @foreach($professoresnaturma as $professoresnaturma)
        <p>Professor(es): {{ $professoresnaturma->nm_profissional }}</p >
        @endforeach
        <p>Quantidade de alunos: {{$qtdalunosNaTurma->total_alunos}} -{{$turma->cd_total_aluno}}</p>
    
        <br>
        </thead>
           

       
            <h4>Alunos</h4><br>
            <table class="tabela">
            <thead>
                <tr class="pessoa">
                    <th class="nome t-head-title">Nome</th>
                    <th class="t-head-title">Registro</th>
                    <th></th></th>
                </tr>
            </thead>
            <tbody>
        @foreach ($alunosnaturma as $TbAluno)
        <tr class="pessoa">
            <td class="nome" scope style="width:70%;">{{ $TbAluno->nm_aluno }}</td>
            <td style="width: 20%;">{{ $TbAluno->cd_aluno }}</td>
            <td class="botoes"><button class="ver">Direcionar</button>
           
           
        </tr>
        @endforeach
        </div>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
