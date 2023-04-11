<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <!-- FontAwesome - Ícones -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/estilo_padrao_logins.css') }}">
    @yield('styles')
    <title>{{ $title }}</title>
</head>

<body>
    <nav>
        <img src="{{ asset('../img/Skedoo.png') }}" alt="">
        <h3>Bem-vindo, {{ session('login')['nm_login'] }}</h3>
        <x-profile-button />
    </nav>

    <div class="menu-bar">
        <h2>{{ $nomelogin }}</h2>
        <div class="flex">
            <a href="{{route('clientes')}}" style="text-decoration: none;">
                <i class="uil uil-bell"><p>Notificações</p></i>
            </a>
            <div class="search">
                <input type="search" placeholder="Pesquisar" aria-label="Pesquisar">
                <button type="submit"><i class="uil uil-search"></i></button>
            </div>
        </div>
    </div>

    <div class="desenvolvimento-area">
        <img class="img" src="{{ asset('../img/Skedoo.png') }}" alt="">
        <span class="texto-desenvolvimento">Em Desenvolvimento</span>
    </div>
</body>

</html>
