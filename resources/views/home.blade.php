@extends('layouts.main', ['title'=>'Skedoo - Login'])


@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/estilo_home.css')}}">
@endsection

@section('content')

<nav>
    <img id="logo-skedoo" src="{{ asset('img/Skedoo.png') }}" alt="logo skedoo">
    <a href="{{ route('inicio_pag') }}">Acesse nosso site </a>
</nav>

<section class="secao_inicio">

  <section class="topo-secao">
    <div class="area-texto">
      <div class="apres_text">
        <h2>Facilitando comunicação e promovendo conforto</h2>

        <p id="paragrafo-apres">Somos uma equipe do curso de Técnico em Desenvolvimento de Sistema que buscamos oferecer praticidade nos meios de comunicação entre Instituições e responsáveis, trazendo mais organização, segurança e comodidade para todos que utilizam nossas aplicações. <br> <br>
        Buscamos realizar adaptações, com o desenvolvimento da tecnologia, e a oportunidade para entregar aos nossos usuários uma proposta mais adequada aos dias atuais.
        </p>


        <a href="{{ route('contato_pag') }}">Entre em contato <x-polaris-major-follow-up-email class="icon-carta"/></a>
      </div>

    </div>
  </section>

  <div class="img_balls">
    <img class="img_balls1" src="{{ asset('img/img_home/professora.jpg') }}" alt="">
    <img class="img_balls2" src="{{ asset('img/img_home/criancas1.jpg') }}" alt="">
    <img class="img_balls3" src="{{ asset('img/img_home/agenda.jpg') }}" alt="">
  </div>
</section>

<section class="carrosel_part">
  <h2>Diferenciais</h2>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">

    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('img/img_home/criancas1.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/img_home/criancas1.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/img_home/criancas1.jpg')}}" class="d-block w-100" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>

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
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit quam expedita ullam esse?</p>
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
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit quam expedita ullam esse?</p>
    </div>

    <div class="star_card">
      <img src="{{ asset('img/img_home/cinco_estrelas.png') }}" alt="">
    </div>
  </div>

  <div class="cards">
    <div class="title_card">
      <div class="photo_icon"></div>
      <h3>Fernando <p>Coordenador</p>
      </h3>
    </div>

    <div class="text_card">
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit quam expedita ullam esse?</p>
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

  <script src="{{ asset('js/scriptHome.js')}}"></script>
</section>
@endsection