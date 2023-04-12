@extends('layouts.telas', ['title' => 'Skedoo - Turmas'], ['nometela' => 'Turmas e Alunos'])


@section('voltar')
<x-button-back href="{{route('instituicao')}}" icon="uil uil-estate"/>
@endsection
@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection

@section('content')
    <table class="tabela">
        <h2>Tabela de Alunos</h2>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Turma</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($TbAluno as $TbAluno)
                <tr class="pessoa">
                    <th class="nome" scope>{{ $TbAluno->nm_aluno }}</th>
                    <th class="botoes"><button class="ver">Vizualizar</button>
                    <th class="botoes"><button class="editar">Editar</button></th>
                    <th class="botoes"><button class="deletar"><i class="uil uil-trash-alt"></i></button></th>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
