@extends('layouts.main', ['title'=>'Skedoo - Home'])


@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/estilo_home.css')}}">
@endsection

@section('content')

<nav>
    <img id="logo-skedoo" src="{{ asset('img/Skedoo.png') }}" alt="logo skedoo">
    <a href="{{ route('login_pag') }}">Faça o login</a>
</nav>

<section class="secao_inicio">

  <section class="topo-secao">
    <div class="area-texto">
      <div class="apres_text">
        <h2>Facilitando comunicação e promovendo conforto</h2>

        <p id="paragrafo-apres">Somos uma equipe do curso de Técnico em Desenvolvimento de Sistema que buscamos oferecer praticidade nos meios de comunicação entre Instituições e responsáveis, trazendo mais organização, segurança e comodidade para todos que utilizam nossas aplicações. <br> <br>
        Buscamos realizar adaptações, com o desenvolvimento da tecnologia, e a oportunidade para entregar aos nossos usuários uma proposta mais adequada aos dias atuais.
        </p>


        <a href="{{ route('contato_pag') }}">Entre em contato <i class="uil uil-envelope icon-carta"></i></a>
      </div>

    </div>
  </section>

  <div class="img_balls">
    <img class="img_balls1" src="{{ asset('img/img_home/professora.jpg') }}">
    <img class="img_balls2" src="{{ asset('img/img_home/criancas1.jpg') }}">
    <img class="img_balls3" src="{{ asset('img/img_home/agenda.jpg') }}">
  </div>
</section>

<div class="curve"></div>

<section class="section-carousel">

  <h2>Diferenciais</h2>
  <div class="carrosel_part">
    <button id="prev-button"><img src="{{ asset('img/img_home/s-prev-button.png') }}"></button>
    <div class="carousel">
      <div class="slider on">
        <img src="{{ asset('img/img_home/s-perfil-de-usuario.png') }}">
        <div class="text-slide">
          <h2>Usuários</h2>
          <p>Nós proporcionamos a melhor experiência para nossos usuários! Permitindo a conexão entre responsáveis e instituição.</p>
        </div>
      </div>
      <div class="slider">
        <img src="{{ asset('img/img_home/s-otimizacao.png') }}">
        <div class="text-slide">
          <h2>Otimização</h2>
          <p>Com a skedoo você não precisará mais se preocupar com agendas físicas!! Nós proporcionamos uma sistema completamente funcional e rápido!</p>
        </div>
      </div>
      <div class="slider">
        <img src="{{ asset('img/img_home/s-saude.png') }}">
        <div class="text-slide">
          <h2>Saúde</h2>
          <p>É sempre importante cuidar da saúde das crianças, não é mesmo? Com a skedoo você poderá enviar mensagens diretamente para a instituição para avisar sobre quaisquer problemas de saúde da criança.</p>
        </div>
      </div>
      <div class="slider">
        <img src="{{ asset('img/img_home/s-cardapio.png') }}">
        <div class="text-slide">
          <h2>Cardápio</h2>
          <p>Contamos com a presença de um cardápio (disponibilizado pela instituição) para que você responsável fique inteirado sobre a alimentação de seus pequenos!</p>
        </div>
      </div>
    </div>

    <button id="next-button"><img src="{{ asset('img/img_home/s-next-button.png') }}"></button>
  </div>

</section>

<div class="curve2"></div>

<div class="comentarios_title">
  <h2>Quem utiliza, comenta!</h2>
</div>

<section class="card_coment">
  <div class="cards">
    <div class="title_card">
      <div class="photo_icon"></div>
      <h3>Vitor <p>Coordenador</p>
      </h3>
    </div>

    <div class="text_card">
      <p>O curso de desenvolvimento de sistemas foi incrível! Aprendi muito e me sinto realizado por ter concluído o programa.</p>
    </div>
    <div class="star_card">
      <img src="{{ asset('img/img_home/cinco_estrelas.png') }}" alt="">
    </div>
  </div>

  <div class="cards">
    <div class="title_card">
      <div class="photo_icon"></div>
      <h3>Pedro <p>Coordenador</p>
      </h3>
    </div>

    <div class="text_card">
      <p>Foi uma experiência gratificante desenvolver para a web. Aprendemos novas habilidades e nos sentimos orgulhosos do que conquistamos.</p>
    </div>

    <div class="star_card">
      <img src="{{ asset('img/img_home/cinco_estrelas.png') }}" alt="">
    </div>
  </div>

  <div class="cards">
    <div class="title_card">
      <div class="photo_icon"></div>
      <h3>Matheus <p>Coordenador</p>
      </h3>
    </div>

    <div class="text_card">
      <p>Desenvolver com Laravel nos trouxe uma sensação de missão cumprida. Estamos felizes com o resultado final e com a experiência adquirida ao longo do processo.</p>
    </div>

    <div class="star_card">
      <img src="{{ asset('img/img_home/cinco_estrelas.png') }}" alt="">
    </div>
  </div>

  {{-- VLibras --}}
  <div vw class="enabled">
    <div vw-access-button class="active"></div>
    <div vw-plugin-wrapper>
      <div class="vw-plugin-top-wrapper"></div>
    </div>
  </div>

  <script src="https://vlibras.gov.br/app/vlibras-plugin.js"></script>
  <script>
    new window.VLibras.Widget('https://vlibras.gov.br/app');
  </script>

  <script src="{{ asset('js/scriptHome.js')}}" defer></script>
</section>
@endsection