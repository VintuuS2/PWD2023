<?php
include_once '../configuracion.php';
include_once './estructura/header.php';
?>
    <div class="vh-100 w-100 row m-auto">
        <div class="d-flex justify-content-center align-items-center">
            <form id="form" method="post" name="form" action="./accion/accionCambioDuenio.php" class="w-50 row g-3 needs-validation bg-dark p-4 rounded">
                <h2 class="text-center text-primary">Cambiar el dueño de un vehículo</h2>
                <div class="row justify-content-center mt-2 m-auto">
                    <div class="col-md-8">
                        <label for="patente-cambio" class="form-label text-light">Patente del vehículo</label>
                        <input type="text" class="form-control" placeholder="Ejemplo: KJL 357" id="patente-cambio" name="patente-cambio">
                        <div class="valid-feedback">
                            Dato ingresado correctamente!
                        </div>
                        <div class="invalid-feedback">
                            Ingrese un patente-cambio válido.
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center mt-2 m-auto">
                    <div class="col-md-8">
                        <label for="dni-cambio" class="form-label text-light">Documento del nuevo dueño</label>
                        <input type="text" class="form-control" placeholder="12345678" maxlength="8" id="dni-cambio" name="dni-cambio">
                        <div class="valid-feedback">
                            Dato ingresado correctamente!
                        </div>
                        <div class="invalid-feedback">
                            Ingrese un DNI válido.
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center mt-3 m-auto">
                    <div class="col-md-8">
                        <div class="d-flex  align-content justify-content-around">
                            <button type="submit" class="btn btn-primary btn-sm fs-6">Enviar</button>
                            <a class="btn btn-primary" role="button" href="listarPersonas.php">Ver lista de autos</a>
                        </div>
                    </div>
                </div>
            </form>
            <div class="text-left mt-3" id="error">
                <!-- Aca se muestran los mensajes de error del formulario -->
            </div>
        </div>
    </div>
    <script src="./js/scriptCambioDuenio.js"></script>
<?php include_once './estructura/footer.php'; ?>