<?php
include_once '../menuTP4.php';
include_once '../Control/AbmPersona.php';
if ($_POST){
    $dni = $_POST['NroDni'];
    $apellido = $_POST['Apellido'];
    $nombre = $_POST['Nombre'];
    $fechaNac = $_POST['fechaNac'];
    $telefono = $_POST['Telefono'];
    $direccion = $_POST['Direccion'];

    $personas = new AbmPersona();
    $respuesta = $personas->alta($_POST);
    if (!$respuesta){
        echo "Los datos son erroneos";
    } else {
        echo "Datos ingresados correctamente";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir persona</title>
</head>
<body>
    
</body>
</html>