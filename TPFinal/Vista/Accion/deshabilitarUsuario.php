<?php
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/header.php";
include_once "../Estructura/ultimoNav.php";
$datos = data_submitted();

if (isset($datos['idusuario'])) {
    $controlUsuario = new AbmUsuario;
    $usuarioBuscado = $controlUsuario->buscar('idusuario');
    if ($controlUsuario->deshabilitar($datos)) {
        $mensaje = "Se ha deshabilitado al usuario correctamente.";
    } else {
        $mensaje = "ERROR: No se ha podido deshabilitar al usuario.";
    }
} else {
    $mensaje = "ERROR: No se han recibido datos, por favor vuelva atras y rellene el formulario.";
}


?>