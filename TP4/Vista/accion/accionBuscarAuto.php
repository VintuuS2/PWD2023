<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';
    $datos = data_submitted();
    if (isset($datos)){
    $patente = strtoupper($datos['patente-auto']);
    $controlAuto = new AbmAuto();
    $arrayAutos = $controlAuto->buscar(null);
    $i = 0;
    $encontro = false;
    while ($i < count($arrayAutos) && !$encontro) {
        if ($arrayAutos[$i]->getPatente() == $patente) {
            $mensaje = "<h2>Estos son los datos del vehiculo con la patente que ha ingresado:</h2>
                    <table border= solid 1px class='table text-center'>
                            <thead class='thead-dark table-dark' >
                                <th>Patente</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Documento del dueño</th>
                            </thead>
                            <tr>
                                <td>".$arrayAutos[$i]->getPatente()."</td>
                                <td>".$arrayAutos[$i]->getMarca()."</td>
                                <td>".$arrayAutos[$i]->getModelo()."</td>
                                <td>".$arrayAutos[$i]->getObjDuenio()->getNroDni()."</td>
                            </tr>"."
                    </table>";
            $encontro = true;
        }
        $i++;
    }
    if (!$encontro) {
        $mensaje = "<h2>No hay ningún vehiculo con la patente '" . $patente . "' en la base de datos.</h2>";
    }
} else {
    $mensaje = "<h2>No se ha recibido ninguna patente.</h2>";
}
?>
    <div class="vh-100 w-100 d-flex">
        <div class="d-flex m-auto flex-wrap flex-sm-column align-items-center w-75">
            <?php
            echo $mensaje;
            ?>
            <a href='../buscarAuto.php' class="btn btn-primary link-light px-3">Volver atrás</a>
        </div>
    </div>
<?php include_once '../estructura/footer.php'; ?>