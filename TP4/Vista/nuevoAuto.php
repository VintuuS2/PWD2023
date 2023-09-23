<?php
include_once '../configuracion.php';
include_once './estructura/header.php';
?>
    <div class="vh-100 w-100 row m-auto">
        <div class="d-flex justify-content-center align-items-center">
            <form id="form" method="post" name="form" action="./accion/accionNuevoAuto.php" class="w-50 row g-3 needs-validation bg-dark p-4 rounded">
                <h2 class="text-center text-primary">Añadir nuevo vehículo a la base de datos</h2>
                <div class="col-md-4">
                    <label for="Patente" class="form-label text-light">Patente</label>
                    <input type="text" class="form-control" maxlength="7" id="Patente" name="Patente" placeholder="ABC 123">
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese una Patente válida.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Marca" class="form-label text-light">Marca</label>
                    <input type="text" class="form-control" placeholder="Fiat uno" id="Marca" name="Marca">
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese una Marca válida.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Modelo" class="form-label text-light">Modelo</label>
                    <input type="text" class="form-control" placeholder="98" id="Modelo" name="Modelo">
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un Modelo válido.
                    </div>
                </div>
                <div class="row justify-content-center text-center mt-2" style="margin: auto;">
                    <div class="col-md-8">
                        <label for="DniDuenio" class="form-label text-light">DNI del dueño</label>
                        <input type="text" class="form-control" placeholder="12345678" maxlength="8" id="DniDuenio" name="DniDuenio">
                        <div class="valid-feedback">
                            Dato ingresado correctamente!
                        </div>
                        <div class="invalid-feedback">
                            Ingrese un DNI válido.
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center mt-3" style="margin: auto;">
                    <div class="col-md-8">
                        <div class="d-flex  align-content justify-content-around">
                            <button type="submit" class="btn btn-primary btn-sm" style="font-size:1.1em;">Enviar</button>
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
    <script src="./js/scriptNuevoAuto.js"></script>
<?php include_once './estructura/footer.php'; ?>