@extends('layouts.telas', ['title'=>'Skedoo - Dashboard'], ['nometela' => 'Dashboard'])

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

       <!-- Cotando total de clientes responsaveis -->
     <div class="container">
      <div class="card">
       <h4> Total Clientes</h4>  
      <p>
    {{ $clienteCadastrados->total_Clientes}}
      </p>
      </div>
     </div><br><br>

     <div class="container">
      <div class="card">
       <h4> Total Recebido</h4>  
      <p>
    {{ $RecebimentoTotal->total_recebido}}
      </p>
      </div>
     </div><br><br>

     <!-- RECEBIMENTO POR MES -->
     <div class="container">
    <div class="card">
        <h4>Recebimento por Mês</h4>  
        <ul>
            @foreach ($RecebimentoPorMes as $recebimento)
            <li>{{ $recebimento->mes_ano }}: {{ $recebimento->quantidade }} registros de contrato, Total: {{ $recebimento->total_recebido }}</li>
            @endforeach
        </ul>
    </div>
</div><br><br>


<!-- localização do grupo de responsaveis -->
    <div class="container">
      <div class="card">
      <ul>
      <ul>
    @foreach($bairros as $bairro)
        <li>{{ $bairro->nome_bairro }} - Total de Responsáveis: {{ $bairro->total_responsaveis }}</li>
    @endforeach
</ul>
</ul>
      </div>
    </div>
    

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
      @foreach($responsaveis as $responsavel)
    <p>Status: {{ $responsavel->nm_status_pagamento }}</p>
    <p>Quantidade: {{ $responsavel->quantidade }}</p>
      @endforeach
      </tbody>
      
    </table>
  </div>
</div>

</body>

<script src="{{ asset('js/configFinance.js') }}"></script>


@endsection
