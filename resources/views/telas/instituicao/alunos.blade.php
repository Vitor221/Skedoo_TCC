@extends('layouts.telas', ['title' => 'Skedoo - Turmas'], ['nometela' => 'Turmas e Alunos'])


@section('voltar')
    <x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
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
    <div class="insert">

        <form class="form-cadastro" id="formTurma" method="POST" action="{{route('instituicao.turma.insert')}}">
            @csrf
            <label>Nome da Turma</label>
            <input type="text" class="texto" style="width:100%" id="nomeTurma" name="nomeTurma"><br><br>
            <div class="div-input-flex">
                <div class="block" style="width:20%;">
                    <label>Periodo</label>
                    <br>
                    <select id="periodo" name="periodo" for="turma" class="texto">
                        <option value="M" id="M">Manhã</option>
                        <option value="T" id="T">Tarde</option>
                        <option value="I" id="I ">Integral</option>
                    </select><br><br>
                </div>
                <div class="block" style="width:60%;">
                    <label>Sigla da Turma</label><br>
                    <input type="text" class="texto" style="width:100%" id="sigla" name="sigla"
                        placeholder="Digite até 5 (cinco) letras..."><br><br>
                </div>
            </div>
            <button type="reset" class="cancelar" onclick="fechaFormTurma()">Cancelar</button>
            <input type="submit" class="enviar">
        </form>



    </div>
    <div class="search" id="pesquisa" style="display:none;">
        <form action="{{route('instituicao.alunos')}}" method="get">
            <input type="search" name="s"  placeholder="Pesquisar alunos" aria-label="Pesquisar" value="{{ request()->input('s') ?? '' }}">
            <button  type="submit"><i class="uil uil-search"></i></button>
        </form>
    </div>

    @if (session('success'))
        <h3>{{ session('success') }}</h3>
    @endif

    <div class="div-tabela">
        <h2>Tabela de Turmas</h2>
        @if (session('delete'))
            <div class="alert alert-success">{{ session('delete') }}</div>
        @endif
        <table class="tabela">
            <thead>
                <tr>
                    <th class="nome">Nome</th>
                    <th class="nome">Periodo</th>
                    <th class="nome">Sigla</th>
                    <th></th>
                    <th></th>
                    <th scope="col"><button class="inserir" onclick="inserirTurma()">Inserir</button></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TbTurma as $TbTurma)
                    <tr>
                        <td class="nome" scope style="width:70%;">{{ $TbTurma->nm_turma }}</td>
                        <td class="nome" scope style="width:20%;">{{ $TbTurma->ds_periodo }}</td>
                        <td class="nome" scope style="width:20%;">{{ $TbTurma->sg_turma }}</td>
                        <td class="botoes"><button class="ver">Vizualizar</button>
                        <td class="botoes"><button class="editar">Editar</button></td>
                        <td>
                            <form method="POST" action="{{ route('instituicao.turma.delete', $TbTurma->cd_turma) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="deletar"><i class="uil uil-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <h2>Alunos</h2><br><br>
        <table class="tabela">
            <thead>
                <tr class="pessoa">
                    <th class="nome">Nome</th>
                    <th>Turma</th>
                    <th></th>
                    <th></th></th>
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

            </tbody>
        </table>
        <br>
        <div>
        @if (request()->input('s'))                                                                                                                                                                                                                                  
            {{ $TbAlunos->appends(['s' => request()->input('s')])->links() }}                                                                                                                                                                                                                                                                                             
            @else 
                {{ $TbAluno->links() }}
            
            @endif
        </div>
    
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
