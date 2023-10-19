<?php
$tituloPagina = "TP1-Ejercicio 1";
include_once '../../configuracionProyecto.php';
include_once './estructura/header.php';
?>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <form id="form" name="form" method="get" action="./accion/vernumero.php">
                Número: <input type="number" name="numero_form" id="numero_form"><br>
                <span id="span"></span><br>
                <input id="enviar" name="enviar" type="submit" class="btn btn-primary">
            </form>
            <a href="vernumero.php">Ver respuesta</a>
        </div>
    </div>
<?php include_once './estructura/footer.php'; ?>