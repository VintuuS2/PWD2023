<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precio entrada</title>
    <style>
        body {
            display: flex;
            width: 100%;
            font-family: Arial, Helvetica, sans-serif;
        }
        div {
            width: 40%;
            margin:  200px auto;
            padding: 20px;
            background-color: #ddd;
            outline: dashed 1px black;
            text-align: center; 
            align-items: center;
        }
    </style>
</head>
<body>
    <div>                       
        <?php
            if ($_POST) {
                $edadUsuario = $_POST['edad-usuario'];
                $esEstudiante = $_POST['estudiante-usuario'];
                $mensaje = "El precio de su entrada es de $";
                if ($esEstudiante == "si") {
                    if ($edadUsuario < 12) {
                        $mensaje .= "160";
                    } else {
                        $mensaje .= "180";
                    }
                } else {
                    $mensaje .= "300";
                }
                echo $mensaje;
            } else {
                echo "No se recibieron datos";
            }
        ?>
    </div>
</body>
</html>