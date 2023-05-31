@extends('layouts.telas', ['title' => 'Skedoo - Responsaveis'], ['nometela' => 'Clientes - Responsaveis dos Alunos'])

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
        <div class="visualizar" style="background-color: white;">
            <h4>Responsavel</h4><br>
            <p><strong>Nome:</strong> {{ $responsavel->nm_responsavel }}</p>
            <p><strong>CPF:</strong> {{ $responsavel->cd_cpf }}</p>
            <p><strong>Login:</strong> {{ $responsavel->tb_cadastro->nm_login }}</p>
            {{-- <p>Senha: {{ $responsavel->tb_cadastro->cd_senha }}</p> --}}
            <p><strong>Endereço:</strong> {{ $endereco->nm_endereco }}, {{ $endereco->cd_numcasa }} -
                {{ $endereco->ds_complemento }} - {{ $endereco->tb_bairro->nm_bairro }} -
                {{ $endereco->tb_bairro->tb_cidade->nm_cidade }} -
                {{ $endereco->tb_bairro->tb_cidade->tb_uf->sg_uf }}</p>
            <p><strong>CEP:</strong> {{ $endereco->cd_cep }}</p>
            <br>
            <h4>Aluno</h4><br>
            <p><strong>Nome:</strong> {{ $aluno->nm_aluno }}</p>
            <p><strong>Data de Nascimento:</strong> {{$aluno->dt_nascimento}}</p>
            <p><strong>Turma:</strong> {{$aluno->tb_turma->nm_turma}}  -  {{$aluno->tb_turma->ds_periodo}}</p>
        </div>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
