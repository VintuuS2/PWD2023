<?php
include_once '../../configuracion.php';
include_once '../../../configuracionProyecto.php';
include_once '../estructura/header.php';
$datos = data_submitted();
if (isset($datos['dni-duenio'])) {
    $dniDuenio = $datos['dni-duenio'];
    $controlPersona = new AbmPersona();
    $arrayPersonas = $controlPersona->buscar(null);
    $i = 0;
    $encontroPersona = false;
    // While que verifica y busca a la persona con el número de dni
    while ($i < count($arrayPersonas) && !$encontroPersona) {
        if ($arrayPersonas[$i]->getNroDni() == $dniDuenio) {
            // Cuando se encontro a la persona, busca los autos de esa persona
            $controlAuto = new AbmAuto();
            $arrayAutos = $controlAuto->buscar(null);
            // While que busca si el dueño tiene al menos un auto
            $j = 0;
            $encontroUnAuto = false;
            while ($j < count($arrayAutos) && !$encontroUnAuto) {
                if ($arrayAutos[$j]->getObjDuenio()->getNroDni() == $dniDuenio) {
                    $encontroUnAuto = true;
                }
                $j++;
            }
            $encontroPersona = true;
        }
        $i++;
    }
    if ($encontroPersona) {
        if ($encontroUnAuto) {
            // Cuando se encontró a la persona y tiene al menos un vehiculo muestra los datos
            $mensaje = "<h2>Estos son los datos de la Persona con el DNI N°" . $dniDuenio . ":</h2>
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
                    </table>";
            $mensaje .= "<h2>Estos son los datos de los vehiculos de la persona:</h2>
                        <table border= solid 1px class='table'>
                            <thead class='thead-dark table-dark' >
                                <th>Patente</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                            </thead>";
            foreach ($arrayAutos as $unAuto) {
                if ($unAuto->getObjDuenio()->getNroDni() == $dniDuenio) {
                    $mensaje .= "<tr>
                                    <td>" . $unAuto->getPatente() . "</td>
                                    <td>" . $unAuto->getMarca() . "</td>
                                    <td>" . $unAuto->getModelo() . "</td>
                                </tr>";
                }
            }
            $mensaje .= "</table>";
        } else {
            // Cuando la persona no es dueña de ningún vehículo
            $mensaje = "<h2>Esta persona no es dueña de ningún vehiculo</h2>";
        }
    } else {
        $mensaje = "<h3>No hay ninguna persona con el DNI N°" . $dniDuenio . " en la base de datos.</h3>";
    }
} else {
    $mensaje = "<h2 class='text-center'>No se ha recibido ningún número de documento</h2>";
}
?>
<div class="vh-100 row w-100 align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris">
        <div class="col-md-12">
            <?php
            echo $mensaje;
            ?>
            <div class="container d-flex justify-content-center">
                <a href='../autosPersona.php' class="btn btn-primary link-light px-2 fs-5 mt-3">Volver atrás</a>
            </div>
        </div>
    </div>
</div>
<?php include_once '../estructura/footer.php'; ?>