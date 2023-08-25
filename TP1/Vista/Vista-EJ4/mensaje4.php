<?php
include_once '../../../menu-paginas.php';
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
</head>
<body>
    <?php
        echo $mensaje;
    ?>
</body>
</html>