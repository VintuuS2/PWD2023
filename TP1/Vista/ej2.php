<?php
$tituloPagina = "TP1-Ejercicio 2";
include_once '../../configuracionProyecto.php';
include_once './estructura/header.php';
?>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <h4>¿Cuál es la cantidad de horas que tenés de Programación web dinámica cada dia de la semana?</h4>
            <form id="form" name="form" method="get" action="./accion/verhoras.php">
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
        </div>
    </div>

<?php include_once './estructura/footer.php'; ?>