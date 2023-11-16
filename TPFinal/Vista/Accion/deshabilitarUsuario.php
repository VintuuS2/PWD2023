<?php
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/ultimoNav.php";
$datos = data_submitted();

if (isset($datos['idusuario'])) {
    $controlUsuario = new AbmUsuario;
    $usuarioBuscado = $controlUsuario->buscar('idusuario');
    $controlUsuario->deshabilitar($datos);
} else {
    $mensaje = "ERROR: No se han recibido datos, por favor vuelva atras y rellene el formulario.";
}
header('Location: ' . $urlRoot . "Vista/Administrador/listarUsuariosAdministrador.php");

?>