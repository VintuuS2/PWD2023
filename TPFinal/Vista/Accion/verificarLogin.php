<?php
include_once "../../configuracion.php";

$datos = data_submitted();

$unaSession = new Session();
if (isset($datos['user-input']) && isset($datos['password-input'])){
    $usuario = $datos['user-input'];
    $pass = $datos['password-input'];

    if ($unaSession->iniciar($usuario, $pass) && $unaSession->validar()){
        header('Location: '.$urlRoot."Vista/index.php");
    } else {
        header('Location: '.$urlRoot."Vista/Login.php");
    }
}
?>