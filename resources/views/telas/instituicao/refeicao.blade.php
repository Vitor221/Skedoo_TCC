@extends('layouts.telas', ['title' => 'Skedoo - Refeição'], ['nometela' => 'Refeição'])

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo_refeicao.css') }}">
@endsection
@section('voltar')
<x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
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
    <div class="div-conteudo">
        <h1>CONTROLE DE CARDÁPIO</h1>
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
                            <input id="cor" name="cor" type="color">
                        </div>
                    </div><br>

                    <div class="block">
                        <label>Nome do Prato</label><br>
                        <input id="nmPrato" type="text" name="nmPrato" class="nome-prato">
                    </div><br>
                    <div class="block">
                        <textarea id="DescPrato" type="text" cols="50" rows="4" name="DescPrato"
                            placeholder="Insira uma descrição para o prato aqui..."></textarea>
                    </div><br>

                    <div class="block">
                        <label>Nome da Sobremessa</label><br>
                        <input id="nmSobremessa" type="text" name="nmSobremessa" class="nome-prato">
                    </div><br>
                    <div class="block">
                        <textarea id="DescSobremessa" type="text" cols="50" rows="4" name="DescSobremessa"
                            placeholder="Insira uma descrição para a sobremesa aqui..."></textarea>
                    </div><br>

                    <button type="reset" class="cancelar" onclick="formRefeicaoFechar()">Cancelar</button>
                    <button type="submit" class="enviar" value="Enviar">Enviar</button>
                </form>
                <h3>Ou insira um arquivo em pdf</h3>
                <form action="" method="POST"  enctype="multipart/form-data">
                @csrf
                <label>Arquivo PDF do Mês:</label>
                <input type="file" id="imgdopdf" name="imgdopdf" /><br>
                <button type="submit" class="enviar" value="Enviar">Enviar</button>
                </form>
            </div><br>
        </div><br>
    </div><br><br>
        <div class="div-conteudo">
            <h1>PDF DO MÊS</h1>
            <a href="{{ route('download.arquivo') }}">Clique aqui para baixar o arquivo</a>
        </div>
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
                            <form method="POST"
                                action="{{ route('instituicao.saude.delete', $cardapioHoje->id_cardapio)}}">
                                @csrf
                                @method('DELETE')
                                <button><i class="uil uil-times"></i></button>
                            </form>
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
                                
                                <form method="POST"
                                    action="{{ route('instituicao.refeicao.delete', $TbCardapio->id_cardapio) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button><i class="uil uil-times"></i></button>
                                </form>
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
                                <form method="GET">

                                </form>
                                
                                <form method="POST"
                                    action="{{ route('instituicao.refeicao.delete', $cardapioAnterior->id_cardapio) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button><i class="uil uil-times"></i></button>
                                </form>
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
    <script src="{{ asset('js/configRefeicao.js') }}"></script>
@endsection
