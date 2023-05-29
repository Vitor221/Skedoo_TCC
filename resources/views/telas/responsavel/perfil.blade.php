<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
        integrity="sha384-MrcW6ZMFYlzcBC8NHDz+AwtTVTI0T8IUGuYnAD8IHTA5Q=" crossorigin="anonymous">
        <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/estilo_perfil.css') }}">
    <script src=""></script>
</head>

<body class="conteudo">
    <x-button-back href="{{ url()->previous() }}" icon="uil uil-angle-left"/>
    
    <form class="form-cadastro" method="POST" id="form" enctype="multipart/form-data" action="{{ route('responsavel.perfil.atualizar') }}">
        @csrf
        <input type="file" id="image" name="image" class="form-control-file">
        <br>
        <br>
        <button type="reset" class="cancelar" onclick="fechaForm()">Cancelar</button>
        <button type="submit" class="enviar">Enviar</button>
    </form>

    <div class="img_div">
        <div onclick="inserir()" >
            @if($login->img_perfil)
                <img name="image" id="img-perfil" class="img-personalizado" src="{{ url('storage/' . $login->img_perfil) }}" alt="">
            @else
                <img name="image" class="img-perfil" src="https://i.stack.imgur.com/Bzcs0.png" alt="">
            @endif
        </div>
    </div>

    <div class="informacoes">
        <h3 class="info-titulo">
            Nome de Usuário
        </h3>
        <p class="info-texto">{{ session('login')['nm_login'] }}</p>
    </div>
    
    <div class="flex">
        <div class="div-sair">
            <a href="{{ route('logout') }}" class="sair-link">Sair</a>
        </div>
        
        <div class="div-voltar">
        </div>
    </div>

    <script src="{{ asset('js/configTelas.js') }}"></script>
</body>

</html>
