<?php
include_once "../../configuracion.php";

$datos = data_submitted();

$unaSession = new Session();
if (isset($datos['email-input']) && isset($datos['password-input'])){
    $email = $datos['email-input'];
    $pass = md5($datos['password-input']);
    if ($unaSession->iniciar($email, $pass) && $unaSession->validar()){
        header('Location: '.$urlRoot."Vista/index.php");
    } else {
        header('Location: '.$urlRoot."Vista/Login.php");
    }
}
?>