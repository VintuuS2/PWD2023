<?php
include_once '../../../TP4/configuracion.php';
include_once '../../../navbar.php';
    include_once '../../Control/Control-EJ4/persona4.php';
    if ($_GET) {
        $nombre = $_GET['nombre-usuario'];
        $apellido = $_GET['apellido-usuario'];
        $edad = $_GET['edad-usuario'];
        $direccion = $_GET['direccion-usuario'];
        $persona = new Persona ($nombre, $apellido, $edad, $direccion);
        $mensaje = $persona->saludo();
    } else {
        $mensaje = "No se ha enviado nada.";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje 4</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        echo $mensaje;
    ?>
</body>
</html>