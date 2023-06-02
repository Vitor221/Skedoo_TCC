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
        <p>Sigla: {{ $turma->sg_turma }}</p>
        @foreach ($TbAlunos as $TbAluno)
        <p>Quantidade de alunos:{{$qtdalunosNaTurma[$TbAluno->cd_turma]->total_alunos}} - {{$turma->cd_total_aluno}}</p>
        @endforeach
        <br>
        

       
            {{$alunosnaturma}}
        @foreach ($TbAlunos as $TbAluno)
        <tr class="pessoa">
            <td class="nome" scope style="width:70%;">{{ $TbAluno->nm_aluno }}</td>
            <td style="width: 20%;">{{ $TbAluno->cd_aluno }}</td>
            <td class="botoes"><button class="ver">Vizualizar</button>
            <td class="botoes"><button class="editar">Editar</button></td>
            <td>
                <form action="{{ route('instituicao.aluno.delete', $TbAluno->cd_aluno) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="deletar"><i class="uil uil-trash-alt"></i></button>
                </form>
            </td>
        </tr>
    @endforeach
        </div>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
