<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operación</title>
</head>
<body>
    <?php
    if ($_GET) {
        $primerNumero = $_GET['primer-numero'];
        $segundoNumero = $_GET['segundo-numero'];
        $operacion = $_GET['operacion'];
        echo "El resultado de " . $primerNumero . " " . $operacion . " " . $segundoNumero . " es ";
        if ($operacion == "+") { echo $primerNumero+$segundoNumero; }
        elseif ($operacion == "-") { echo $primerNumero - $segundoNumero; }
        else { echo $primerNumero*$segundoNumero; }
    } else {
        echo "No se ha enviado nada";
    }
    ?>
</body>
</html>