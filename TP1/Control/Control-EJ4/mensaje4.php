<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje</title>
</head>
<body>
    <center>
        <?php
        if ($_GET) {
            $nombre = $_GET['nombre-usuario'];
            $apellido = $_GET['apellido-usuario'];
            $edad = $_GET['edad-usuario'];
            $direccion = $_GET['direccion-usuario'];
            $salida = "Hola, soy " . $nombre . " " . $apellido;
            if ($edad >=18) {
                $salida .= ", soy mayor de edad";
            } else {
                $salida .= ", soy menor de edad";
            }
            $salida .= " y vivo en " . $direccion . ".";
            echo $salida;
        } else {
            echo "No se ha enviado nada";
        }
        ?>
    </center>
</body>
</html>