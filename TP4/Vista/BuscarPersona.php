<?php
$tituloPagina = "TP4-Buscar persona";
include_once '../configuracion.php';
include_once '../../configuracionProyecto.php';
include_once './estructura/header.php';
?>
<div class="vh-100 row w-100 align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris ">
        <div class="col-md-12">
            <form action="./accion/accionBuscarPersona.php" method="post" class="d-flex justify-content-center align-items-center needs-validation was-validated" novalidate>
                <div class="d-flex align-items-lg-center flex-column bg-dark p-4 rounded w-75 m-auto">
                    <div class="form-group w-75">
                        <h2 class="text-primary m-2 text-center">Modificar datos de una persona</h2>
                        <label for="dni-modificar" class="text-light form-label col-12 text-left">Número de documento de la persona</label>
                        <div class="input-group-text row" id="input-dni-modificar">
                            <i class="fa fa-user mx-2 col-1"></i>
                            <input type="text" class="form-control col" maxlength="8" id="dni-modificar" name="dni-modificar" placeholder="Ejemplo: 44041670" required pattern="[0-9]{8}" errorVacio="Este campo no puede estar vacío" errorPatron="El dni debe estar conformado de 8 números.">
                        </div>
                        <div class="text-danger text-left mt-1 fs-5"></div>
                    </div>
                    <div class="container d-flex justify-content-around w-75">
                        <a href="listarPersonas.php" target="_blank" class="btn btn-primary link-light mt-3 fs-5">Ver las personas guardadas</a>
                        <button type="submit" class="btn btn-primary btn-sm mt-3 fs-5">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./js/scriptBuscarPersona.js"></script>
<?php include_once './../../vista/estructura/footer.php'; ?>