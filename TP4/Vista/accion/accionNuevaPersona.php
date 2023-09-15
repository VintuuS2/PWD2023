<?php
include_once '../../configuracion.php';
include_once '../../../navbar.php';
$mensaje = "No se recibieron datos";
if ($_POST){
    $dni = $_POST['NroDni'];

    $personas = new AbmPersona();
    $listaPersonas = $personas->buscar(null);
    $existe = false;
    $i=0;
    while (!$existe && $i<count($listaPersonas)) {
        if($listaPersonas[$i]->getNroDni()==$dni){
            $existe = true;
        }
        $i++;
    }
    if ($existe){
        $mensaje = "Ya hay una persona cargada con el documento N°" . $dni;
    } else {
        $respuesta = $personas->alta($_POST);
        if ($respuesta){
            $mensaje = "Se cargó exitosamente";
        } else {
            $mensaje = "Hubo un error al cargar la persona.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir persona</title>
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
                                <a class="btn btn-primary" role="button" href="../nuevaPersona.php">Volver</a>
                                <a class="btn btn-primary" role="button" href="../listarPersonas.php">Ver lista de personas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>