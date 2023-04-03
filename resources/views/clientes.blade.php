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
    <link rel="stylesheet" href="{{ asset('css/estilo_padrao.css') }}">

    @yield('styles')

    <title>Cliente</title>
</head>

<body>
    @yield('content')

    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>
    


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