<?php
$tituloPagina = "TP1-Mensaje ejercicio 4";
include_once './../../../configuracionProyecto.php';
include_once './../estructura/header.php';
include_once '../../Control/persona4.php';
if ($_GET) {
    $nombre = $_GET['nombre-usuario'];
    $apellido = $_GET['apellido-usuario'];
    $edad = $_GET['edad-usuario'];
    $direccion = $_GET['direccion-usuario'];
    $persona = new Persona($nombre, $apellido, $edad, $direccion);
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