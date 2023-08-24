<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje 5</title>
</head>
<body>
    <center>
        <?php
        if ($_POST) {
            $nombre = $_POST['nombre-usuario'];
            $apellido = $_POST['apellido-usuario'];
            $edad = $_POST['edad-usuario'];
            $direccion = $_POST['direccion-usuario'];
            $salida = "Hola, soy " . $nombre . " " . $apellido;
            if ($edad >=18) {
                $salida .= ", soy mayor de edad";
            } else {
                $salida .= ", soy menor de edad";
            }
            $salida .= ", vivo en " . $direccion;
            $estudios = $_REQUEST['radio'];
            if ($estudios == "se") {
                $salida .= ", no tengo estudios";
            } else if ($estudios == "ep") {
                $salida .= ", tengo estudios primarios";
            } else {
                $salida .= ", tengo estudios secundarios";
            }
            $genero = $_POST['genero-usuario'];
            if ($genero == "masculino") {
                $salida .= " y soy hombre.";
            } else {
                $salida .= " y soy mujer.";
            }
            echo $salida;
        } else {
            echo "No se ha enviado nada";
        }
        ?>
    </center>
</body>
</html>