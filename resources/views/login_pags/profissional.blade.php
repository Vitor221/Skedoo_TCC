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
    <link rel="stylesheet" href="{{ asset('css/estilo_instituicao.css') }}">
    <title>Instituição - Skedoo</title>
</head>
<body>
    <nav>
        <img src="{{ asset('../img/Skedoo.png') }}" alt="">
        <h3>Bem-vindo, ...</h3> 
        <span><a href="{{ route('logout') }}">Sair</a></span>
    </nav>

    <div class="menu-bar">
        <h2>Menu</h2>
        <div class="search">
            <input type="search" placeholder="Pesquisar" aria-label="Pesquisar">
            <button type="submit">Pesquisar</button>
        </div>
    </div>

    <div class="group-date-inst">
        <div class="instituicao">
            <h2>Instituição - Nome</h2>
        </div>

        <div class="date-now">
            <h3>12/06/2023</h3>
        </div>
    </div>

</body>
</html>