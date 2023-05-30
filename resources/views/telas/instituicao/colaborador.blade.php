@extends('layouts.telas', ['title'=>'Skedoo - Colaboradores'], ['nometela' => 'Colaboradores - Educadores'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilo_colaborador.css') }}">
@endsection
@section('voltar')
<x-button-back href="{{route('instituicao')}}" icon="uil uil-estate"/>
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
        <form class="form-cadastro" id="form" method="POST">
            @csrf
            <label>Nome do Educador</label>
            <input type="text" class="texto" style="width:100%; margin-bottom: 0.6em" id="name" name="name">

            <div class="div-input-flex">
                <div class="block" style="width:80%; margin-bottom: 0.6em">
                    <label>CPF</label><br>
                    <input type="text" class="texto" style="width:90%" id="cpf" name="cpf">
                </div>
            </div>

            <div class="div-input-flex">
                <div class="block" style="width: 80%; margin-bottom: 1em">
                    <label>Função do Educador</label>
                    <input type="text" class="texto" style="width:90%" id="funcao" name="funcao">
                </div>
            </div>

            <div class="block" style="width:20%;">
                <label>Turma</label>
                <br>
                <select for="turma" class="texto" name="turma" id="turma">
                    @foreach ($TbTurmas as $Turma)
                        <option value="{{ $Turma->cd_turma }}">{{ $Turma->sg_turma }}</option>
                    @endforeach
                </select><br><br>
            </div>

            <button type="reset" class="cancelar" onclick="fechaForm()">Cancelar</button>
            <input type="submit" class="enviar">
        </form>
    </div>
    
    <div class="search" id="pesquisa" style="display:none;">
        <form action="{{route('instituicao.colaborador')}}" method="get">
            <input type="search" name="s"  placeholder="Pesquisar colaborador" aria-label="Pesquisar" value="{{ request()->input('s') ?? '' }}">
            <button  type="submit"><i class="uil uil-search"></i></button>
        </form>
    </div>

    <div>
        <table class="tabela">
            <thead>
                <h2>Tabela de Clientes
                </h2>

                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Cadastro</th>
                    <th scope="col"></th>
                    <th scope="col"><button class="inserir" onclick="inserir()">Inserir</button></th>
                    <th scope="col" id="abrePesquisa" class="pesquisa-tabela"style="height:82px;"><button
                            class="pesquisar" onclick="pesquisar()"><i class="uil uil-search"></i></button></th>
                    <th scope="col" id="fechaPesquisa" class="pesquisa-tabela"style="display: none;"><button
                            class="pesquisar" onclick="fechaPesquisar()"><i class="uil uil-times"></i></button></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TbEducadores as $TbEducador)
                    <tr class="pessoa">
                        <td class="nome">{{ $TbEducador->nm_profissional }}</td>
                        <td scope>{{ $TbEducador->cd_cadastro }}</td>
                        <td class="botoes">
                            <form method="GET"
                                action="{{ route('instituicao.colaborador.view', $TbEducador->cd_profissional) }}">
                                <button type="submit" class="ver">Vizualizar</button>
                            </form>
                        </td>
                        <td class="botoes">
                            <form method="GET"
                                action="{{ route('instituicao.colaborador.atualizar', $TbEducador->cd_profissional) }}">
                                <button class="editar">Editar</button>
                            </form>
                        </td>
                        <td class="botoes">
                            <form method="POST"
                                action="{{ route('instituicao.colaborador.delete', $TbEducador->cd_profissional) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="deletar"><i class="uil uil-trash-alt"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination justify-content-center">

            @if (request()->input('s'))                                                                                                                                                                                                                                  
            {{ $TbEducadores->appends(['s' => request()->input('s')])->links() }}                                                                                                                                                                                                                                                                                             
            @else 
                {{ $TbEducadores->links() }}
            
            @endif
         
        </div>
        
    </div>
    

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
