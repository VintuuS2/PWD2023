<?php
include_once "../../configuracion.php";

$datos = data_submitted();

echo "Entró en me quedé afuera";
print_r($datos);
$unaSession = new Session();
if (isset($datos['user-input']) && isset($datos['password-input'])){
    $usuario = $datos['user-input'];
    $pass = $datos['password-input'];
    echo "Entró en primer if";

    if ($unaSession->iniciar($usuario, $pass)){
        echo "Entró en true";
        header('Location: '.$urlRoot."Vista/paginaSegura.php");
    } else {
        header('Location: '.$urlRoot."Vista/Login.php");
        echo "Entró en false";
    }
}
?>