@extends('layouts.telas', ['title' => 'Skedoo - Ajuda'], ['nometela' => 'Como Utilizar o Software'])

@section('styles')
<link rel="stylesheet" href="{{ asset('css/estilo_instituicao.css') }}">
@endsection
@section('voltar')
<x-button-back href="{{route('instituicao')}}" icon="uil uil-estate"/>
@endsection

@section('content')
    <div class="div-conteudo" style="margin-top: ;">
        <h2>Funções</h2>
        <h3 class="sub-titulo">Mensagens</h3>
        <p class="paragrafo">Na seção mensagens é possivel enviar e receber mensagens em chats privados ou de modo geral para educadores, responsaveis ou ambos.</p>
        <h3 class="sub-titulo">Clientes</h3>
        <p class="paragrafo">A area de clientes é onde serão visualizadas as informações dos responsaveis dos alunos e inserir novos responsáveis, além disso é possível editar essas informações ou apagar o cadastro de determinado cliente da instituição</p>
        <h3 class="sub-titulo">Colaboradores</h3>
        <p class="paragrafo">A area de colaboradores é onde serão visualizadas as informações dos educadores dos alunos e inserção de novos colaboradores, além disso é possível editar essas informações ou apagar o cadastro de determinado educador</p>
        <h3 class="sub-titulo">Turmas</h3>
        <p class="paragrafo">Na seção das Turmas é possivel enviar mensagens individualmente para uma turma especifica ou selecionar as turmas que receberão o recado.</p>
        <h3 class="sub-titulo">Saúde</h3>
        <p class="paragrafo">Na seção saúde é possivel visualizar e cadastrar alunos com problemas de saúde como alergias, problemas respiratórios ou cardiacos que serão visiveis aos educadores, além de ser possivel o cadastro do cardapio escolar para visualização dos responsaveis.</p>
        <h3 class="sub-titulo">Financeiro</h3>
        <p class="paragrafo">A seção financeiro é um controle de pagamentos, possibilitando a instituição visualizar quais responsaveis realizaram o pagamento mensal para instituição.</p>
        <h3 class="sub-titulo">Serviços</h3>
        <p class="paragrafo">Na area de serviços é possivel visualizar quais serviços separados como van escolar os responsaveis realizaram pagamento a parte</p>
        <h3 class="sub-titulo">Configurações</h3>
        <p class="paragrafo">Em configurações é possivel alterar as configuracões do software como tamanho de fontes e modos de daltonismo ou modo escuro.</p>
        <h2>Alguma duvida ou problema? Fale conosco.</h2>
        <p class="paragrafo">email: skedoo@skedoo.com</p>
        <p class="paragrafo">tel: (13) 996334709</p>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
@endsection
