<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje</title>
</head>
<body>
    <?php
        if ($_POST) {
            $nombre = $_POST['nombre-usuario'];
            $apellido = $_POST['apellido-usuario'];
            $edad = $_POST['edad-usuario'];
            $direccion = $_POST['direccion-usuario'];
            echo "Hola, soy " . $nombre . " " . $apellido . ", tengo " . $edad . " años y vivo en " . $direccion . ".";
        } else {
            echo "No se ha enviado nada.";
        }
    ?>
</body>
</html>