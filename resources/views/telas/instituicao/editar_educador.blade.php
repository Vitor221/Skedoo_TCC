@extends('layouts.telas', ['title' => 'Skedoo - Responsaveis'], ['nometela' => 'Educador - Editar'])

@section('voltar')
    <x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection

@section('content')

    <div class="div-visualizar">
      <h1 style="text-align: center;">Informações do cliente</h1><br>
      <form method="POST" action="{{ route('instituicao.colaborador.atualizar', ['id'=>$educador->cd_profissional]) }}">
        @method('PATCH')
        @csrf
        <label for="">Nome do educador:</label>
        <input type="text" name="name" value="{{ $educador->nm_profissional }}">
        <label for="">CPF do educador:</label>
        <input type="text" name="cpf" value="{{ $educador->cd_cpf }}">
        <label for="">Função do educador:</label>
        <input type="text" name="funcao" value="{{ $educador->nm_funcao }}">

        <select for="turma" class="texto" name="turma" id="turma">
              <option value="{{ $turma->cd_turma }}" selected disabled>{{ $turma->sg_turma }} - Atual</option>
          @foreach ($tbturmas as $Turma)
              <option value="{{ $Turma->cd_turma }}">{{ $Turma->sg_turma }}</option>
          @endforeach
        </select>

        <button type="submit">Salvar</button>
      </form>
    </div>



    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection