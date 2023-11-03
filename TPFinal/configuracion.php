<?php

$PROYECTO ='/PWD2023/TPFinal/';

//variable que almacena el directorio del proyecto
$ROOT = $_SERVER['DOCUMENT_ROOT'] . $PROYECTO;

include_once($ROOT.'./util/funciones.php');

$_SESSION['ROOT']=$ROOT;

$urlRoot = "http://".$_SERVER['HTTP_HOST']."/PWD2023/TPFinal/";

?>