<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';
$mensaje = "";
$datos = data_submitted();
if (isset($datos['patente-cambio'])) {
    $patente = strtoupper($datos['patente-cambio']);
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

    $dniDuenio = $datos['dni-cambio'];
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
        if ($datos['dni-cambio'] != $AutoElegido->getObjDuenio()->getNroDni()) {
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
                                <td>" . $AutoElegido->getPatente() . "</td>
                                <td>" . $AutoElegido->getMarca() . "</td>
                                <td>" . $AutoElegido->getModelo() . "</td>
                                <td>" . $AutoElegido->getObjDuenio()->getNroDni() . "</td>
                            </tr>" . "
                    </table>";
            $AutoElegido->setObjDuenio($arrayPersonas[$j - 1]);
            $AutoElegido->modificar();
            $controlAuto->alta($datos);
            $mensaje .= "<h3>Estos son los datos del vehiculo con la patente que ha ingresado pero con el dueño actualizado:</h3>
                        <table border= solid 1px class='table'>
                                <thead class='thead-dark table-dark' >
                                    <th>Patente</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Dni del dueño</th>
                                </thead>
                                <tr>
                                    <td>" . $AutoElegido->getPatente() . "</td>
                                    <td>" . $AutoElegido->getMarca() . "</td>
                                    <td>" . $AutoElegido->getModelo() . "</td>
                                    <td>" . $AutoElegido->getObjDuenio()->getNroDni() . "</td>
                                </tr>" . "
                        </table>";
        } else {
            $mensaje = "<h2>No puedes modificar el dni del duenio con el mismo dni</h2>";
        }
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
    $mensaje = "<h2 class='text-center'>No se ha recibido ningún dato</h2>";
}
?>
<div class="vh-100 row w-100 align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris ">
        <div class="col-md-12">
            <?php
            echo $mensaje;
            ?>
            <div class="container d-flex justify-content-center">
                <a href='../CambioDuenio.php' class="btn btn-primary link-light fs-5 px-3 mt-3">Volver atrás</a>
            </div>
        </div>
    </div>
</div>
<?php include_once '../estructura/footer.php'; ?>