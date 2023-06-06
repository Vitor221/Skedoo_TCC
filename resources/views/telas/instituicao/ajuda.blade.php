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

                <div class="col mensagem">
                    <i class="uil uil-envelope-add"></i>
                    <h3 class="sub-titulo">Mensagens</h3>
                    <p class="paragrafo">Na seção mensagens é possivel enviar e receber mensagens em chats privados ou de modo geral para educadores, responsaveis ou ambos.</p>
                </div>

                <div class="col clientes">
                        <i class="uil uil-user-circle"></i>
                        <h3 class="sub-titulo">Clientes</h3>
                        <p class="paragrafo">A area de clientes é onde serão visualizadas as informações dos responsaveis dos alunos e inserir novos responsáveis, além disso é possível editar essas informações ou apagar o cadastro de determinado cliente da instituição</p>
                </div>

                <div class="col colaboradores">
                        <i class="uil uil-book-reader"></i>
                        <h3 class="sub-titulo">Colaboradores</h3>
                        <p class="paragrafo">A area de colaboradores é onde serão visualizadas as informações dos educadores dos alunos e inserção de novos colaboradores, além disso é possível editar essas informações ou apagar o cadastro de determinado educador</p>
                </div>

            </div>

            <div class="row align-items-start">

                <div class="col turmas">
                        <i class="uil uil-users-alt"></i>
                        <h3 class="sub-titulo">Turmas</h3>
                        <p class="paragrafo">Na seção das Turmas é possivel enviar mensagens individualmente para uma turma especifica ou selecionar as turmas que receberão o recado.</p>
                </div>

                <div class="col saude">
                        <i class="uil uil-band-aid"></i>
                        <h3 class="sub-titulo">Saúde</h3>
                        <p class="paragrafo">Na seção saúde é possivel visualizar e cadastrar alunos com problemas de saúde como alergias, problemas respiratórios ou cardiacos que serão visiveis aos educadores, além de ser possivel o cadastro do cardapio escolar para visualização dos responsaveis.</p>
                </div>

                <div class="col financeiro">
                        <i class="uil uil-dollar-alt"></i>
                        <h3 class="sub-titulo">Financeiro</h3>
                        <p class="paragrafo">A seção financeiro é um controle de pagamentos, possibilitando a instituição visualizar quais responsaveis realizaram o pagamento mensal para instituição.</p>
                </div>

            </div>

            <div class="row align-items-start">

                <div class="col servicos">
                        <i class="uil uil-user-nurse"></i>
                        <h3 class="sub-titulo">Serviços</h3>
                        <p class="paragrafo">Na area de serviços é possivel visualizar quais serviços separados como van escolar os responsaveis realizaram pagamento a parte</p>
                </div>

                <div class="col configuracoes">
                        <i class="uil uil-sliders-v-alt"></i>
                        <h3 class="sub-titulo">Configurações</h3>
                        <p class="paragrafo">Em configurações é possivel alterar as configuracões do software como tamanho de fontes e modos de daltonismo ou modo escuro.</p>
                </div>

            </div>
        </div>
    </div>

        <div class="contato-ajuda">
            <h2>Alguma duvida ou problema? Fale conosco.</h2>
            <p class="paragrafo"> <strong>email:</strong> skedoo@skedoo.com</p>
            <p class="paragrafo"> <strong>tel:</strong> (13) 996334709</p>
        </div>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
