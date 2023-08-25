<?php
include_once '../../../menu-paginas.php';
?>
<!DOCTYPE html>
<head>
    <title>Ejercicio 2, TP1</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="../../../TP2/Util/TP1/Util-EJ2/script.js"></script>
</head>
<body>
    <h4>¿Cuál es la cantidad de horas que tenés de Programación web dinámica cada dia de la semana?</h4>
    <form id="form" name="form" method="get" action="verhoras.php">
        Lunes: <input type="number" name="lunes-form" id="lunes-form"><br>
        <span id="span-lunes"></span><br>
        Martes: <input type="number" name="martes-form" id="martes-form"><br>
        <span id="span-martes"></span><br>
        Miercoles: <input type="number" name="miercoles-form" id="miercoles-form"><br>
        <span id="span-miercoles"></span><br>
        Jueves: <input type="number" name="jueves-form" id="jueves-form"><br>
        <span id="span-jueves"></span><br>
        Viernes: <input type="number" name="viernes-form" id="viernes-form"><br>
        <span id="span-viernes"></span><br>
        <input id="enviar" type="submit">
    </form>
</body>
</html>