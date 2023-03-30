@extends('layouts.main')

@section('title', 'Contato')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('css/estilo_contato.css') }}">
@endsection

@section('content')
<nav>
  <ul class="menu_list">
    <li><a href="{{ route('inicio_pag') }}">Início</a></li>
    <li id="baixe_app-list" class="menu_item"><a id="baixe_app" href="">Baixe o App</a></li>
    <li><a href="{{ route('login_pag') }}">Login <i class="uil uil-user"></i></a></li>
  </ul>
</nav>

<main class="conteudo">
  <div class="logo_skedoo">
    <a href="{{ route('skedoo_pag') }}" class="link_img"><img src="{{ asset('img/Skedoo.png') }}" alt="" class="logo_img"></a>
  </div>

  <div class="texto_topo">
    <p>Caso tenha surgido uma curiosidade, dúvida ou queira entrar em contato para saber mais do nosso sistema, preencha o formulário abaixo, assim que possível estaremos entrando em contato.
    </p>
  </div>

  <form action="">
    <div class="grupo_input">
      <div class="input_box">
        <label>Nome</label>
        <input type="text">
      </div>

      <div class="input_box">
        <label>E-mail</label>
        <input type="text">
      </div>

      <div class="input_tel-cel">
        <div class="input_box">
          <label>Telefone</label>
          <input id="input-tel" type="text">
        </div>

        <div class="input_box">
          <label>Celular</label>
          <input id="input-cel" type="text">
        </div>
      </div>

      <div class="input_box">
        <label>Nome da Instituição</label>
        <input type="text">
      </div>

      <div class="input_box">
        <label id="label_duv">Dúvidas</label>
        <textarea name="" id="textarea_div" cols="30" rows="10"></textarea>
      </div>
    </div>

    <div class="botao_envio">
      <button type="submit">Enviar</button>
    </div>
  </form>
</main>
@endsection