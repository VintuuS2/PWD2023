<?php
include_once '../configuracion.php';
$session = new Session;

$mensaje = $session->getRoles();

print_r($mensaje);

?>