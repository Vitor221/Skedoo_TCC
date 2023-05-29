@extends('layouts.telas', ['title'=>'Skedoo - Dashbord'], ['nometela' => 'Dashbord'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilo_finance.css') }}">
@endsection
@section('voltar')
<x-button-back href="{{route('instituicao')}}" icon="uil uil-estate"/>
@endsection

@section('content')
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financeiro</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>
@csrf
<body>

<!-- Div Alunos-->
    <div class="container">
      <div class="menu">
          <table>
          <h4>Alunos</h4>
            <thead>
              <th scope="col">Salas</th>
              <th scope="col">Quant. Matriculados</th>
              <th scope="col">Quant. Total </th>
            </thead>
           <tbody>
            @foreach ($TbTurmas as $Turmas)
            <tr>
              <td class="nome">{{$Turmas->nm_turma}}</td>
        @if(isset($alunosPorTurma[$Turmas->cd_turma]))
            <td>{{ $alunosPorTurma[$Turmas->cd_turma]->total_alunos }}</td>
        @else
            <td>0</td>
        @endif
        <td>{{ $Turmas->cd_total_aluno }}</td>
            </tr> 
            @endforeach
           </tbody>
          </table>
      </div>
    </div><br><br>
    
<!-- Div Pagamento -->
<div class="container">
      <H3>  PAGAMENTO </H3>  
  <div class="">
    <table>
      <thead>
        <th scope="col">Status</th>
        <th scope="col">Quant.</th>
        <th scope="col">Visualizar</th>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>

</body>

<script src="{{ asset('js/configFinance.js') }}"></script>


@endsection
