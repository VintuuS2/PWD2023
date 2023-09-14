<?php
include_once '../../../TP4/configuracion.php';
include_once '../../../menu-paginas.php';
    include_once '../../Control/Control-EJ8/cine.php';
    if ($_POST) {
        $edadUsuario = $_POST['edad-usuario'];
        $esEstudiante = $_POST['estudiante-usuario'];
        $cine = new Cine();
        $precio = $cine->calcularEntrada($edadUsuario, $esEstudiante);
        $mensaje = "El precio de su entrada es de $" . $precio;
    } else {
        $mensaje = "No se recibieron datos";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precio entrada</title>
    <style>
        .div-mensaje {
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
    <div class="div-mensaje">                       
        <?php
            echo $mensaje;
        ?>
    </div>
</body>
</html>