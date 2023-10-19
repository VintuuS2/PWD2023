<?php
$tituloPagina = "TP1-Precio entrada cine";
include_once '../../../TP4/configuracion.php';
include_once '../estructura/header.php';
include_once '../../Control/cine.php';
if ($_POST) {
    $edadUsuario = $_POST['edad-usuario'];
    $esEstudiante = $_POST['estudiante-usuario'];
    $cine = new Cine();
    $precio = $cine->calcularEntrada($edadUsuario, $esEstudiante);
    $mensaje = "El precio de su entrada es de $" . $precio;
} else {
    $mensaje = "No se recibieron datos";
}
?>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <div class="div-mensaje">
                <?php
                echo $mensaje;
                ?>
            </div>
        </div>
    </div>

<?php include_once '../estructura/footer.php'; ?>