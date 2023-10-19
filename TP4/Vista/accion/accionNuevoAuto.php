<?php
$tituloPagina = "TP4-Vehiculo agregado";
include_once '../../configuracion.php';
include_once '../../../configuracionProyecto.php';
include_once '../estructura/header.php';
$mensaje = "No se recibieron datos";
$datos = data_submitted();
if (isset($datos['DniDuenio'])) {
    $dni = $datos['DniDuenio'];
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
        $patente = strtoupper($datos['Patente']);
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
            $respuesta = $autos->alta($datos);
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
<div class="vh-100 row w-100 align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris ">
        <div class="col-md-12">
            <div class="p-2 text-center">
                <?php
                echo "<h2>" . $mensaje . "</h2>";
                ?>
            </div>
            <div class="w-100"></div>
            <div class="row justify-content-center text-center mt-3 m-auto">
                <div class="col-md-8">
                    <div class="d-flex  align-content justify-content-center">
                        <a class="btn btn-primary mx-3 fs-5" role="button" href="../nuevoAuto.php">Volver</a>
                        <a class="btn btn-primary mx-3 fs-5" role="button" href="../../Vista/verAutos.php">Ver lista de autos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once '../estructura/footer.php'; ?>