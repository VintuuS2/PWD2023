<?php
include_once '../../configuracion.php';
include_once '../estructura/header.php';
$mensaje = "No se recibieron datos";
$datos = data_submitted();
if (isset($datos['NroDni'])) {
    $dni = $datos['NroDni'];
    $personas = new AbmPersona();
    $listaPersonas = $personas->buscar(null);
    $existe = false;
    $i = 0;
    while (!$existe && $i < count($listaPersonas)) {
        if ($listaPersonas[$i]->getNroDni() == $dni) {
            $existe = true;
        }
        $i++;
    }
    if ($existe) {
        $mensaje = "Ya hay una persona cargada con el documento N°" . $dni;
    } else {
        $respuesta = $personas->alta($datos);
        if ($respuesta) {
            $mensaje = "Se cargó exitosamente";
        } else {
            $mensaje = "Hubo un error al cargar la persona.";
        }
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
            <div class="row justify-content-center text-center m-auto mt-3">
                <div class="col-md-8">
                    <div class="d-flex  align-content justify-content-center">
                        <a class="btn btn-primary mx-3 fs-5" role="button" href="../nuevaPersona.php">Volver</a>
                        <a class="btn btn-primary mx-3 fs-5" role="button" href="../listarPersonas.php">Ver lista de personas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once '../estructura/footer.php'; ?>