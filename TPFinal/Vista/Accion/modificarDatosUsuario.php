<?php
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
$datos = data_submitted();
// Si me da el tiempo lo hago de forma mas correcta, no deberia de settear el null aca
if (isset($datos['usnombre']) && isset($datos['uspass']) && isset($datos['usmail'])) {
    if ($datos['nueva_uspass'] !== "null" || $datos['confirmar_nueva_uspass'] !== "null") {
        $datosRecibidos['uspass'] = md5($datos['nueva_uspass']);
    } else {
        $datosRecibidos['uspass'] = md5($datos['uspass']);
    }
    $datosRecibidos['idusuario'] = $_SESSION['idusuario'];
    $datosRecibidos['usnombre'] = $datos['usnombre'];
    $datosRecibidos['usmail'] = $datos['usmail'];
    $datosRecibidos['usdeshabilitado'] = null;
    //print_r($datosRecibidos);
    //$datosRecibidos['usdeshabilitado'] = null;
    //echo "<br>".md5($datos['uspass'])."<br>";
    //echo strlen(md5($datos['uspass']));

    /**FALTA AGREGAR QUE CUANDO NO SE MODIFIQUE INDIQUE AL USUARIO QUE
     * LOS DATOS INGRESADOS SON IDENTICOS A LOS QUE YA ESTAN EN LA BASE DE DATOS
     */
    $controlUsuario = new AbmUsuario;
    if ($controlUsuario->modificacion($datosRecibidos)) {
        //echo "<br>pasó el true";
        //header('Location: ' . $urlRoot . "Vista/Cliente/configuracionUsuario.php");
    } else {
        //echo "<br>No entró";
    }
}
//header('Location: ' . $urlRoot . "Vista/Cliente/configuracionUsuario.php");


?>