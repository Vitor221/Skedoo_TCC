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
    <h1 style="color:white; margin-left: 28%;">CONTROLE DE CARDÁPIO</h1>
    <br>
    <div class="insert">
    <form method="POST" id="form" enctype="multipart/form-data">
    @csrf
    <label>Arquivo PDF do Mês:</label>
    <input type="file" id="imgdopdf" name="imgdopdf" /><br>
    {{-- <label>Data:</label>
    <input id="data" type="date" name="data">
    <label>Dia da semana:</label>
    <select name="ddSemana" id="ddSemana" class="texto">
       <option class="Data-semana" value="0">Selecione</option>
       <option class="Data-semana" value="Segunda-feira">Segunda-feira</option>
       <option class="Data-semana" value="Terça-feira">Terça-feira</option>
       <option class="Data-semana" value="Quarta-feira">Quarta-feira</option>
       <option class="Data-semana" value="Quinta-feira">Quinta-feira</option>
       <option class="Data-semana" value="Sexta-feira">Sexta-feira</option>
     </select><br><br>
    <label>Nome do prato:</label>
    <input id="nmPrato" type="text" name="nmPrato"><br><br>
    <label>Descrição do prato:</label>
    <textarea id="DescPrato" type="text" cols="30" rows="10" name="DescPrato"></textarea><br>
    <label>Imagem do Prato:</label>
    <input type="file" id="imgPrato" name="imgPrato" /><br><br>
    <label>Nome da Sobremessa:</label>
    <input id="nmSobremessa" type="text" name="nmSobremessa"><br><br>
    <label>Descrição da sobremessa:</label>
    <textarea id="DescSobremessa" type="text" cols="30" rows="10" name="DescSobremessa"></textarea><br>
    <label>Imagem da Sobremessa:</label>
    <input type="file" id="imgSobremessa" name="imgSobremessa" /><br> --}}
    <button type="reset" class="cancelar" onclick="LimparForm()">Cancelar</button>
    <input type="submit" value="Enviar" />
    </form>

    <h1>Arquivos DPF.</h1>
    
    
</div>
</div>

   

       

       <embed src=" url('./Storage/app/public/cardapio/may.pdf')" width="800px" height="2100px" type='application/pdf' />
       <iframe src=" url('./Storage/app/public/cardapio/may.pdf')" width="600" height="780" style="border: none;" type='application/pdf'></iframe>

       <script>
        PDFObject.embed("{{ url('./Storage/app/public/cardapio/may.pdf') }}", "#pdf-viewer");
        </script>
    
@endsection
