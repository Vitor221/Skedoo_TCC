<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- FontAwesome - Ícones -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/estilo_padrao_telas.css') }}">
    <title>{{ $title }}</title>
</head>

<body>
    <nav>
        <img src="{{ asset('../img/Skedoo.png') }}" alt="">
        <h3>Bem-vindo, {{ session('login')['nm_login'] }}</h3>
        <x-profile-button />
    </nav>

    <div class="menu-bar">
        <h2>{{ $nometela }}</h2>
    </div>
    <div class="conteudo">
        @yield('content')
        <br>
    </div>
</body>

</html>
