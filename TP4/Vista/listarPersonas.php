<?php
include_once '../configuracion.php';
include_once '../menuTP4.php';
$objPersona = new AbmPersona();

$listaPersonas = $objPersona->buscar(null);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Personas</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="./js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
        <div class="w-75" style="margin: auto;">
        <?php
        if (count($listaPersonas) > 0) {
            echo "<table class=table><thead class=thead-dark><tr><th colspan=7 style=text-align:center>Personas</th></tr><tr><th>#</th><th>Apellido</th><th>Nombre</th><th>Numero de DNI</th><th>Fecha de Nacimiento</th><th>Telefono</th><th>Domicilio</th></tr>";
            $i = 1;
            foreach ($listaPersonas as $persona) {
                echo "<tr><td>" . $i . "</td><td>" . $persona->getApellido() . "</td> <td>" . $persona->getNombre() . "</td><td>" . $persona->getNroDni() . "</td><td>" . $persona->getFechaNac() . "</td><td>" .   $persona->getTelefono() . "</td><td>" . $persona->getDomicilio() ."</td></tr><br>";
                $i++;
            }
            echo "</table>";
        }
        else {
            echo "<h3>No hay Personas registradas</h3>";
        }
        ?>
        </div>
    
</body>

</html>