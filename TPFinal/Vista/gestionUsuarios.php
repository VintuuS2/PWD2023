<?php
$tituloPagina = "TP5-Ver usuarios";
include_once "../../configuracionProyecto.php";
include_once "../configuracion.php";
include_once "./Estructura/header.php";

$objUsuario = new AbmUsuario();
$usuariosConRoles = $objUsuario->listarUsuarioRol(null);
print_r($usuariosConRoles);
?>
