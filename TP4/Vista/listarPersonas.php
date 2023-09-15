<?php
include_once '../configuracion.php';
include_once '../../navbar.php';
$objPersona = new AbmPersona();

$listaPersonas = $objPersona->buscar(null);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Personas</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="./js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="contenedor" style="min-width: 802px;">
        <div class="w-100 d-flex" style="flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <?php
            if (count($listaPersonas) > 0) {
                echo "
                <table class='table'>
                    <thead class='table-dark'>
                        <tr>
                            <th colspan=7 class='table-dark' style='text-align:center;'>Personas</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Numero de DNI</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Telefono</th>
                            <th>Domicilio</th>
                        </tr>
                    </thead>";
                $i = 1;
                foreach ($listaPersonas as $persona) {
                    echo "<tr><td>" . $i . "</td><td>" . $persona->getApellido() . "</td> <td>" . $persona->getNombre() . "</td><td>" . $persona->getNroDni() . "</td><td>" . $persona->getFechaNac() . "</td><td>" .   $persona->getTelefono() . "</td><td>" . $persona->getDomicilio() ."</td></tr>";
                    $i++;
                }
                echo "</table>";
            }
            else {
                echo "<h3>No hay Personas registradas</h3>";
            }
            ?>
            <a href="autosPersona.php" class=" btn btn-primary link-light" style="padding: 10px 10px; font-size:1.2em;">Buscar los autos de determinada persona</a>
        </div>
    </div>
</body>
</html>