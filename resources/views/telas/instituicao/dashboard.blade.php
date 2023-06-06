@extends('layouts.telas', ['title' => 'Skedoo - Dashboard'], ['nometela' => 'Dashboard'])

@section('voltar')
    <x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/config/config.css') }}"> --}}
@endsection

@section('nav-telas')
    <div class="nav">
        <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
        <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>
        <div class="perfil-bg">
            <h3>
                Bem-vindo, {{ session('login')['nm_login'] }}
                <a href="{{ route('instituicao.perfil') }}">
                    @if ($login->img_perfil)
                        <img name="image" class="img-perfil" class="img-personalizado"
                            src="{{ url('storage/' . $login->img_perfil) }}" alt="">
                    @else
                        <img name="image" class="img-perfil" src="https://i.stack.imgur.com/Bzcs0.png" alt="">
                    @endif
                </a>
            </h3>
        </div>
    </div>
@endsection

@section('content')
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    @csrf

    {{-- Gráficos com ChartJS --}}
    <div class="container">
        <div class="row">
            <h3>Relatórios</h3>
            <div class="col-6">
                <div class="card">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <canvas id="myBar"></canvas>
                </div>
            </div>
        </div>
    </div>

    <br>

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
                            <td class="nome">{{ $Turmas->nm_turma }}</td>
                            @if (isset($alunosPorTurma[$Turmas->cd_turma]))
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
                {{ $clienteCadastrados->total_Clientes }}
            </p>
        </div>
    </div><br><br>

    <div class="container">
        <div class="card">
            <h4> Total Recebido</h4>
            <p>
                {{ $RecebimentoTotal->total_recebido }}
            </p>
        </div>
    </div><br><br>

    <!-- RECEBIMENTO POR MES -->
    <div class="container">
        <div class="card">
            <h4>Recebimento por Mês</h4>
            <ul>
                @foreach ($RecebimentoPorMes as $recebimento)
                    <li>{{ $recebimento->mes_ano }}: {{ $recebimento->quantidade }} registros de contrato, Total:
                        {{ $recebimento->total_recebido }}</li>
                @endforeach
            </ul>
        </div>
    </div><br><br>


    <!-- localização do grupo de responsaveis -->
    <div class="container">
        <div class="card">
            <ul>
                <ul>
                    @foreach ($bairros as $bairro)
                        <li>{{ $bairro->nome_bairro }} - Total de Responsáveis: {{ $bairro->total_responsaveis }}</li>
                    @endforeach
                </ul>
            </ul>
        </div>
    </div>


    <!-- Div Pagamento -->
    <div class="container">
        <H3> PAGAMENTO </H3>
        <div class="">
            <table>
                <thead>
                    <th scope="col">Status</th>
                    <th scope="col">Quant.</th>
                    <th scope="col">Visualizar</th>
                </thead>

                <tbody>
                    @foreach ($responsaveis as $responsavel)
                        <p>Status: {{ $responsavel->nm_status_pagamento }}</p>
                        <p>Quantidade: {{ $responsavel->quantidade }}</p>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js"></script>

    <script src="{{ asset('js/configFinance.js') }}"></script>

    {{-- <script>
        fetch('/dashboard/')
        .then(data =>)
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: [''{{$TbTurmas[2]->nm_turma}}'', 'Maternal I', 'Maternal II', 'Fase I', 'Fase II'],
                datasets: [{
                    label: 'Alunos por turma',
                    data: [6, 16, 12, 11, 8],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

        var ctb = document.getElementById('myBar');

        var myBar = new Chart(ctb, {
            type: 'bar',
            data: {
                labels: ['Conjunto Residencial Humaitá', 'Parque Continental'],
                datasets: [{
                    label: 'Alunos por bairro',
                    data: [34, 29],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script> --}}
@endsection
