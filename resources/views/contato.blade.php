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
    <link rel="stylesheet" href="{{ asset('css/estilo_contato.css') }}">
    <title>Contato - Skedoo</title>
</head>
<body>
  <nav>
    <ul class="menu_list">
      <li><a href="{{ route('inicio_pag') }}">Início</a></li>
      <li id="baixe_app-list" class="menu_item"><a id="baixe_app" href="">Baixe o App</a></li>
      <li><a href="">Login <i class="uil uil-user"></i></a></li>
    </ul>
  </nav>

  <main class="conteudo">
    <div class="logo_skedoo">
      <a href="{{ route('skedoo_pag') }}"><img src="{{ asset('img/Skedoo.png') }}" alt=""></a>
    </div>

    <div class="texto_topo">
      <p>Caso tenha surgido uma curiosidade, dúvida ou queira entrar em contato para saber mais do nosso sistema, preencha o formulário abaixo, assim que possível estaremos entrando em contato.
      </p>
    </div>

    <form action="">
      <div class="grupo_input">
        <div class="input_box">
          <label>Nome</label>
          <input type="text">
        </div>

        <div class="input_box">
          <label>E-mail</label>
          <input type="text">
        </div>

        <div class="input_tel-cel">
          <div class="input_box">
            <label>Telefone</label>
            <input id="input-tel" type="text">
          </div>

          <div class="input_box">
            <label>Celular</label>
            <input id="input-cel" type="text">
          </div>
        </div>

        <div class="input_box">
          <label>Nome da Instituição</label>
          <input type="text">
        </div>

        <div class="input_box">
          <label id="label_duv">Dúvidas</label>
          <textarea name="" id="textarea_duv" cols="30" rows="10"></textarea>
        </div>
      </div>

      <div class="botao_envio">
        <button type="submit">Enviar</button>
      </div>
    </form>

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
  </main>

  
</body>
</html>