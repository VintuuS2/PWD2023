<?php
include_once '../menuTP4.php';
include_once '../Control/AbmAuto.php';
if ($_GET) {
    $dniDuenio = strtoupper($_GET['dni-duenio']);
    $controlPersona = new AbmPersona();
    $arrayPersonas = $controlPersona->buscar(null);
    $i = 0;
    $encontro = false;
    while ($i < count($arrayPersonas) && !$encontro) {
        if ($arrayPersonas[$i]->getNroDni() == $dniDuenio) {
            $mensaje = "<h2>Estos son los datos de la Persona con el DNI que ha ingresado:</h2>
                    <table border= solid 1px class='table'>
                            <thead class='thead-dark table-dark' >
                                <th>Apellido</th>
                                <th>Persona</th>
                                <th>DNI</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Telefono</th>
                                <th>Domicilio</th>
                            </thead>
                            <tr>
                                <td>".$arrayPersonas[$i]->getApellido()."</td>
                                <td>".$arrayPersonas[$i]->getNombre()."</td>
                                <td>".$arrayPersonas[$i]->getNroDni()."</td>
                                <td>".$arrayPersonas[$i]->getFechaNac()."</td>
                                <td>".$arrayPersonas[$i]->getTelefono()."</td>
                                <td>".$arrayPersonas[$i]->getDomicilio()."</td>
                            </tr>"."
                    </table>";
            $encontro = true;
        }
        $i++;
    }
    if (!$encontro) {
        $mensaje = "<h2>No hay ninguna persona con '" . $patente . "' en la base de datos.</h2>";
    }
} else {
    $mensaje = "<h2>No se ha recibido ninguna patente.</h2>";
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
        ?>
        <button class="btn btn-primary" style="padding: 0;"><a href='buscarAuto.php' class="link-light" style="padding: 12px; font-size:1.2em;">Volver atrás</a></button>
    </div>
</body>
</html>