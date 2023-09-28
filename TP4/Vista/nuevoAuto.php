<?php
include_once '../configuracion.php';
include_once './estructura/header.php';
?>
<div class="vh-100 row w-100 align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris ">
        <div class="col-md-12">
            <form id="form" method="post" name="form" action="./accion/accionNuevoAuto.php" class="row g-3 needs-validation bg-dark p-4 rounded" novalidate>
                <h2 class="text-center text-primary">Añadir nuevo vehículo a la base de datos</h2>
                <div class="col-md-4">
                    <label for="Patente" class="form-label text-light">Patente</label>
                    <input type="text" class="form-control" maxlength="7" id="Patente" name="Patente" placeholder="ABC 123" required pattern="[a-zA-Z]{3} \b[0-9]{3}" errorVacio="El campo no puede estar vacío" errorPatron="La patente debe ser por ejemplo 'ABC 123'">
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese una Patente válida.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Marca" class="form-label text-light">Marca</label>
                    <input type="text" class="form-control" placeholder="Fiat uno" id="Marca" name="Marca" required pattern="[a-zA-ZñÑ0-9 ]+" errorVacio="Este campo no puede estar vacío" errorPatron="La marca solo admite carácteres alfanuméricos">
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese una Marca válida.
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Modelo" class="form-label text-light">Modelo</label>
                    <input type="text" class="form-control" placeholder="98" id="Modelo" name="Modelo" required pattern="[0-9]{2}([0-9]{2})?" errorVacio="El campo no puede estar vacío" errorPatron="El modelo solo contiene 2 o 4 dígitos únicamente">
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un Modelo válido.
                    </div>
                </div>
                <div class="row justify-content-center m-auto">
                    <div class="col-md-8">
                        <label for="DniDuenio" class="form-label text-light">DNI del dueño</label>
                        <input type="text" class="form-control" placeholder="12345678" maxlength="8" id="DniDuenio" name="DniDuenio" required pattern="[0-9]{8}" errorVacio="El campo no puede estar vacío" errorPatron="El DNI debe tener 8 dígitos">
                        <div class="valid-feedback">
                            Dato ingresado correctamente!
                        </div>
                        <div class="invalid-feedback">
                            Ingrese un DNI válido.
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center text-center m-auto mt-3">
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
</div>
<script src="./js/scriptNuevoAuto.js"></script>
<?php include_once './estructura/footer.php'; ?>