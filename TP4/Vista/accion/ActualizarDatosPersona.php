<?php
include_once '../../configuracion.php';
include_once '../../../configuracionProyecto.php';
include_once '../estructura/header.php';
$mensaje = "";
$datos = data_submitted();
if (isset($datos['NroDni'])) {
    $personas = new AbmPersona();
    $seModifico = false;
    if ($personas->modificacion($datos)) {
        $dni = $datos['NroDni'];
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
} else {
    $mensaje .= "<h2 class='text-center'>No se han recibido datos</h2>";
}

?>
<div class="vh-100 row w-100 align-items-center justify-content-center text-center">
    <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris ">
        <div class="col-md-12">
            <?php
            echo $mensaje;
            ?>
        </div>
    </div>
</div>
<?php include_once '../estructura/footer.php'; ?>