<?php
include_once '../configuracion.php';
include_once '../../configuracionProyecto.php';
include_once './estructura/header.php';
?>
<div class="vh-100 row w-100 align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris ">
        <div class="col-md-12">
            <form action="accion/accionBuscarAutosPersona.php" method="post" class="d-flex justify-content-center align-items-center needs-validation was-validated" novalidate>
                <div class="d-flex row align-items-lg-end flex-column bg-dark p-4 rounded w-75">
                    <div class="form-group">
                        <h2 class="text-primary text-center">Ver los autos de una persona</h2>
                        <label for="patente-auto" class="text-light form-label col-12">Número de documento de la persona</label>
                        <div class="input-group-text row " id="input-patente-auto">
                            <i class="fa fa-user mx-2 col-1"></i>
                            <input type="text" maxlength="8" class="form-control w-100 col" id="dni-duenio" name="dni-duenio" placeholder="Ejemplo: 44041670" required pattern="[0-9]{8}" errorVacio="Este campo no puede estar vacío" errorPatron="El DNI solo admite 8 carácteres numéricos">
                        </div>
                        <div class="text-danger text-left mt-2"></div>
                    </div>
                    <div class="container d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-sm mt-3 fs-5">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./js/scriptAutosPersona.js"></script>
<?php include_once './estructura/footer.php'; ?>