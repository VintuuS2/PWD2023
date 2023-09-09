<?php
include_once '../configuracion.php';
$objPersona = new AbmPersona();

$listaPersonas = $objPersona->buscar(null);
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
    <table>
        <th>Apellido</th>
        <th>Nombre</th>
        <th>Numero de DNI</th>
        <th>Fecha de Nacimiento</th>
        <th>Telefono</th>
        <th>Domicilio</th>
        <?php
        if (count($listaPersonas) > 0) {
            foreach ($listaPersonas as $persona) {
                echo "<tr><td>" . $persona->getApellido() . "</td><td>" . $persona->getNombre() . "</td><td>" . $persona->getNroDni() . "</td><td>" . $persona->getFechaNac() . "</td><td>" .   $persona->getTelefono() . "</td><td>" . $persona->getDomicilio() ."</td></tr><br>";
                echo $persona->getNombre();
            }
        }
        ?>
    </table>
</body>

</html>