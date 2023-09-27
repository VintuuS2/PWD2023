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
                    <table border= solid 1px class='table'>
                            <thead class='thead-dark table-dark' >
                                <th>Patente</th>
                                <th>Marca</th>
                                <th>Modelo</th>
                                <th>Dni del dueño</th>
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
    <div class="vh-100 w-100 row">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <?php
            echo $mensaje;
            ?>
            <button class="btn btn-primary" style="padding: 0;"><a href='../buscarAuto.php' class="link-light" style="padding: 12px; font-size:1.2em;">Volver atrás</a></button>
        </div>
    </div>
<?php include_once '../estructura/footer.php'; ?>