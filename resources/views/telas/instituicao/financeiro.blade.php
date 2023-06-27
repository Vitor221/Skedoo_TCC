@extends('layouts.telas', ['title' => 'Skedoo - Financeiro'], ['nometela' => 'Financeiro'])

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo_finance.css') }}">
@endsection
@section('voltar')
    <x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
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
    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    </head>

    <body>
        <div class="div-conteudo">
            <div style="background-color:white;padding:1em; border-radius:1em;">
                <form method="POST" action="{{route('instituicao.financeiro.plano')}}">
                    @csrf
                    <label>Insira um nome para plano:</label>
                    <input type="text" name="plano" class="texto">
                    <label>Insira um valor para o plano:</label>
                    <input type="text" name="valorPlano" class="texto">
                    <button type="submit" class="enviar">Enviar</button>
                </form>
                <br>
                <table>
                    <thead>
                        <tr>
                            <th class="nome t-head-title">Plano</th>
                            <th class="nome t-head-title">Valor</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach ($TbFormaPagamento as $FormaPagamento)
                          <tr>
                              <td class="nome">{{$FormaPagamento->nm_forma_pagamento}}</td></td>
                              <td class="nome">{{ $FormaPagamento->vl_fatura}}</td>
                          </tr>
                      @endforeach
                  </tbody>
                  
                </table><
            </div>
        </div>
        <br>
        <div class="div-conteudo">
            <div class="div-tabela">
              <h2 style="color: white">Tabela de Pagamentos</h2>
              <table>
                  <thead>
                      <tr>
                          <th class="nome t-head-title">Nome do Responsavel</th>
                          <th class="nome t-head-title">Tipo de Pagamento</th>
                          <th class="nome t-head-title">Valor</th>
                          <th class="nome t-head-title">Ultimo Pagamento</th>
                          <th class="nome t-head-title">Status de Pagamento</th>
                          <th class="nome t-head-title">Confirmar Pagamento</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($TbResponsavel as $index => $responsavel)
                        @php
                            $ultimoPagamento = $TbPagamento[$index]->last();
                        @endphp
                        <tr>
                            <td class="nome">{{ $responsavel[0]->nm_responsavel }}</td>
                            <td class="forma-pagamento nome">{{ $ultimoPagamento->cd_forma_pagamento }}</td>
                            <td class="nome">{{ $ultimoPagamento->vl_fatura }}</td>
                            <td class="nome">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $ultimoPagamento->dt_pagamento)->format('d/m/Y') }}</td>
                            <td class="status-pagamento nome" id="{{ $ultimoPagamento->cd_pagamento }}{{ $index }}">{{ $ultimoPagamento->cd_status_pagamento }}</td>
                            <td class="botoes">
                                <button class="enviar btn-confirmar" id="confirmar{{ $ultimoPagamento->cd_pagamento }}{{ $index }}" onclick="confirmaPagamento({{ $ultimoPagamento->cd_pagamento }})">Confirmar</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                
              </table><br>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/configFinanceiro.js') }}"></script>

    </html>
@endsection
