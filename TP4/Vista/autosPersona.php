<?php
include_once '../configuracion.php';
include_once './estructura/header.php';
?>
    <div class="row vh-100 w-100">
        <form action="accion/accionBuscarAutosPersona.php" method="post" class="d-flex justify-content-center align-items-center">
            <div class="d-flex row align-items-lg-end flex-column bg-dark p-4 rounded w-50">
                <div class="form-group" style="text-align:center;">
                    <label for="dni-duenio" class="text-primary fs-4 mb-3">¿Cuál es el dni de la persona de la que desea ver sus vehículos?</label>
                    <div class="input-group-text" id="input-dni-duenio">
                        <i class="fa fa-user" style="width: 10%; margin-right:10px;"></i>
                        <input type="text" maxlength="8" class="form-control" id="dni-duenio" name="dni-duenio" placeholder="Ejemplo: 44041670">
                    </div>
                    <div class="invalid-feedback formatoCorrecto" style="font-size: 1.2em; margin-bottom:-10px;">Solo números (sin puntos).</div>
                    <div class="invalid-feedback caracteresCorrectos mt-2">Deben ser máximo 8 dígitos.</div>
                </div>
                <div class="container justify-content-center d-flex">
                    <button type="submit" class="btn btn-primary btn-sm w-75 mt-3">Enviar</button>
                </div>
            </div>
        </form>
    </div>
<?php include_once './estructura/footer.php'; ?>