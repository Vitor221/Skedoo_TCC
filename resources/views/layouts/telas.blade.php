<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    @yield('meta')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    {{-- icones --}}
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    {{-- estilo padrao nas telas --}}
    <link rel="stylesheet" href="{{ asset('css/padroes/estilo_telas.css') }}">
    @yield('links-scripts')
    @yield('styles') 
    <title>{{ $title }}</title>
</head>

<body>
    <nav>
        @yield('nav-telas')
    </nav>

    <div class="menu-bar">
        @yield('voltar')
        <h2>{{ $nometela }}</h2>
        <h2 id="hora-atual" style="text-decoration: none;margin-left:auto; font-size:1.7em;">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('H:i:s') }}</h2>
    </div>
    <div class="conteudo">
        @yield('content')
    </div>
    <br>

    
</body>
    <script src="{{asset('js/configDataHora.js')}}"></script>
</html>
