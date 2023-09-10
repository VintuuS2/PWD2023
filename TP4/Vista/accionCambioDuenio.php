<?php
include_once '../menuTP4.php';
include_once '../configuracion.php';
if ($_GET) {
    $patente = strtoupper($_GET['patente-cambio']);
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
            $AutoElegido = $arrayAutos[$i];
        }
        $i++;
    }
    if (!$encontro) {
        $mensaje = "<h2>No hay ningún vehiculo con la patente '" . $patente . "' en la base de datos.</h2>";
    }
} else {
    $mensaje = "<h2>No se ha recibido ninguna patente.</h2>";
}
if ($encontro) {
    $dniDuenio = strtoupper($_GET['dni-cambio']);
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
        $AutoElegido->setObjDuenio($arrayPersonas[$i-1]);
        $AutoElegido->modificar();
        $controlAuto->alta($_GET);
        $mensaje2 = "<h2>Estos son los datos del vehiculo con la patente que ha ingresado pero con el duenio actualizado:</h2>
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
    }
    else {
        $mensaje2 = "<h2>No hay ninguna persona con el DNI N°" . $dniDuenio . " en la base de datos.</h2>";
    }
}
else {
    $mensaje = "<h2>No se ha recibido ningún número de documento</h2>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Ver auto</title>
</head>
<body>
    <div class="w-50 d-flex" style="margin: auto; margin-top:15%; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
        <?php
        echo $mensaje;
        echo $mensaje2;
        ?>
        <button class="btn btn-primary" style="padding: 0;"><a href='buscarAuto.php' class="link-light" style="padding: 12px; font-size:1.2em;">Volver atrás</a></button>
    </div>
</body>
</html>