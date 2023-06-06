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
    <link rel="stylesheet" href="{{ asset('css/padroes/estilo_logins.css') }}">
    @yield('styles')
    <title>{{ $title }}</title>
</head>
@php
    use Carbon\Carbon;
    Carbon::setlocale(config('app.locale'));
@endphp

<body>
    <nav>
        @yield('conteudo-nav')
    </nav>

    <div class="menu-bar">
        <h2>{{ $nomelogin }}</h2>
        <div class="flex">
            <a href="{{ route('clientes') }}" style="text-decoration: none;">
                <i class="uil uil-bell">
                    <p>Notificações</p>
                </i>
            </a>
            <h2 id="hora-atual" style="margin:auto; font-size:1.7em;">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('H:i:s') }}</h2>
        </div>
    </div>
    <div class="conteudo">
        @yield('content')
        <br><br>
        <footer>
            <div class="titulo_foot">
                <h4 style="width:100%; text-align:center; font-weight: bold; padding-bottom: 0.6rem" class="footer-color">Copyright & 2023 Skedoo - Todos os direitos reservados</h4>
            </div>
        </footer><br>
    </div>
</body>
<script src="{{ asset('js/configDataHora.js') }}"></script>


</html>
