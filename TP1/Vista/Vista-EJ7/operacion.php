<?php
include_once '../../../TP4/configuracion.php';
include_once '../../../navbar.php';
    include_once '../../Control/Control-EJ7/matematicas.php';
    if ($_GET) {
        $primerNumero = $_GET['primer-numero'];
        $segundoNumero = $_GET['segundo-numero'];
        $operacion = $_GET['operacion'];
        $matematicas = new Matematicas();
        $resultado = $matematicas->realizarOperacion($primerNumero, $segundoNumero, $operacion);
        $mensaje = "El resultado de " . $primerNumero . " " . $operacion . " " . $segundoNumero . " es " . $resultado;        
    } else {
        $mensaje = "No se ha enviado nada";
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operación</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        echo $mensaje;
    ?>
</body>
</html>