<?php
include_once '../configuracion.php';
include_once './estructura/header.php';
?>
<div class="vh-100 w-100 row d-flex justify-content-center align-items-center">
    <div class="container">
        <form action="./accion/accionBuscarPersona.php" method="post" class="d-flex justify-content-center align-items-center text-center">
            <div class="d-flex align-items-lg-center flex-column bg-dark p-4 rounded w-50 m-auto">
                <div class="form-group">
                    <h2 class="text-primary fs-5 m-2">¿Cuál es el DNI de la persona de la cual desea modificar sus datos?</h2>
                    <div class="input-group-text" id="input-dni-modificar">
                        <i class="fa fa-user px-3"></i>
                        <input type="text" class="form-control" maxlength="8" id="dni-modificar" name="dni-modificar" placeholder="Ejemplo: 44041670">
                    </div>
                    <div class="invalid-feedback formatoCorrectoDNI" style="font-size: 1.2em; margin-bottom:-10px;">Debe contener solo números.</div>
                    <div class="invalid-feedback caracteresCorrectosDNI" style="font-size: 1.2em; margin-bottom:-13px;">Deben ser máximo 8 digitos.</div>
                </div>
                <div class="container d-flex justify-content-between">
                    <a href="listarPersonas.php" target="_blank" class="btn btn-primary link-light" style="padding: 5px 10px; font-size:1.1em; margin-top:15px; margin-right:5px;">Ver las personas guardadas</a>
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-top:15px; font-size:1.1em;">Enviar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<?php include_once './estructura/footer.php'; ?>