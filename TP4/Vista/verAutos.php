<?php
include_once '../configuracion.php';
include_once '../menuTP4.php';
$objAuto = new AbmAuto();

$listaAutos = $objAuto->buscar(null);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Autos</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="w-75" style="margin: auto;">
    <?php
        if (count($listaAutos)>0){
            echo "<table class=table><thead class=thead-dark><tr><th colspan=6 style=text-align:center>Autos</th></tr><tr><th>#</th><th>Patente</th><th>Marca</th><th>Modelo</th><th>Nombre</th><th>Apellido</th></tr>";
            $i = 1;
            foreach ($listaAutos as $auto){
                $objDuenio = $auto->getObjDuenio();
                echo "<tr><td>".$i."</td><td>".$auto->getPatente()."</td><td>".$auto->getMarca()."</td><td>".$auto->getModelo()."</td><td>".$objDuenio->getNombre()."</td><td>".   $objDuenio->getApellido()."</td></tr><br>";
                $i++;
            }
            echo "</table>";
        } else {
            echo "<h3>No hay autos registrados</h3>";
        }
        ?>
    </div>
</body>
</html>