<?php

$PROYECTO ='/PWD2023/TPFinal/';

//variable que almacena el directorio del proyecto
$ROOT = $_SERVER['DOCUMENT_ROOT'] . $PROYECTO;

$_SESSION['ROOT']=$ROOT;

$urlRoot = "http://".$_SERVER['HTTP_HOST']."/PWD2023/TPFinal/";

include_once($ROOT.'./util/funciones.php');
include_once($ROOT.'./Vista/Menu/verMenu.php');
include_once($ROOT.'./Vista/Estructura/header.php');
include_once($ROOT.'./Vista/Estructura/ultimoNav.php');

?>