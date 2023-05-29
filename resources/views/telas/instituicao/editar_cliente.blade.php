@extends('layouts.telas', ['title' => 'Skedoo - Responsaveis'], ['nometela' => 'Clientes - Editar Responsaveis dos Alunos'])

@section('voltar')
    <x-button-back href="{{ route('instituicao.clientes') }}" icon="uil uil-angle-left" />
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
      <h1 style="text-align: center;">Informações do cliente</h1><br>
      <form method="POST" action="{{ route('instituicao.clientes.update', ['id'=>$responsavel->cd_responsavel]) }}">
        @method('PATCH')
        @csrf
        <label for="">Nome do responsável:</label>
        <input type="text" name="name" value="{{ $responsavel->nm_responsavel }}">
        <label for="">CPF do responsável:</label>
        <input type="text" name="cpf" value="{{ $responsavel->cd_cpf }}">
        <label for="">Login do responsável:</label>
        <input type="text" name="nm_login" value="{{ $responsavel->tb_cadastro->nm_login }}">
        {{-- <label for="">Senha do responsável:</label>
        <input type="text" name="cd_senha" value="{{ $responsavel->tb_cadastro->cd_senha }}"> --}}

        <label for="">Endereço do responsável:</label>
        <input type="text" name="nm_endereco" value="{{ $endereco->nm_endereco }}">
        <label for="">Número da casa do responsável:</label>
        <input type="text" name="cd_numcasa" value="{{ $endereco->cd_numcasa }}">
        <label for="">Complemento do responsável:</label>
        <input type="text" name="ds_complemento" value="{{ $endereco->ds_complemento }}">
        <label for="">Bairro do responsável:</label>
        <input type="text" name="nm_bairro" value="{{ $endereco->tb_bairro->nm_bairro }}">
        <label for="">Cidade do responsável:</label>
        <input type="text" name="nm_cidade" value="{{ $endereco->tb_bairro->tb_cidade->nm_cidade }}">
        <label for="">Estado do responsável:</label>
        <input type="text" name="sg_uf" value="{{ $endereco->tb_bairro->tb_cidade->tb_uf->sg_uf }}">
        <label for="">CEP do responsável:</label>
        <input type="text" name="cd_cep" value="{{ $endereco->cd_cep }}">

        <button type="submit">Salvar</button>
      </form>
    </div>



    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection