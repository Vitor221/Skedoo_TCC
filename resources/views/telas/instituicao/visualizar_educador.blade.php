@extends('layouts.telas', ['title' => 'Skedoo - Responsaveis'], ['nometela' => 'Colaboradores -  Dados'])

@section('voltar')
    <x-button-back href="{{ route('instituicao.colaborador') }}" icon="uil uil-angle-left" />
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
        <div class="visualizar2" style="background-color: white;">
        <h4>Colaborador</h4><br>
        <p>Nome: {{ $educador->nm_profissional }}</p>
        <p>CPF: {{ $educador->cd_cpf }}</p>
        <p>Turma: {{$educador->tb_turma->nm_turma}}  -  {{$educador->tb_turma->ds_periodo}}</p>
        </div>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
