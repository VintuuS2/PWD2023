<?php
include_once '../../configuracionProyecto.php';
include_once './estructura/header.php';
?>
    <div class="body8 contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <div class="contenedor-form">
                <h2 class="h28">Calcular precio de entradas Cine cinem@s</h2>
                <form id="form" action="./accion/verPrecio.php" method="post">
                    <label for="edad-usuario">Edad: </label><input type="number" name="edad-usuario" id="edad-usuario"><span id="span-edad"></span><br>
                    <label for="estudiante-usuario">¿Sos estudiante? </label><br>
                    Si<input type="radio" name="estudiante-usuario" value="si" checked><br>
                    No<input type="radio" name="estudiante-usuario" value="no"><br>
                    <input type="submit" style="float: left; margin-right: 10px">
                    <button type="reset" style="float: left;">Reestablecer</button>
                </form>
            </div>
        </div>
    </div>


<?php include_once './estructura/footer.php'; ?>