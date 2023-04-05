@extends('layouts.telas', ['title'=>'Skedoo - Responsaveis'], ['nometela'=>'Responaveis'])

@section('content')
<table class="tabela">
  <thead>
      <tr>
          <th scope="col">Nome</th>
          <th scope="col">Cadastro</th>
          <th scope="col">Editar</th>
      </tr>
  </thead>
  <tbody>
      @foreach ($TbResponsavel as $TbResponsavel)
          <tr>
              <th class="nome" scope>{{ $TbResponsavel->nm_responsavel }}</th>
              <th scope>{{ $TbResponsavel->cd_cadastro }}</th>
      @endforeach;
      </tr>
  </tbody>
</table>
@endsection