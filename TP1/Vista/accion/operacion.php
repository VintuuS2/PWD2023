<?php
include_once '../../../TP4/configuracion.php';
include_once '../estructura/header.php';
include_once '../../Control/matematicas.php';
if ($_GET) {
    $primerNumero = $_GET['primer-numero'];
    $segundoNumero = $_GET['segundo-numero'];
    $operacion = $_GET['operacion'];
    $matematicas = new Matematicas();
    $resultado = $matematicas->realizarOperacion($primerNumero, $segundoNumero, $operacion);
    $mensaje = "El resultado de " . $primerNumero . " " . $operacion . " " . $segundoNumero . " es " . $resultado;
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

<?php include_once '../estructura/footer.php'; ?>