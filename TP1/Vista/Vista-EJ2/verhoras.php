<?php
    include_once '../../../menu-paginas.php';

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
</head>
<body>
    <?php
        echo $salida;
    ?>
</body>
</html>