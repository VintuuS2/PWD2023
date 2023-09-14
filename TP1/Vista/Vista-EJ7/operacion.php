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
</head>
<body>
    <?php
        echo $mensaje;
    ?>
</body>
</html>