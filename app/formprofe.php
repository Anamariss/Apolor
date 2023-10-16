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

    if(isset($_POST['nombre'], $_POST['apellido'], $_POST['email'], $_POST['n_telefono'], $_POST['edad'], $_POST['ciudad'], $_POST['usuario'], $_POST['clave'])) {
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
                echo "<script>
                    Swal.fire({
                        text: 'Gracias por registrarte, $nombre.',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    });
                </script>";
            } else {
                echo "<script>
                    Swal.fire({
                        text: 'Hubo un error al registrar los datos en la base de datos.',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    });
                </script>";
            }
        } else {
            echo "<script>
                Swal.fire({
                    text: 'Por favor, complete todos los campos.',
                    icon: 'warning',
                    confirmButtonText: 'Aceptar'
                });
            </script>";
        }
    }
?>

  <header class="list">
</header>
    <section id="form" class="box w-25 m-auto">
        <h2>Form</h2>
        <form>
            <p> Nombre</p>
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre" required>
            <p> Apellido</p>
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" name="apellido" required>
            <p> Documento</p>
            <label for="documento" class="form-label">Documento</label>
            <input type="number" name="documento" required>
            <p> Edad</p>
            <label for="edad" class="form-label">Edad</label>
            <input type="number" name="edad" required>
            <p> Email</p>
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" required>
             <p> Proceso</p>
             <label for="proceso" class="form-label">Proceso</label>
            <input type="text" name="proceso" required>
            <p> Dirección</p>
            <label for="direccion" class="form-label">Direccion</label>
            <input type="text" name="direccion" required>
            <p> Usuario</p>
            <label for="usuario" class="form-label">Usuario</label>
            <input type="text" name="usuario" required>
            <p> Clave</p>
            <label for="clave" class="form-label">Clave</label>
            <input type="password" name="clave" required>
            <p> Seccion</p>
            <label for="seccion" class="form-label">Seccion</label>
            <select name="seccion">
              <option value="1">Banda</option>
              <option value="2">Coro</option>
              <option value="3">Estudiantina</option>
            </select>
            <br>
          <button type="submit" style="margin: 10px;">Enviar</button>
          <p>¡WELCOME!</p> 
        </form>
    </section>
</body>
</html>

