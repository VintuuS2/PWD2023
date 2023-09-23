<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';
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
        $mensaje = "<h2>Modificación exitosa</h2>
                <h3>Estos son los datos del vehiculo con la patente que ha ingresado:</h3>
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
            $mensaje .= "<h3>Estos son los datos del vehiculo con la patente que ha ingresado pero con el dueño actualizado:</h3>
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
    <div class="vh-100 w-100 row">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <?php
            echo $mensaje;
            ?>
            <button class="btn btn-primary" style="padding: 0;"><a href='../CambioDuenio.php' class="link-light" style="padding: 12px; font-size:1.3em;">Volver atrás</a></button>
        </div>
    </div>
<?php include_once '../estructura/footer.php'; ?>