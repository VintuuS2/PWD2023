<?php
$tituloPagina = "TP1-Mensaje ejercicio 3";
include_once './../../../configuracionProyecto.php';
include_once './../estructura/header.php';
include_once '../../Control/persona.php';

if ($_POST) {
    $nombre = $_POST['nombre-usuario'];
    $apellido = $_POST['apellido-usuario'];
    $edad = $_POST['edad-usuario'];
    $direccion = $_POST['direccion-usuario'];
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