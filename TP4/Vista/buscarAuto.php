<?php
include_once '../configuracion.php';
include_once '../../configuracionProyecto.php';
include_once './estructura/header.php';
?>
<div class="vh-100 row w-100 align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris ">
        <div class="col-md-12">
            <form action="accion/accionBuscarAuto.php" method="post" class="d-flex justify-content-center align-items-center needs-validation was-validated" novalidate>
                <div class="d-flex row align-items-lg-end flex-column bg-dark p-4 rounded w-75">
                    <div class="form-group">
                        <h2 class="text-primary text-center">Ver los datos de un vehículo</h2>
                        <label for="patente-auto" class="text-light form-label col-12">Patente del vehículo</label>
                        <div class="input-group-text row " id="input-patente-auto">
                            <i class="fa fa-car mx-2 col-1"></i>
                            <input type="text" class="form-control w-100 col" maxlength="7" id="patente-auto" name="patente-auto" required pattern="[A-Za-z]{3} \d{3}" placeholder="Ejemplo: KJL 357" errorVacio="Este campo no puede estar vacío" errorPatron="El formato debe ser 'ABC 123'.">
                        </div>
                        <div class="text-danger text-left mt-2"></div>
                    </div>
                    <div class="container d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary btn-sm mt-3">
                            <p class="h5 m-0">Enviar</p>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./js/scriptBuscarAuto.js"></script>
<?php include_once './estructura/footer.php'; ?>