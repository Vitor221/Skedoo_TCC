@extends('layouts.telas', ['title' => 'Skedoo - Responsaveis'], ['nometela' => 'Clientes - Responsaveis dos Alunos'])

@section('voltar')
    <x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
@endsection
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection

@section('content')
    <div class="div-visualizar">
        <h1 style="text-align: center;">Informações do cliente</h1><br>
        <p>Nome: {{ $responsavel->nm_responsavel }}</p>
        <p>CPF: {{ $responsavel->cd_cpf }}</p>
        <p>Login: {{ $responsavel->tb_cadastro->nm_login }}</p>
        <p>Senha: {{ $responsavel->tb_cadastro->cd_senha }}</p>
        <p>Endereço: {{ $endereco->nm_endereco }}, {{ $endereco->cd_numcasa }} -
            {{ $endereco->ds_complemento }} - {{ $endereco->tb_bairro->nm_bairro }} -
            {{ $endereco->tb_bairro->tb_cidade->nm_cidade }} -
            {{ $endereco->tb_bairro->tb_cidade->tb_uf->sg_uf }}</p>
        <p>CEP: {{ $endereco->cd_cep }}</p>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
