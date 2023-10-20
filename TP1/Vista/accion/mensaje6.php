<?php
$tituloPagina = "TP1-Mensaje ejercicio 6";
include_once './../../../configuracionProyecto.php';
include_once './../estructura/header.php';
include_once '../../Control/persona6.php';
if ($_POST) {
    $nombre = $_POST['nombre-usuario'];
    $apellido = $_POST['apellido-usuario'];
    $edad = $_POST['edad-usuario'];
    $direccion = $_POST['direccion-usuario'];
    $estudios = $_REQUEST['radio'];
    $genero = $_POST['genero-usuario'];
    $cantDeportes = 0;
    if (isset($_POST['deporte'])) {
        $practicoDeportes = $_POST['deporte'];
        foreach ($practicoDeportes as $practicoDeportes => $value) {
            if ($value === "on") {
                $cantDeportes++;
            }
        }
    }
    $persona = new Persona($nombre, $apellido, $edad, $direccion, $estudios, $genero, $cantDeportes);
    $mensaje = $persona->saludo();
} else {
    $mensaje = "No se ha enviado nada.";
}
?>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <?php
            echo $mensaje;
            ?>
        </div>
    </div>
    <?php include_once '../../../vista/estructura/footer.php'; ?>