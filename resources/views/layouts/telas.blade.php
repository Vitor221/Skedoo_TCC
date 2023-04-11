<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!-- FontAwesome - Ícones -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/estilo_padrao_telas.css') }}">
    @yield('styles')
    <title>{{ $title }}</title>
</head>

<body>
    <nav class="nav">
        <img class="logo" src="{{ asset('../img/Skedoo.png') }}" alt="">
        <h3 style="margin-bottom: 0px;">Bem-vindo, {{ session('login')['nm_login'] }}</h3>
        <x-profile-button />
    </nav>

    <div class="menu-bar">
        @yield('voltar')
        <h2>{{ $nometela }}</h2>
    </div>
    <div class="conteudo">
        @yield('content')
    </div>
</body>

</html>
