<?php
include_once "../../../Control/Ej3/Usuarios.php";
   
    if ($_POST){
        $datosLoggeo['usuario'] = $_POST['usuario'];
        $datosLoggeo['clave'] = $_POST['contra'];
        $usuarios1 = new Usuarios();
        if ($usuarios1->verificarCredenciales($datosLoggeo['usuario'],$datosLoggeo['clave'])){
            echo "<h2> Bienvenido de vuelta, ". $datosLoggeo['usuario'] . "<h2>";
        } else {
            echo "<h2> Los datos no coinciden con nuestra base de datos</h2>";
        }
    }
    
?>