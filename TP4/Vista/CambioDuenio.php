<?php
include_once '../configuracion.php';
include_once './estructura/header.php';
?>
    <div class="vh-100 w-100 row m-auto">
        <div class="d-flex justify-content-center align-items-center">
            <form id="form" method="post" name="form" action="./accion/accionCambioDuenio.php" class="w-50 row g-3 needs-validation bg-dark p-4 rounded was-validated" novalidate>
                <h2 class="text-center text-primary">Cambiar el dueño de un vehículo</h2>
                <div class="row justify-content-center mt-2 m-auto">
                    <div class="col-md-8">
                        <label for="patente-cambio" class="form-label text-light">Patente del vehículo</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: KJL 357" required pattern="[A-Za-z]{3} \d{3}" id="patente-cambio" name="patente-cambio" errorVacio="Este campo no puede estar vacío" errorPatron="El formato debe ser 'ABC 123'.">
                        <div class="invalid-feedback text-left mt-1"></div>
                    </div>
                </div>
                <div class="row justify-content-center mt-2 m-auto">
                    <div class="col-md-8">
                        <label for="dni-cambio" class="form-label text-light">Documento del nuevo dueño</label>
                        <input type="text" class="form-control" placeholder="12345678" maxlength="8" id="dni-cambio" name="dni-cambio" required pattern="[0-9]{8}" errorVacio="Este campo no puede estar vacío" errorPatron="El dni debe estar conformado de 8 números.">
                        <div class="invalid-feedback text-left mt-1"></div>
                    </div>
                </div>
                <div class="row justify-content-center text-center mt-3 m-auto">
                    <div class="col-md-8">
                        <div class="d-flex  align-content justify-content-around">
                            <button type="submit" class="btn btn-primary btn-sm fs-6">Enviar</button>
                            <a class="btn btn-primary fs-6" role="button" href="listarPersonas.php">Ver lista de autos</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="./js/scriptCambioDuenio.js"></script>
<?php include_once './estructura/footer.php'; ?>