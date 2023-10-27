<?php

$PROYECTO ='/PWD2023/TP5/';

//variable que almacena el directorio del proyecto
$ROOT = $_SERVER['DOCUMENT_ROOT'] . $PROYECTO;

include_once($ROOT.'./util/funciones.php');

$_SESSION['ROOT']=$ROOT;

?>