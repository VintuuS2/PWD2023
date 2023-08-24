<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje 6</title>
    <style>
        div {
            width: 50vw;
            margin:auto;
            text-align: center;
            padding-top: 25px;
        }
    </style>
</head>
<body>
    <div>
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
                $salida .= ", soy hombre";
            } else {
                $salida .= ", soy mujer";
            }
            $practicoDeportes = $_POST['deporte'];
            $cantDeportes = 0;
            foreach ($practicoDeportes as $practicoDeportes=>$value) {
                if ($value === "on") {
                    $cantDeportes++;
                }
           }
           $salida .= " y practico " . $cantDeportes . " deportes.";
            echo $salida;
        } else {
            echo "No se ha enviado nada";
        }
        ?>
    </div>
</body>
</html>