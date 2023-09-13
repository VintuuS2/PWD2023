<?php
include_once '../../configuracion.php';
include_once '../../../navbar.php';
$mensaje = "";
if ($_POST) {
    $personas = new AbmPersona();
    $seModifico = false;

    if ($personas->modificacion($_POST)) {
        $dni = $_POST['NroDni'];
        $mensaje .= "Modificacion exitosa";
        $seModifico = true;
    } else {
        $mensaje .= "No se puede realizar las modificaciones";
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
                "<div class=contenedor>
                    <h2>Estos son los datos de la Persona con el DNI N°" . $dni . ":</h2>
                        <table border= solid 1px class='table'>
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
                        </table>
                </div>";
        } else {
            $mensaje .= "<h3>No hay ninguna persona con el DNI N°" . $dniPersona . " en la base de datos.</h3>";
        }
    } else {
        $mensaje .=  "<h2>No se ha recibido ningún número de documento</h2>";
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
        <?php
        echo $mensaje;
        ?>
    </div>
    <div class="p-2 d-flex justify-content-center align-items-center">
        <a class="btn btn-primary" role="button" href="../Vista/listarPersonas.php">Ver lista de personas</a>
    </div>
    </div>
</body>

</html>