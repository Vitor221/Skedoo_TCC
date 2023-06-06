@extends('layouts.telas', ['title' => 'Skedoo - Ajuda'], ['nometela' => 'Como Utilizar o Software'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
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

    <div class="container text-center conteudo-ajuda">
        <h2>Funções</h2>
        
        <div class="bg-ajuda">
            <div class="row align-items-start">

                <div class="col">
                    <i class="uil uil-envelope-add"></i>
                    <h3 class="sub-titulo">Mensagens</h3>
                    <p class="paragrafo">Permite enviar e receber mensagens em chats privados ou de modo geral, direcionadas a educadores, responsáveis ou ambos. É uma forma de comunicação interna dentro do sistema.</p>
                </div>

                <div class="col">
                        <i class="uil uil-user-circle"></i>
                        <h3 class="sub-titulo">Calendário</h3>
                        <p class="paragrafo">Nesta seção, é possível realizar a visualização de eventos, inserir e excluir eventos criados. Os eventos podem ser marcados para o dia todo ou em uma hora específica. Além disso, é possível criar lembretes e notificações relacionados aos eventos.</p>
                </div>

                <div class="col">
                        <i class="uil uil-book-reader"></i>
                        <h3 class="sub-titulo">Refeição</h3>
                        <p class="paragrafo">Nesta seção, você pode adicionar as refeições que serão servidas, seja por semana ou, se preferir, pode enviar um PDF para que os usuários do sistema possam fazer o download.</p>
                </div>

            </div>

            <div class="row align-items-start">

                <div class="col">
                        <i class="uil uil-users-alt"></i>
                        <h3 class="sub-titulo">Saúde</h3>
                        <p class="paragrafo">Nesta seção, é possível visualizar e cadastrar alunos com situações de risco a saúde, como alergias, problemas respiratórios ou cardíacos. Essas informações ficam visíveis para os educadores.</p>
                </div>

                <div class="col">
                        <i class="uil uil-band-aid"></i>
                        <h3 class="sub-titulo">Dashboard</h3>
                        <p class="paragrafo">Nesta seção, é possível visualizar e acompanhar uma representação visual das informações mais importantes em forma de painel de controle, com dados do sistema.</p>
                </div>

                <div class="col">
                        <i class="uil uil-dollar-alt"></i>
                        <h3 class="sub-titulo">Cliente</h3>
                        <p class="paragrafo">Nesta seção, é possível visualizar as informações dos responsáveis pelos alunos e inserir novos responsáveis. Também é possível editar essas informações ou apagar o cadastro de determinado cliente da instituição.</p>
                </div>

            </div>

            <div class="row align-items-start">

                <div class="col">
                        <i class="uil uil-user-nurse"></i>
                        <h3 class="sub-titulo">Colaboradores</h3>
                        <p class="paragrafo">A area de colaboradores é onde serão visualizadas as informações dos educadores dos alunos e inserção de novos colaboradores, além disso é possível editar essas informações ou apagar o cadastro de determinado educador.</p>
                </div>

                <div class="col">
                        <i class="uil uil-sliders-v-alt"></i>
                        <h3 class="sub-titulo">Turmas</h3>
                        <p class="paragrafo">Na seção das Turmas é possivel fazer a verificação de quais alunos pertencem a cada sala, editar, e criar novas salas.</p>
                </div>

            </div>
        </div>
    </div>

        <div class="contato-ajuda">
            <h2>Alguma duvida ou problema? Fale conosco.</h2>
            <p class="paragrafo"> <strong>email:</strong> skedoo@skedoo.com</p>
            <p class="paragrafo"> <strong>tel:</strong> (13) 996334709</p>
        </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
