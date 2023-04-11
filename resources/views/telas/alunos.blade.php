@extends('layouts.telas', ['title' => 'Skedoo - Turmas'], ['nometela' => 'Turmas e Alunos'])

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
                    <th scope>{{ $TbAluno->cd_turma }}</th>
                    <th class="botoes"><button class="ver">Vizualizar</button><button class="editar">Editar</button><button
                            class="deletar"><i class="uil uil-trash-alt"></i></button></th>
                </tr>
            @endforeach

        </tbody>
    </table>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
