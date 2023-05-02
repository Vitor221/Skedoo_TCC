@extends('layouts.telas', ['title' => 'Skedoo - Turmas'], ['nometela' => 'Turmas e Alunos'])


@section('voltar')
    <x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection

@section('content')
    <div class="insert">
        <form class="form-cadastro" id="form" method="POST">
            @csrf
            <label>Nome do Aluno</label>
            <input type="text" class="texto" style="width:100%" id="name" name="name"><br><br>
            <div class="div-input-flex">
                <div class="block" style="width:20%;">
                    <label>Turma</label>
                    <br>
                    <select for="turma" class="texto">
                        <option>1A</option>
                        <option>2A</option>
                        <option>3A</option>
                        <option>1B</option>
                    </select><br><br>
                </div>
                <div class="block" style="width:80%;">
                    <label>Indique o responsavel pelo aluno</label><br>
                    <input type="text" class="texto" style="width:100%" id="email" name="email"
                        placeholder="Pesquisar nome..."><br><br>
                </div>
            </div>
            <label>O aluno possui algum problema de saúde? </label>
            <select class="texto" for="problemasaude" id="select_form_value" onchange="selectForm()">
                <option value="0">Não</option>
                <option value="1">Sim</option>
            </select><br><br>
            <div style="display: none;" id="select_form">
                <div class="div-input-flex">
                    <div class="block" style="width:40%;">
                        <label>Tipos de Problema</label><br>
                        <select name="tipos" id="tipos" class="texto">
                            <option class="opcao-alunos" value="0">Selecione...</option>
                            <option class="opcao-alunos" value="cardiaco">Cardíaco</option>
                            <option class="opcao-alunos" value="respiratorio">Respiratório</option>
                            <option class="opcao-alunos" value="alergico">Alérgico</option>
                            <option class="opcao-alunos" value="outro">Outro</option>
                        </select><br><br>
                    </div>
                    <div class="block" style="width:70%;">
                        <label>Nome do Problema</label><br>
                        <input type="text" style="width:100%" class="texto">
                    </div>
                </div>
                <label id="label_duv">Descrição do Problema e Cuidados</label>
                <textarea name="" id="textarea_div" cols="30" rows="10" style="width:100%"></textarea><br><br>

            </div>

            <button type="reset" class="cancelar" onclick="fechaForm()">Cancelar</button>
            <input type="submit" class="enviar">
        </form>
    </div>
    <div class="search" id="pesquisa" style="display:none;">
        <input type="search" placeholder="Pesquisar responsavel" aria-label="Pesquisar">
        <button type="submit"><i class="uil uil-search"></i></button>
    </div>
    <div class="div-tabela">
        <h2>Tabela de Turmas</h2>

        <table class="tabela">
            <thead>
                <tr>
                    <th class="nome">Nome</th>
                    <th class="nome">Periodo</th>
                    <th class="nome">Sigla</th>
                    <th></th>
                    <th></th>
                    <th scope="col"><button class="inserir" onclick="inserir()">Inserir</button></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TbTurma as $TbTurma)
                    <tr>
                        <td class="nome" scope>{{ $TbTurma->nm_turma }}</td>
                        <td class="nome" scope>{{ $TbTurma->ds_periodo }}</td>
                        <td class="nome" scope>{{ $TbTurma->sg_turma }}</td>
                        <td class="botoes"><button class="ver">Vizualizar</button>
                        <td class="botoes"><button class="editar">Editar</button></td>
                        <td class="botoes"><button class="deletar"><i class="uil uil-trash-alt"></i></button></td>
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
                    <th scope="col"><button class="inserir" onclick="inserir()">Inserir</button></th>
                    <th scope="col" id="abrePesquisa" class="pesquisa-tabela"style="height:82px;"><button
                            class="pesquisar" onclick="pesquisar()"><i class="uil uil-search"></i></button></th>
                    <th scope="col" id="fechaPesquisa" class="pesquisa-tabela"style="display: none;"><button
                            class="pesquisar" onclick="fechaPesquisar()"><i class="uil uil-times"></i></button></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($TbAluno as $TbAluno)
                    <tr class="pessoa">
                        <td class="nome" scope>{{ $TbAluno->nm_aluno }}</td>
                        <td>{{$TbAluno->tb_turma->nm_turma}}</td>
                        <td class="botoes"><button class="ver">Vizualizar</button>
                        <td class="botoes"><button class="editar">Editar</button></td>
                        <td class="botoes"><button class="deletar"><i class="uil uil-trash-alt"></i></button></td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <br>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
