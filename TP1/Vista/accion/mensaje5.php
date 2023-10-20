<?php
$tituloPagina = "TP1-Mensaje ejercicio 5";
include_once './../../../configuracionProyecto.php';
include_once './../estructura/header.php';
include_once '../../Control/persona5.php';
if ($_POST) {
    $nombre = $_POST['nombre-usuario'];
    $apellido = $_POST['apellido-usuario'];
    $edad = $_POST['edad-usuario'];
    $direccion = $_POST['direccion-usuario'];
    $estudios = $_REQUEST['radio'];
    $genero = $_POST['genero-usuario'];
    $persona = new Persona($nombre, $apellido, $edad, $direccion, $estudios, $genero);
    $mensaje = $persona->saludo();
} else {
    $mensaje = "No se ha enviado nada";
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