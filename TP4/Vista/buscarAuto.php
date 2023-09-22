<?php
include_once './estructura/header.php';
?>
    <div class="vh-100 row ">
        <form action="accion/accionBuscarAuto.php" method="post" class="d-flex justify-content-center align-items-center">
            <div class="d-flex row align-items-lg-end flex-column bg-dark p-4 rounded w-50" style="min-width: 300px;">
                <div class="form-group text-center">
                    <label for="patente-auto" class="text-primary fs-4 mb-2">¿Cuál es la patente del vehículo del que desea ver los datos?</label>
                    <div class="input-group-text w-10" id="input-patente-auto">
                        <i class="fa fa-car mr-2"></i>
                        <input type="text" class="form-control" maxlength="7" id="patente-auto" name="patente-auto" placeholder="Ejemplo: KJL 357">
                    </div>
                    <div class="invalid-feedback formatoCorrecto" style="font-size: 1.2em; margin-bottom:-10px;">El formato debe ser "ABC 123".</div>
                    <div class="invalid-feedback caracteresCorrectos" style="font-size: 1.2em; margin-bottom:-13px;">Deben ser 7 carácteres.</div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm" style="margin-top:15px; font-size:1.1em;">Enviar</button>
            </div>
        </form>
    </div>
<?php
include_once './estructura/footer.php';
?>