@extends('layouts.telas', ['title'=>'Skedoo - Financeiro'], ['nometela' => 'Financeiro'])

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
<body>
    <main>
    <div class="resume">
      <div>
        Entradas: R$
        <span class="incomes">0.00</span>
      </div>
      <div>
        Saídas: R$
        <span class="expenses">0.00</span>
      </div>
      <div>
        Total: R$
        <span class="total">0.00</span>
      </div>
    </div>
    <div class="newItem">
      <div class="divDesc">
        <label for="desc">Descrição</label>
        <input type="text" id="desc" />
      </div>
      <div class="divAmount">
        <label for="amount">Valor</label>
        <input type="number" id="amount" />
      </div>
      <div class="divType">
        <label for="type">Tipo</label>
        <select id="type">
          <option>Entrada</option>
          <option>Saída</option>
        </select>
      </div>
      <button id="btnNew">Incluir</button>
    </div>
    <div class="divTable">
      <table>
        <thead>
          <tr>
            <th>Descrição</th>
            <th class="columnAmount">Valor</th>
            <th class="columnType">Tipo</th>
            <th class="columnAction"></th>
          </tr>
        </thead>
        <tbody>
        </tbody>
      </table>
</div>
    </main>
</body>

<script src="{{ asset('js/configFinance.js') }}"></script>

</html>
@endsection
