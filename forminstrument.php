<!doctype html>
<html lang="es">
<head>
  <title>Notas de paz</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.9/css/unicons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <script src="../assets/js/bootstrap.bundle.js"></script>
<link rel="stylesheet" href="Tform.css">
</head>
<body>
<?php
require_once 'conexion.php';


    if(isset($_POST['insertar'])) {
      $nombre = $_POST['nombre'];
      $apellido = $_POST['apellido'];
      $email = $_POST['email'];
      $n_telefono = $_POST['n_telefono'];
      $edad = $_POST['edad'];
      $ciudad = $_POST['ciudad'];
      $usuario = $_POST['usuario'];
      $clave = password_hash($_POST['clave'], PASSWORD_BCRYPT);

        // Validar que los campos no estén vacíos
        if (!empty($nombre) && !empty($apellido) && !empty($email) && !empty($n_telefono) && !empty($edad) && !empty($ciudad) && !empty($usuario) && !empty($clave)) {
            // Preparar la consulta SQL
            $insert = $conn->prepare('INSERT INTO administrador (nombre, apellido, email, n_telefono, edad, ciudad, usuario, clave) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
            $insert->bindParam(1, $nombre);
            $insert->bindParam(2, $apellido);
            $insert->bindParam(3, $email);
            $insert->bindParam(4, $n_telefono);
            $insert->bindParam(5, $edad);
            $insert->bindParam(6, $ciudad);
            $insert->bindParam(7, $usuario);
            $insert->bindParam(8, $clave);

            // Ejecutar la consulta y verificar el resultado
            if ($insert->execute()) {
                echo "Registro exitoso";
            } else {
                echo "Error al registrar";
            }
        } else {
            echo "Por Favor llene todos los campos";
        }
    }
?>
  <header class="list">
</header>
    <section id="form" class="box w-25 m-auto">
        <h2>Formulario de registro</h2>
        <form action="" method="POST" enctype="application/x-www-form-urlencoded">

            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" required>
           
            <label for="numero" class="form-label">Numero</label>
            <input type="number" name="numero" required>
           <p>Sección</p>
            <select name="section" id="section">
            <label for="seccion" class="form-label" name="seccion">Sección</label>
              <option value="1">Banda</option>
              <option value="2">Coro</option>
              <option value="3">Estudiantina</option>
            </select>
            <br>
          <button name="insertar" type="submit" style="margin: 10px;">Enviar</button>
          <p>¡WELCOME!</p> 
        </form>
    </section>
</body>
</html>

