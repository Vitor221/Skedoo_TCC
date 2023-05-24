@extends('layouts.telas', ['title' => 'Skedoo - Refeição'], ['nometela' => 'Refeição'])

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo_refeicao.css') }}">
@endsection
@section('voltar')
<x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
@endsection

@section('content')
    <div class="div-conteudo">
        <h1 style="color:white; text-align:center;">CONTROLE DE CARDÁPIO</h1>
        <div class="div-refeicao">
            <br>
            <h3>Insira manualmente o cardapio escolar</h3>
            <button onclick="formRefeicao()" class="enviar" id="btnInsert">Inserir</button><br><br>
            <div class="insert">
                <form class="insert-refeicao" method="POST" style="display: none;" id="form"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="flex">
                        <div class="block" style="width: 100%">
                            <label>Dia da refeição:</label>
                            <input id="data" type="date" name="data">
                            <label style="margin-left: 2em;">Cor da Refeição</label>
                            <input type="color">
                        </div>
                    </div><br>

                    <div class="block">
                        <label>Nome do Prato</label><br>
                        <input id="nmPrato" type="text" name="nmPrato" class="nome-prato">
                    </div><br>
                    <div class="block">
                        <textarea id="DescPrato" type="text" cols="50" rows="4" name="DescPrato" placeholder="Insira uma descrição para o prato aqui..."></textarea>
                    </div><br>

                    <div class="block">
                      <label>Nome da Sobremessa</label><br>
                      <input id="nmSobremessa" type="text" name="nmSobremessa" class="nome-prato">
                      <input type="">
                    </div><br>
                    <div class="block">
                      <textarea id="DescSobremessa" type="text" cols="50" rows="4" name="DescSobremessa" placeholder="Insira uma descrição para a sobremesa aqui..."></textarea>
                    </div><br>

                    <button type="reset" class="cancelar" onclick="formRefeicaoFechar()">Cancelar</button>
                    <button type="submit" class="enviar" value="Enviar">Enviar</button>
                </form>
                <h3>Ou insira um arquivo em pdf</h3>
                <label>Arquivo PDF do Mês:</label>
                <input type="file" id="imgdopdf" name="arquivo" /><br>
                <button type="submit" class="enviar" value="Enviar">Enviar</button>
            </div><br>
        </div><br>
    </div>
    <script src="{{ asset('js/configRefeicao.js') }}"></script>
@endsection
