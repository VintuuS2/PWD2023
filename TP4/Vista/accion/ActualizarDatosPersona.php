<?php
include_once '../../configuracion.php';
include_once '../../../navbar.php';
$mensaje = "";
if ($_POST) {
    $personas = new AbmPersona();
    $seModifico = false;
    if ($personas->modificacion($_POST)) {
        $dni = $_POST['NroDni'];
        $mensaje .= "<h2>Modificación exitosa</h2>";
        $seModifico = true;
    } else {
        $mensaje .= "<h2>No se pudieron realizar las modificaciones</h2>";
    }
    if ($seModifico) {
        $arrayPersonas = $personas->buscar(null);
        $i = 0;
        $encontroPersona = false;
        // While que verifica y busca a la persona con el número de dni
        while ($i < count($arrayPersonas) && !$encontroPersona) {
            if ($arrayPersonas[$i]->getNroDni() == $dni) {
                $encontroPersona = true;
            }
            $i++;
        }
        if ($encontroPersona) {
            //Cuando se encuentra una persona
            $mensaje .=
                "<h2>Estos son los nuevos datos de la persona con el DNI N°" . $dni . ":</h2>
                        <table border= solid 1px class='table' class='mt-5'>
                                <thead class='table-dark' >
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                    <th>Fecha de Nacimiento</th>
                                    <th>Telefono</th>
                                    <th>Domicilio</th>
                                </thead>
                                <tr>
                                    <td>" . $arrayPersonas[$i - 1]->getNombre() . "</td>
                                    <td>" . $arrayPersonas[$i - 1]->getApellido() . "</td>
                                    <td>" . $arrayPersonas[$i - 1]->getFechaNac() . "</td>
                                    <td>" . $arrayPersonas[$i - 1]->getTelefono() . "</td>
                                    <td>" . $arrayPersonas[$i - 1]->getDomicilio() . "</td>
                                </tr>" . "
                        </table>";
        } else {
            $mensaje .= "<h3>No hay ninguna persona con el DNI N°" . $dniPersona . " en la base de datos.</h3>";
        }
    }
}
else {
    $mensaje .= "<h2>No se han recibido datos</h2>";
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir persona</title>
</head>

<body>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
        <?php
        echo $mensaje;
        ?>
        </div>
    </div>
</body>

</html>