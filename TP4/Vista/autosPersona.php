<?php
include_once '../configuracion.php';
include_once './estructura/header.php';
?>
    <div class="vh-100 row w-100">
        <form action="accion/accionBuscarAuto.php" method="post" class="d-flex justify-content-center align-items-center needs-validation was-validated" novalidate>
            <div class="d-flex row align-items-lg-end flex-column bg-dark p-4 rounded w-50" style="min-width: 300px;">
                <div class="form-group">
                    <h2 class="text-primary text-center">Autos por persona</h2>
                    <label for="patente-auto" class="text-light form-label col-12">Nro DNI</label>
                    <div class="input-group-text row " id="input-patente-auto">
                        <i class="fa fa-user mx-2 col-1"></i>
                        <input type="text" maxlength="8" class="form-control w-100 col" id="dni-duenio" name="dni-duenio" placeholder="Ejemplo: 44041670" required pattern="[0-9]{8}" errorVacio="Este campo no puede estar vacío" errorPatron="El DNI solo admite 8 carácteres numéricos">
                    </div>
                    <div class="text-danger text-left mt-2"></div>
                </div>
                <div class="container d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-sm mt-3"><p class="h5 m-0">Enviar</p></button>
                </div>
            </div>
        </form>
    </div>
    <script src="./js/scriptAutosPersona.js"></script>
<?php include_once './estructura/footer.php'; ?>