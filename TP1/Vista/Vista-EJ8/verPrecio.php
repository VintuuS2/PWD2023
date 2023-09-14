<?php
include_once '../../../TP4/configuracion.php';
include_once '../../../navbar.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../../TP4/Vista/css/style.css">
    <style>
        .div-mensaje {
            margin: 200px auto;
            padding: 20px;
            background-color: #ddd;
            outline: dashed 1px black;
            text-align: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <div class="div-mensaje">
                <?php
                echo $mensaje;
                ?>
            </div>
        </div>
    </div>

</body>

</html>