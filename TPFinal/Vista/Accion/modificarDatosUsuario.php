<?php
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/header.php";
include_once "../Estructura/ultimoNav.php";
$datos = data_submitted();
// Si me da el tiempo lo hago de forma mas correcta, no deberia de settear el null aca
$datos['usdeshabilitado'] = null;
if (isset($datos['idusuario']) && isset($datos['uspass']) && isset($datos['usmail'])) {
    $controlUsuario = new AbmUsuario;
    if ($controlUsuario->modificacion($datos)) {
        $mensaje = "Se ha modificado al usuario correctamente.";
    }
}
header('Location: ' . $urlRoot . "Vista/Cliente/configuracionUsuario.php");


?>