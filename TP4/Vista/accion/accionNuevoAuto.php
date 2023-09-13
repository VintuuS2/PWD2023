<?php
include_once '../../configuracion.php';
include_once '../../../navbar.php';
$mensaje = "No se recibieron datos";
if ($_POST) {
    $dni = $_POST['DniDuenio'];

    $personas = new AbmPersona();
    $listaPersonas = $personas->buscar(null);
    $existePersona = false;
    $i = 0;
    while (!$existePersona && $i < count($listaPersonas)) {
        if ($listaPersonas[$i]->getNroDni() == $dni) {
            $existePersona = true;
        }
        $i++;
    }
    if ($existePersona) {
        $patente = strtoupper($_POST['Patente']);
        $autos = new AbmAuto();
        $listaAutos = $autos->buscar(null);
        $existeAuto = false;
        $i = 0;
        while (!$existeAuto && $i < count($listaAutos)) {
            if ($listaAutos[$i]->getPatente() == $patente) {
                $existeAuto = true;
            }
            $i++;
        }
        if ($existeAuto) {
            $mensaje = "Ya hay un vehículo con la patente " . $patente;
        } else {
            $respuesta = $autos->alta($_POST);
            if ($respuesta) {
                $mensaje = "El auto se cargó con éxito";
            } else {
                $mensaje = "Hubo un error al cargar el auto.";
            }
        }
    } else {
        $mensaje = "No existe una persona con ese número de DNI";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Nuevo auto</title>
</head>

<body>
    <div class="contenedor">
        <div class="container mt-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 p-5">
                    <div class="p-2 text-center">
                        <?php
                        echo "<h2>" . $mensaje . "</h2>";
                        ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="row justify-content-center text-center mt-3" style="margin: auto;">
                        <div class="col-md-8">
                            <div class="d-flex  align-content justify-content-around">
                                <a class="btn btn-primary" role="button" href="../nuevoAuto.php">Volver</a>
                                <a class="btn btn-primary" role="button" href="../../Vista/verAutos.php">Ver lista de autos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>