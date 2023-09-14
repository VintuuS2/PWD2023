<?php
include_once '../../../TP4/configuracion.php';
include_once '../../../navbar.php';
    include_once '../../Control/Control-EJ5/persona5.php';
    if ($_POST) {
        $nombre = $_POST['nombre-usuario'];
        $apellido = $_POST['apellido-usuario'];
        $edad = $_POST['edad-usuario'];
        $direccion = $_POST['direccion-usuario'];
        $estudios = $_REQUEST['radio'];
        $genero = $_POST['genero-usuario'];
        $persona = new Persona($nombre, $apellido, $edad, $direccion, $estudios, $genero);
        $mensaje = $persona->saludo();
        } else {
            $mensaje = "No se ha enviado nada";
        }

        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje 5</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
        <?php
            echo $mensaje;
        ?>
</body>
</html>