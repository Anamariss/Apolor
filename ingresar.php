<?php

  require_once 'conexion.php';
  session_start();

  if (isset($_POST['validar'])) {
    $result_1 = $conn->prepare('SELECT * FROM administrador WHERE usuario=?');
    $result_1->bindParam(1, $_POST['usuario']);
  
    $result_1->execute();

    $data_1 = $result_1->fetch(PDO::FETCH_ASSOC);

    //var_dump($data_1);
    //die;

    if(!empty($data_1) or $data_1 !== false){
      //es administrador
    }else{
      //buscar en estudiante
      echo "buscar en estudiante";
      die;
      $result = $conn->prepare('SELECT * FROM estudiante WHERE usuario=?');
      $result->bindParam(1, $_POST['usuario']);
      $result->execute();

      $data = $result->fetch(PDO::FETCH_ASSOC);
    
    }

    //var_dump($_POST['usuario']);die;


    $result->execute();

    $data = $result->fetch(PDO::FETCH_ASSOC);
    var_dump($data);die;

    //Verficamos si hay datos
    if ($data = $result->fetch(PDO::FETCH_ASSOC)) {
      switch ($data['rol']) {
        case 'Administrador':
          //Verficamos si la contraseña es correcta
          if (password_verify($_POST['clave'], $data['clave'])) {
            $_SESSION['administrador'] = $data['rol'];
            header('location: index.admin.html');
          } else {
            echo "Contraseña incorrecta";
          }
          break;
        case 'Estudiante':
          //Verficamos si la contraseña es correcta
          if (password_verify($_POST['clave'], $data['clave'])) {
            $_SESSION['estudiante'] = $data['rol'];
            header('location: Est.php');
          } else {
            echo "Contraseña incorrecta";
          }
          break;
        
        default:
         
          break;
      }
      
    } else {
      echo "Datos incorrectos";
    }
  }
?>
<section class="px-5">

  <div class="mt-4 p-3 bg-primary text-white rounded">
    <h1 class="text-center fst-italic">ingresar</h1>
  </div>

</section>
<br>
<section>

  <form class="box p-5 px-1 w-50 m-auto" action="" method="POST" enctype="application/x-www-form-urlencoded">
    <div class="mb-3 text-center">
      <label for="usuario" class="form-label fst-italic">Usuario</label>
      <input type="text" class="form-control" name="usuario" id="exampleInputEmail1" aria-describedby="emailHelp">
      <div id="emailHelp" class="form-text fst-italic">We'll never share your email with anyone else.</div>
    </div>
    <div class="mb-3 text-center">
      <label for="clave" class="form-label fst-italic">Contraseña</label>
      <input type="password" class="form-control" name="clave" id="exampleInputPassword1">
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label fst-italic" for="exampleCheck1">Recordarme</label>
    </div>
    <div class="clearfix">
      <span class="float-start">
        <a class="btn btn-primary pt-2" href="">volver</a>

      </span>
      <span class="float-end">
        <button class="btn btn-primary pt-2" name="validar">Iniciar sesion</button>

      
        <br>
      </span>
    </div>
  </form>

</section>
<br>


<!--fin de eventos-->
<footer class="bg-primary text-center text-white">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn text-white btn-floating m-1" aria-label="Read more about Seminole tax hike"
        style="background-color: #3b5998;" href="https://www.facebook.com/AngelJorgeMontoyaLuna?mibextid=ZbWKwL"
        role="button"><i class="bi bi-facebook"></i>
        <!-- Instagram -->
        <a class="btn text-white btn-floating m-1" aria-label="Read more about Seminole tax hike"
          style="background-color: #b31d1d;" href="https://www.youtube.com/@escuelademusicaamalfi-anti2320"
          role="button"><i class="bi bi-youtube"></i>
          <!-- whatsapp -->
          <a class="btn text-white btn-floating m-1" aria-label="Read more about Seminole tax hike"
            style="background-color: #0df553;" href="" role="button"><i class="bi bi-whatsapp"></i></a>
    </section>
    <!-- Section: Social media -->
    <!-- Grid container -->
    <!-- Copyright -->
    <div class="text-center p-3 bg-primary" style="background-color: rgba(0, 0, 0, 0.2);">
      © 2023 Copyright:
      <a class="text-white" href="app/iniciosesion.php">Apolo</a>
    </div>
    <!-- Copyright -->
  </div>
  <div class="clearfix">
    <span class="float-end"><a href="#" class="js-backtotop text-dark px-3 ">Hasta Arriba<i
          class="icon-arrow-long-up"></i></a></span>
  </div>
</footer>