<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- FontAwesome - Ícones -->
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
  <link rel="stylesheet" href="{{ asset('css/estilo_inicio.css') }}">
  <title>Skedoo - Inicio</title>
</head>
<body>
  <nav>
    <a href="{{ route('skedoo_pag')}}"><img id="logo_nav" src="{{ asset('img/Skedoo.png')}}" alt="logo da Skedoo"></a>
    <ul class="menu_list">
      <li><a href="#">Contato</a></li>
      <li id="baixe_app-list" class="menu_item"><a id="baixe_app" href="">Baixe o App</a></li>
      <li><a href="">Login <i class="uil uil-user"></i></a></li>
    </ul>
  </nav>
  <main>
    <section class="intro_skedoo">
      <div class="img_intro">
        <img src="{{ asset('img/img_inicio/skedoo_celular.png') }}" alt="logo skedoo">
      </div>
      <div class="text_intro">
        <h2>O que é Skedoo?</h2>
        <p>É um aplicativo desktop e mobile desenvolvido para facilitar a comunicação e a organização das instituições. Conectando-as com todos os responsaveis por alunos matriculados naquela instituição</p>
      </div>
    </section>


  </main>
</body>
</html>