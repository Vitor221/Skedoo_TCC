@extends('layouts.telas', ['title' => 'Skedoo - Refeição'], ['nometela' => 'Refeição'])

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_responsavel.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo_refeicao.css') }}">
@endsection

@section('voltar')
<x-button-back href="{{ route('responsavel') }}" icon="uil uil-estate" />
@endsection

@section('nav-telas')
<div class="nav">
    <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>
    <div class="perfil-bg">
        <h3>
            Bem-vindo, {{ session('login')['nm_login'] }}
            <a href="{{ route('responsavel.perfil') }}">
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
<div class="div-conteudo">
  @if ($cardapioHoje)
      <h1>Refeição de Hoje</h1>
      <div class="div-refeicao">
          <div class="item-cardapio" style="background-color:{{ $cardapioHoje->cd_cor }}">
              <div class="flex">
                  <div class="block">
                      <h3>{{ $cardapioHoje->nm_prato }}</h3>
                      <p>{{ $cardapioHoje->desc_prato }}</p>
                  </div>
                  <div class="block">
                      <h3>{{ $cardapioHoje->nm_sobremessa }}</h3>
                      <p>{{ $cardapioHoje->desc_sobremessa }}</p>
                  </div>
                  <div class="block">
                      <p>{{ $cardapioHoje->nm_ddsemana }}</p>
                      {{ \Carbon\Carbon::parse($cardapioHoje->dt_cardapio)->format('d/m/Y') }}<br>
                      {{-- <form method="GET" action="{{route('instituicao.saude.refeicao.update,' $cardapio->id_cardapio)}}">
                          
                      </form> --}}
                  </div>
              </div>
          </div>
      </div><br>
  @endif
  <h1>Proximas Refeições</h1>
  <div class="div-refeicao">
      @if ($TbCardapio->count() > 0)
          @foreach ($TbCardapio as $TbCardapio)
              <div class="item-cardapio" style="background-color:{{ $TbCardapio->cd_cor }}">
                  <div class="flex">
                      <div class="block">
                          <h3>{{ $TbCardapio->nm_prato }}</h3>
                          <p>{{ $TbCardapio->desc_prato }}</p>
                      </div>
                      <div class="block">
                          <h3>{{ $TbCardapio->nm_sobremessa }}</h3>
                          <p>{{ $TbCardapio->desc_sobremessa }}</p>
                      </div>
                      <div class="block">
                          <p>{{ $TbCardapio->nm_ddsemana }}</p>
                          {{ \Carbon\Carbon::parse($TbCardapio->dt_cardapio)->format('d/m/Y') }}<br>
                      </div>
                  </div>
              </div>
          @endforeach
      @else
      <h2 style="color:black;">Sem cadastros.</h2>

      @endif
  </div>
  <h1>Refeições Anteriores</h1>
  <div class="div-refeicao">
      @if ($cardapioAnterior->count() > 0)
          @foreach ($cardapioAnterior as $cardapioAnterior)
              <div class="item-cardapio" style="background-color:gray">
                  <div class="flex">
                      <div class="block">
                          <h3>{{ $cardapioAnterior->nm_prato }}</h3>
                          <p>{{ $cardapioAnterior->desc_prato }}</p>
                      </div>
                      <div class="block">
                          <h3>{{ $cardapioAnterior->nm_sobremessa }}</h3>
                          <p>{{ $cardapioAnterior->desc_sobremessa }}</p>
                      </div>
                      <div class="block">
                          <p>{{ $cardapioAnterior->nm_ddsemana }}</p>
                          {{ \Carbon\Carbon::parse($cardapioAnterior->dt_cardapio)->format('d/m/Y') }}<br>
                      </div>
                  </div>
              </div>
          @endforeach
          @else
          <h2 style="color:black;">Sem cadastros.</h1>
      @endif
  </div>
  <br>
</div>
@endsection