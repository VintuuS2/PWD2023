<?php
$tituloPagina = "TP1-Mensaje ejercicio 3";
include_once '../../../TP4/configuracion.php';
include_once '../estructura/header.php';
include_once '../../Control/persona.php';
if ($_POST) {
    $nombre = $_POST['nombre-usuario'];
    $apellido = $_POST['apellido-usuario'];
    $edad = $_POST['edad-usuario'];
    $direccion = $_POST['direccion-usuario'];
    $persona = new Persona($nombre, $apellido, $edad, $direccion);
    $mensaje = $persona->saludo();
} else {
    $mensaje = "No se ha enviado nada.";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mensaje</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../../TP4/Vista/css/style.css">
</head>

<body>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <?php
            echo $mensaje;
            ?>
        </div>
    </div>

<?php include_once '../estructura/footer.php'; ?>