<?php
include_once '--/../../../TP4/configuracion.php';
include_once "../../../Control/Ej3/Usuarios.php";
include_once '../../../../navbar.php';
    if ($_POST){
        $datosLoggeo['usuario'] = $_POST['usuario'];
        $datosLoggeo['clave'] = $_POST['contra'];
        $usuarios1 = new Usuarios();
        if ($usuarios1->verificarCredenciales($datosLoggeo['usuario'],$datosLoggeo['clave'])){
            echo "<h2> Bienvenido de vuelta, ". $datosLoggeo['usuario'] . "<h2>";
        } else {
            echo "<h2> Los datos no coinciden con nuestra base de datos</h2>";
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Ejercicio 3</title>
</head>
<body>
    
</body>
</html>