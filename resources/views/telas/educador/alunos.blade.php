@extends('layouts.telas', ['title'=>'Skedoo - Alunos'], ['nometela' => 'Turmas e Alunos'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_educador.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilo_turmas.css') }}">
@endsection

@section('voltar')
<x-button-back href="{{route('educador')}}" icon="uil uil-estate"/>
@endsection

@section('nav-telas')
<div class="nav">
    <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>
    <div class="perfil-bg">
        <h3>
            Bem-vindo, {{ session('login')['nm_login'] }}
            <a href="{{ route('educador.perfil') }}">
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
<div class="div-tabela">
    <h2>Tabela de Turmas</h2>
    
    <table class="tabela">
        <thead>
            <tr>
                <th class="nome t-head-title ">Nome</th>
                <th class="nome t-head-title ">Periodo</th>
                <th class="nome t-head-title ">Sigla</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($TbTurma as $TbTurma)
                <tr>
                    <td class="nome" scope style="width:70%;">{{ $TbTurma->nm_turma }}</td>
                    <td class="nome" scope style="width:20%;">{{ $TbTurma->ds_periodo }}</td>
                    <td class="nome" scope style="width:20%;">{{ $TbTurma->sg_turma }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <h2>Alunos</h2><br><br>
    <table class="tabela">
        <thead>
            <tr class="pessoa">
                <th class="nome t-head-title">Nome</th>
                <th class="t-head-title">Turma</th>
                <th scope="col" id="abrePesquisa" class="pesquisa-tabela"style="height:82px;"><button
                        class="pesquisar" onclick="pesquisar()"><i class="uil uil-search"></i></button></th>
                <th scope="col" id="fechaPesquisa" class="pesquisa-tabela"style="display: none;"><button
                        class="pesquisar" onclick="fechaPesquisar()"><i class="uil uil-times"></i></button></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($TbAluno as $TbAluno)
                <tr class="pessoa">
                    <td class="nome" scope style="width:70%;">{{ $TbAluno->nm_aluno }}</td>
                    <td style="width: 20%;">{{ $TbAluno->tb_turma->nm_turma }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
</div>

<script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
