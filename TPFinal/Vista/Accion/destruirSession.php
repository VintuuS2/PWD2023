<?php

include_once "../../configuracion.php";

$session->cerrar();

header('Location: '.$urlRoot."Vista/Index.php");

?>