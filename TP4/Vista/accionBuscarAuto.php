<?php
include_once '../menuTP4.php';
include_once '../Control/AmbAuto.php';
if ($_GET) {
    $patente = $_GET['patente-auto'];
    $controlAuto = new AbmAuto();
    $controlAuto->buscar($_GET);
    echo $controlAuto;
} else {
    echo "<h2>No se ha recibido ninguna patente.</h2>";
}
?>