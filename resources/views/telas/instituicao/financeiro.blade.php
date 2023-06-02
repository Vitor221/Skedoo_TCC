@extends('layouts.telas', ['title'=>'Skedoo - Financeiro'], ['nometela' => 'Financeiro'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilo_finance.css') }}">
@endsection
@section('voltar')
<x-button-back href="{{route('instituicao')}}" icon="uil uil-estate"/>
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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>

  <div class="col-6">
    <canvas id="myChart"></canvas>
  </div>

  
    {{-- <div class="resume">
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
</div> --}}
    
</body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js"></script>
  <script src="{{ asset('js/configFinance.js') }}"></script>
  
</html>
@endsection
