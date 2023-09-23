<?php
include_once '../../TP4/configuracion.php';
include_once './estructura/header.php';
?>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <form id="form" name="form" action="./accion/mensaje.php" method="post">
                <div class="div-input">
                    <label for="nombre-usuario">Nombre: </label><input type="text" name="nombre-usuario" id="nombre-usuario">
                    <span id="span-nombre"></span>
                </div>
                <div class="div-input">
                    <label for="apellido-usuario">Apellido: </label><input type="text" name="apellido-usuario" id="apellido-usuario">
                    <span id="span-apellido"></span>
                </div>
                <div class="div-input">
                    <label for="edad-usuario">Edad: </label><input type="number" name="edad-usuario" id="edad-usuario">
                    <span id="span-edad"></span>
                </div>
                <div class="div-input">
                    <label for="direccion-usuario">Dirección: </label><input type="text" name="direccion-usuario" id="direccion-usuario">
                    <span id="span-direccion"></span>
                </div>
                <input id="enviar" type="submit" value="Enviar datos">
            </form>
        </div>
    </div>

<?php include_once './estructura/footer.php'; ?>