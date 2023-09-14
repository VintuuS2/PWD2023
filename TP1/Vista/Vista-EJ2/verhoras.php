<?php
include_once '../../../TP4/configuracion.php';
include_once '../../../navbar.php';
include_once '../../Control/Control-EJ2/pwd.php';
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
<!DOCTYPE html>

<head>
    <title>Ver horas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../../TP4/Vista/css/style.css">
</head>

<body>

    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <?php
            echo $salida;
            ?>
        </div>
    </div>

</body>

</html>