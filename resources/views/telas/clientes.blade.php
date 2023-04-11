@extends('layouts.telas', ['title' => 'Skedoo - Responsaveis'], ['nometela' => 'Clientes - Responsaveis dos Alunos'])

@section('voltar')
<x-button-back href="{{route('instituicao')}}" icon="uil uil-estate"/>
@endsection

@section('content')
    <table class="tabela">
        <h2>Tabela de Clientes</h2>
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Cadastro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($TbResponsaveis as $TbResponsavel)
                <tr class="pessoa">
                    <th class="nome">{{ $TbResponsavel->nm_responsavel }}</th>
                    <th scope>{{ $TbResponsavel->cd_cadastro }}</th>
                    <th class="botoes"><button class="ver">Vizualizar</button>
                    <th class="botoes"><button class="editar">Editar</button></th>
                    <th class="botoes"><button class="deletar"><i class="uil uil-trash-alt"></i></button></th>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination justify-content-center">
        {{ $TbResponsaveis->links()}}
    </div>
    
    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
