@extends('layouts.telas', ['title' => 'Skedoo - Turmas'], ['nometela' => 'Turmas e Alunos'])

@section('content')
    <table class="tabela">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Cadastro</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($TbAluno as $TbAluno)
                <tr>
                    <th class="nome">{{ $TbAluno->nm_aluno }}</th>
                    <th>{{ $TbAluno->cd_turma }}</th>
            @endforeach
            </tr>
        </tbody>
    </table>
@endsection
