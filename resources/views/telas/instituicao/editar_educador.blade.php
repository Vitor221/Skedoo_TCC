@extends('layouts.telas', ['title' => 'Skedoo - Responsaveis'], ['nometela' => 'Educador - Editar'])

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

    <div class="div-visualizar2">
      <h1 style="text-align: center;">Informações do educador</h1><br>
      <form class="form2" method="POST" action="{{ route('instituicao.colaborador.atualizar', ['id'=>$educador->cd_profissional]) }}">
        @method('PATCH')
        @csrf
        <div>
        <label for="">Nome do educador:</label>
            <input type="text" name="name" value="{{ $educador->nm_profissional }}">


        <label for="">CPF do educador:</label>
            <input type="text" name="cpf" value="{{ $educador->cd_cpf }}">

            <label for="">Função do educador:</label>
            <input type="text" name="funcao" value="{{ $educador->nm_funcao }}">

        <select for="turma" class="texto2" name="turma" id="turma">
              <option value="{{ $turma->cd_turma }}" selected disabled>{{ $turma->sg_turma }} - Atual</option>
          @foreach ($tbturmas as $Turma)
              <option value="{{ $Turma->cd_turma }}">{{ $Turma->sg_turma }}</option>
          @endforeach
        </select>
        <br>
        <button type="submit" class="btnUpdateEducador">Salvar</button>
        </div>

    </form>
    </div>



    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection