<?php

include_once '../configuracion.php';

//$session = new Session;
//$session->validar();
//$session->updateRol();

print_r($_SESSION);

$rolsitos = $session->getRoles();

echo "<br>";
print_r($rolsitos);

?>