<?php
$tituloPagina = "TP1-Ver horas totales";
include_once '../../../TP4/configuracion.php';
include_once '../estructura/header.php';
include_once '../../Control/pwd.php';
if ($_GET) {
    $diasLunes = $_GET['lunes-form'];
    $diasMartes = $_GET['martes-form'];
    $diasMiercoles = $_GET['miercoles-form'];
    $diasJueves = $_GET['jueves-form'];
    $diasViernes = $_GET['viernes-form'];
    $diasSemana = [$diasLunes, $diasMartes, $diasMiercoles, $diasJueves, $diasViernes];
    $pwd = new Pwd();
    $horasTotales = $pwd->sumarHoras($diasSemana);
    $salida = "Usted tiene " . $horasTotales . " horas semanales de Programación web dinámica.";
} else {
    $salida = "No se ha enviado nada";
}
?>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <?php
            echo $salida;
            ?>
        </div>
    </div>

<?php include_once '../estructura/footer.php'; ?>