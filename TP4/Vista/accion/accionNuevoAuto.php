<?php
include_once '../../configuracion.php';
include_once '../../../navbar.php';
$mensaje = "No se recibieron datos";
if ($_POST){
    $dni = $_POST['DniDuenio'];

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
        $patente = $_POST['patente'];
        $autos = new AbmAuto();
        $listaAutos = $autos->buscar(null);
        $existe = false;
        $i = 0;
        while (!$existe && $i<count($listaAutos)){
            if ($listaAutos[$i]->getPatente() == $patente){
                $existe = true;
            }
            $i++;
        }
        if ($existe){
            $mensaje = "Ya hay un auto con esta patente";
        } else {
            $respuesta = $autos->alta($_POST);
            if ($respuesta){
                $mensaje = "El auto se cargó con éxito";
            } else {
                $mensaje = "Hubo un error al cargar el auto.";
            }
        }
    } else {
        $mensaje = "No existe una persona con ese Nro de DNI";
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
                        echo "<h2>".$mensaje."</h2>";
                        ?>
                    </div>
                    <div class="w-100"></div>
                    <div class="p-2 d-flex justify-content-center align-items-center">
                        <a class="btn btn-primary" role="button" href="../../Vista/verAutos.php">Ver lista de autos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>