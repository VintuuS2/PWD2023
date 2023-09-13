<?php
include_once '../../configuracion.php';
include_once '../../../navbar.php';
$mensaje = "";
if ($_GET) {

    $patente = strtoupper($_GET['patente-cambio']);
    $controlAuto = new AbmAuto();
    $arrayAutos = $controlAuto->buscar(null);
    $i = 0;
    $encontroPatente = false;
    // Busca que haya un vehículo guardado con la patente ingresada
    while ($i < count($arrayAutos) && !$encontroPatente) {
        if ($arrayAutos[$i]->getPatente() == $patente) {
            $encontroPatente = true;
            $AutoElegido = $arrayAutos[$i];
        }
        $i++;
    }

    $dniDuenio = $_GET['dni-cambio'];
    $controlPersona = new AbmPersona();
    $arrayPersonas = $controlPersona->buscar(null);
    $j = 0;
    $encontroPersona = false;
    // Busca que haya una persona guardada con el dni ingresado
    while ($j < count($arrayPersonas) && !$encontroPersona) {
        if ($arrayPersonas[$j]->getNroDni() == $dniDuenio) {
            $encontroPersona = true;
        }
        $j++;
    }
    // Si todo es correcto, muestra los datos actuales del vehiculo, modifica el dueño del vehiculo y vuelve a mostrar los datos del vehículo pero actualizados
    if ($encontroPatente && $encontroPersona) {
        $mensaje = "<h2>Estos son los datos del vehiculo con la patente que ha ingresado:</h2>
                    <table border= solid 1px class='table'>
                            <thead class='thead-dark table-dark' >
                                <th>Patente</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Dni del dueño</th>
                            </thead>
                            <tr>
                                <td>".$AutoElegido->getPatente()."</td>
                                <td>".$AutoElegido->getMarca()."</td>
                                <td>".$AutoElegido->getModelo()."</td>
                                <td>".$AutoElegido->getObjDuenio()->getNroDni()."</td>
                            </tr>"."
                    </table>";
            $AutoElegido->setObjDuenio($arrayPersonas[$j-1]);
            $AutoElegido->modificar();
            $controlAuto->alta($_GET);
            $mensaje .= "<h2>Estos son los datos del vehiculo con la patente que ha ingresado pero con el dueño actualizado:</h2>
                        <table border= solid 1px class='table'>
                                <thead class='thead-dark table-dark' >
                                    <th>Patente</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Dni del dueño</th>
                                </thead>
                                <tr>
                                    <td>".$AutoElegido->getPatente()."</td>
                                    <td>".$AutoElegido->getMarca()."</td>
                                    <td>".$AutoElegido->getModelo()."</td>
                                    <td>".$AutoElegido->getObjDuenio()->getNroDni()."</td>
                                </tr>"."
                        </table>";
    } else {
        $mensaje = "<h2>No se pudo realizar la operación</h2>";
        // Muestra los mensajes de porqué no se pudo realizar la operación
        if (!$encontroPatente) {
            $mensaje .= "<h3>No hay ningún vehiculo con la patente '" . $patente . "' en la base de datos.</h3>";
        }
        if (!$encontroPersona) {
            $mensaje .= "<h3>No hay ninguna persona con el DNI N°" . $dniDuenio . " en la base de datos.</h3>";
        }
    }
} else {
    $mensaje = "<h2>No se ha recibido ningún dato</h2>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Ver auto</title>
</head>
<body>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <?php
            echo $mensaje;
            ?>
            <button class="btn btn-primary" style="padding: 0;"><a href='../CambioDuenio.php' class="link-light" style="padding: 12px; font-size:1.3em;">Volver atrás</a></button>
        </div>
    </div>
</body>
</html>