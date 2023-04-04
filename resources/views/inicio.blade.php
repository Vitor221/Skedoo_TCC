@extends('layouts.main', ['title'=>'Skedoo - Login'])

@section('styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/estilo_inicio.css')}}">
@endsection

@section('content')

<nav>
  <a href="{{ route('skedoo_pag')}}"><img id="logo_nav" src="{{ asset('img/Skedoo.png')}}" alt="logo da Skedoo"></a>
  <ul class="menu_list">
    <li><a href="{{ route('contato_pag') }}">Contato</a></li>
    <x-botao-app />
    <li><a href="{{ route('login_pag') }}">Login <i class="uil uil-user"></i></a></li>
  </ul>
</nav>

<main>
  <section class="intro_skedoo">
    <div class="img_intro">
      <img src="{{ asset('img/img_inicio/skedoo_celular.png') }}" alt="logo skedoo">
    </div>
    <div class="text_intro">
      <h2>O que é Skedoo?</h2>
      <p>É um aplicativo desktop e mobile desenvolvido para facilitar a comunicação e a organização das instituições. Conectando-as com todos os responsaveis por alunos matriculados naquela instituição</p>
    </div>
  </section>

  <section class="proc_carac">
    <h2>Procedimentos e Características</h2>
    <div class="procedimentos_conteudo">
      <div class="texto_proc">
        <p>Skedoo busca trazer para seus usuários a praticidade nos atendimentos e comunicação entre instituição e responsáveis. Buscamos realizar isso de maneira que todos os usuários se sintam confortável e consigam utilizar ao máximo o nosso aplicativo. Oferecemos para os usuários a usabilidade, de chat de conversa (com professores e Instituição), agenda com anotações dos professores, calendários dinâmico com preenchimento institucional e área reservada para tratamento de saúde . Todas essas funcionalidades você pode ter no seu smartfone.</p>
      </div>
      <div class="img_phone-proc">
        <img src="{{ asset('img/img_inicio/login_skedoo.png') }}" alt="tela inicial mobile skedoo">
      </div>
    </div>
  </section>

  <section class="telas_skedoo">
    <div class="img_telas">
      <label>Tela de opções</label>
      <img src="{{ asset('img/img_inicio/opcoes_skedoo.png') }}" alt="tela home da skedoo">
    </div>
    <div class="img_telas">
      <label>Tela home</label>
      <img src="{{ asset('img/img_inicio/home_skedoo.png') }}" alt="tela de opções da skedoo">
    </div>
    <div class="img_telas">
      <label>Tela de perfil</label>
      <img src="{{ asset('img/img_inicio/perfil_skedoo.png') }}" alt="tela de perfil da skedoo">
    </div>
  </section>

  <section class="tutorial">
    <h2>Tutorial e Suporte</h2>
    <div class="tutorial_content">
      <p>Não é necessário preocupação com a usabilidade de seus profissionais e os responsáveis, pois além do sistema ser bem intuitivo, oferecemos também tutorias de usabilidade do nosso sistema no nosso canal do Youtube e no aplicativo para que os aproveitem ao máximo tudo o que a SKEDOO tem a oferecer. Além dos tutoriais também oferecemos um suporte técnico, para que possamos inibir qualquer dúvida, dificuldade e caso de problemas que prejudicam a experiência na utilização do nosso aplicativo.</p>
      <div class="sup_img">
        <img src="{{ asset('img/img_inicio/suporte.png') }}" alt=""> <br>
        <span>Suporte técnico</span>
      </div>
    </div>
  </section>

  <section class="sistema_cont">
    <h2>Sistema</h2>
    <div class="cont_att">
      <div class="sistema_text">
        <p>Nosso sistema buscar executar as tarefas que eram executadas pela agenda escolar e procedimento a mais. Automatizar esse processo é nosso grande objetivo por isso, foram realizados além de tudo uma pesquisa de campo para buscarmos funcionalidades que pudessem agregar ainda mais nosso sistema, fazendo-o torna algo necessário dentro das instituições que buscam benéficos mútuos para ele e para seus cliente, os responsáveis pelos alunos.</p>
      </div>

      <div class="sistema_att">
        <h3>Atualizações do Sistema</h3>
        <hr>
        <p>1.0.2 – Atualização 12/12
          Ultima banca do Segundo módulo, identificado procedimento para incorporação do projeto.</p>
        <p>1.0.1- Atualização – 21/11
          Após realização da segunda previa, foram encontrado melhoria para o sistema.</p>
        <p>1.0 Atualização 24/10
          Mediante a primeira previa do PTCC</p>
      </div>
    </div>
  </section>
</main>
@endsection