<!DOCTYPE html>
<html lang="es-CO" data-bs-theme="light">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apolo</title>

  <meta name="theme-color" content="#ff2e01">
  <meta name="MobileOptimized" content="width">
  <meta name="HandhledFriendly" content="true">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar" content="black-traslucent">

  <!--Tags SEO-->
  <meta name="author" content="Miproyecto">
  <meta name="description" content="Aplicativo para enseñanza de Bootstrap">
  <meta name="keyworks" content="SENA, sena, Sena, Web App, web app, WEB APP">

  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <script src="assets/js/bootstrap.bundle.js"></script>
  <script src="assets/js/nuevo.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-light">
    <div class="container-fluid">

      <!--imagen-->
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="./">
            <img src="media/logoo.png" alt="logo" width="60" height="60">
          </a>
          <!--imagen-->
          </a>
        </div>
      </nav>
      <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!--parte derecha-->
      <div class="container-fluid bg-light sticky-top">
        <div class="container">
          <nav class="navbar navbar-sxpand-lg bg-light navbar-light py-2 py-lg-0">
          </nav>
        </div>
      </div>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-6 mb-lg-0">
          <li class="nav-item px-2">
            <a class="nav-link active text-dark fst-italic hola" aria-current="page" href="index.php">Inicio</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link  text-dark fst-italic" href="?page=procesos">Procesos</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link text-dark fst-italic" href="?page=ingresar">Ingresar</a>
          </li>
          <li class="nav-item px-2">
            <a class="nav-link active text-dark fst-italic" aria-current="page" href="?page=eventos">Eventos</a>
          <li class="nav-item px-2">
            <a class="nav-link  text-dark fst-italic" href="?page=Nosotros">Contactanos</a>
          </li>

          <!--final derecha-->

          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!--header-->
  <main>
    <?php
    //Controlador del navbar
    $page=isset($_GET['page']) ? strtolower($_GET['page']) : 'index';
    require_once './'.$page.'.php';

    if ($page=='index') {
        require_once 'inicio.html';
    }

    ?>
  </main>
</body>

</html>