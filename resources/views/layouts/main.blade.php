<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- FontAwesome - Ícones -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="{{ asset('css/padroes/estilo_padrao.css') }}">
    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}">

    @yield('styles')

    <title>{{$title}}</title>
</head>

<body>
    @yield('content')
    <footer>
        <div class="titulo_foot">
            <h3>Copyright & 2023 Skedoo - Todos os direitos reservados</h3>
        </div>
        <div class="social_img">
            <ul>
                <li><a href=""><img src="{{ asset('img/logo/facebook_logo.png')}}" alt=""></a></li>
                <li><a href=""><img src="{{ asset('img/logo/instagram_logo.png') }}" alt=""></a></li>
                <li><a href=""><img src="{{ asset('img/logo/twitter_logo.png') }}" alt=""></a></li>
                <li><a href=""><img src="{{ asset('img/logo/youtube_logo.png') }}" alt=""></a></li>
            </ul>
        </div>
    </footer>
</body>

</html>