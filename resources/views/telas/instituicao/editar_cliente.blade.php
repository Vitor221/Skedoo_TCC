@extends('layouts.telas', ['title' => 'Skedoo - Responsaveis'], ['nometela' => 'Clientes - Editar Responsaveis dos Alunos'])

@section('voltar')
    <x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection

@section('content')

    <div class="div-visualizar">
      <h1 style="text-align: center;">Informações do cliente</h1><br>
      <form method="POST" action="{{ route('instituicao.clientes.update', ['id'=>$responsavel->cd_responsavel]) }}">
        @method('PUT')
        @csrf
        <label for="">Nome do responsável:</label>
        <input type="text" name="name" value="{{ $responsavel->nm_responsavel }}">
        <label for="">CPF do responsável:</label>
        <input type="text" name="cpf" value="{{ $responsavel->cd_cpf }}">
        <label for="">Login do responsável:</label>
        <input type="text" name="nm_login" value="{{ $responsavel->tb_cadastro->nm_login }}">
        <label for="">Senha do responsável:</label>
        <input type="text" name="cd_senha" value="{{ $responsavel->tb_cadastro->cd_senha }}">

        <label for="">Endereço do responsável:</label>
        <input type="text" name="EnderecoResponsavel" value="{{ $endereco->nm_endereco }}">
        <label for="">Número da casa do responsável:</label>
        <input type="text" name="NumeroCasaResponsavel" value="{{ $endereco->cd_numcasa }}">
        <label for="">Complemento do responsável:</label>
        <input type="text" name="ComplementoResponsavel" value="{{ $endereco->ds_complemento }}">
        <label for="">Bairro do responsável:</label>
        <input type="text" name="BairroResponsavel" value="{{ $endereco->tb_bairro->nm_bairro }}">
        <label for="">Cidade do responsável:</label>
        <input type="text" name="CidadeResponsavel" value="{{ $endereco->tb_bairro->tb_cidade->nm_cidade }}">
        <label for="">Estado do responsável:</label>
        <input type="text" name="EstadoResponsavel" value="{{ $endereco->tb_bairro->tb_cidade->tb_uf->sg_uf }}">
        <label for="">CEP do responsável:</label>
        <input type="text" name="CepResponsavel" value="{{ $endereco->cd_cep }}">

        <button type="submit">Salvar</button>
      </form>
    </div>



    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection