@extends('layouts.telas', ['title' => 'Skedoo - Responsaveis'], ['nometela' => 'Clientes - Responsaveis dos Alunos'])

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
            <label>Nome do Cliente</label>
            <input type="text" class="texto" style="width:100%" id="name" name="name"><br><br>
            <div class="div-input-flex">
                <div class="block" style="width:40%;">
                    <label>CPF</label><br>
                    <input type="text" class="texto" style="text-align:center; width:90%" id="cpf" name="cpf">
                </div>
                <div class="block" style="width:60%;">
                    <label>Email</label><br>
                    <input type="text" class="texto" style="width:100%" id="email" name="email"><br><br>
                </div>
            </div>
            <div class="div-input-flex">
                <div class="block" style="width:50%;">
                    <label>Telefone</label><br>
                    <input type="text" class="texto" id="tel" name="tel">
                </div>
                <div class="block" style="width:45%;">
                    <label>Celular</label><br>
                    <input type="text" class="texto" style="width:100%" id="cel" name="cel"><br><br>
                </div>
            </div>
            <div class="div-input-flex">
                <div class="block" style="width:90%;">
                    <label>Cidade</label><br>
                    <input type="text" class="texto" id="cidade" name="cidade" style="width:90%;">
                </div>
                <div class="block" style="width:90%;">
                    <label>Logradouro</label><br>
                    <input type="text" class="texto" id="logradouro" name="logradouro" style="width:90%;">
                </div>
                <div class="block" style="width:25%;">
                    <label>Numero</label></label><br>
                    <input type="text" class="texto" style="width:100%" id="num" name="num"><br><br>
                </div>
            </div>
            <div class="div-input-flex">
                <div class="block" style="width:50%;">
                    <label>CEP</label><br>
                    <input type="text" class="texto" id="cep" value="" name="cep" onblur="pesquisacep(this.value);">
                </div>
                <div class="block" style="width:45%;">
                    <label>Bairro</label></label><br>
                    <input type="text" class="texto" style="width:100%" id="bairro" name="bairro"><br><br>
                </div>
            </div>
            <div class="div-input-flex">
                <div class="block" style="width:90%;">
                    <label>Complemento</label><br>
                    <input type="text" class="texto" id="complemento" name="complemento" style="width:90%;">
                </div>
                <div class="block" style="width:25%;">
                    <label>UF</label></label><br>
                    <input type="text" class="texto" style="width:100%" id="uf" name="uf"><br><br>
                </div>
            </div>
            <button type="button" class="enviar" style="background-color:#f3a033;" onclick="inserirAluno()">Adicionar aluno</button><br><br>
            <div class="form-aluno" id="form_aluno" style="display:none;">
                <div class="div-input-flex">
                    <div class="block" style="width:75%;">
                        <label>Nome do Aluno</label><br>
                        <input type="text" class="texto" style="width:100%" id="nomeAluno" name="nomeAluno"><br><br>
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
                </div>
                <label>O aluno possui algum problema de saúde? </label>
                <select name="ps" class="texto" for="problemasaude" id="select_form_value"
                    onchange="selectForm()">
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
                            <input type="text" style="width:100%" class="texto" name="nomePS">
                        </div>
                    </div>
                    <label id="label_duv">Descrição do Problema e Cuidados</label>
                    <textarea name="descricaoPS" id="textarea_div" cols="30" rows="10" style="width:100%" name="descPS"></textarea><br><br>
                </div>
                <input type="button" value="Cancelar" class="cancelar" onclick="fechaFormAluno()">
                <input type="button" value="Adicionar aluno ao responsavel" class="enviar" onclick="adicionarAlunoResponsavel()">
            </div>
            <div class="div-input-flex" id="infoAluno" style="display:none;">
                <div class="block" style="width:75%;">
                    <label>Nome do Aluno</label><br>
                    <label type="text" class="texto" style="width:100%" id="infoAlunoNome"></label><br><br>
                </div>
                <div class="block" style="width:20%;">
                    <label>Turma</label>
                    <br>
                    <label type="text" class="texto" style="width:100%" id="infoAlunoTurma"></label><br><br><br><br>
                </div>
            </div>
            <button type="reset" class="cancelar" onclick="fechaForm()">Cancelar</button>
            <input type="submit" class="enviar">
        </form>
    </div>
    
    <div class="search" id="pesquisa" style="display:none;">
    <form action="{{route('instituicao.clientes')}}" method="get">
        <input type="search" name="s"  placeholder="Pesquisar responsavel" aria-label="Pesquisar" value="{{ request()->input('s') ?? '' }}">
        <button  type="submit"><i class="uil uil-search"></i></button>
    </form>
    </div>



    <div class="div-tabela">
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
                @foreach ($TbResponsaveis as $TbResponsavel)
                    <tr class="pessoa">
                        <td class="nome">{{ $TbResponsavel->nm_responsavel }}</td>
                        <td scope>{{ $TbResponsavel->cd_cadastro }}</td>
                        <td class="botoes">
                            <form method="GET"
                                action="{{ route('instituicao.clientes.view', $TbResponsavel->cd_responsavel) }}">
                                <button type="submit" class="ver">Vizualizar</button>
                            </form>
                        </td>
                        <td class="botoes">
                            <form method="GET"
                                action="{{ route('instituicao.clientes.edit', $TbResponsavel->cd_responsavel) }}">
                                <button class="editar">Editar</button>
                            </form>
                        </td>
                        <td class="botoes">
                            <form method="POST"
                                action="{{ route('instituicao.clientes.delete', $TbResponsavel->cd_responsavel) }}">
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
            {{ $TbResponsaveis->appends(['s' => request()->input('s')])->links() }}                                                                                                                                                                                                                                                                                             
            @else 
                {{ $TbResponsaveis->links() }}
            
            @endif
        </div>
        <br>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
                                                                       