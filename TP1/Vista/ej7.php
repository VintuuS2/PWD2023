<?php
include_once '../../configuracionProyecto.php';
include_once './estructura/header.php';
?>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <form id="form" action="./accion/operacion.php" method="get">
                <input type="number" name="primer-numero" id="primer-numero" placeholder="Primer número">
                <span id="span-primer"></span>
                <input type="number" name="segundo-numero" id="segundo-numero" placeholder="Segundo número">
                <span id="span-segundo"></span>
                <select name="operacion" id="operacion">
                    <option value="+">Suma</option>
                    <option value="-">Resta</option>
                    <option value="*">Multiplicación</option>
                </select>
                <input id="enviar" type="submit" value="Enviar">
            </form>
        </div>
    </div>

<?php include_once './estructura/footer.php'; ?>