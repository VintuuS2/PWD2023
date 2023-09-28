<?php
include_once '../configuracion.php';
include_once './estructura/header.php';
?>
<div class="vh-100 row w-100 align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris ">
        <div class="col-md-12">
            <form id="form" action="./accion/accionNuevaPersona.php" method="post" class="w-100 row g-3 needs-validation bg-dark p-4 rounded" novalidate>
                <h2 class="text-center text-primary">Añadir persona a la base de datos</h2>
                <div class="col-md-4">
                    <label for="NroDni" class="form-label text-light">DNI</label>
                    <input class="form-control" type="text" maxlength="8" placeholder="12345678" id="NroDni" name="NroDni" required pattern="[0-9]{8}" errorVacio="El campo no puede estar vacío" errorPatron="Solo admite Nº DNI de 8 dígitos" />
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un DNI válido
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Nombre" class="form-label text-light">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" required pattern="[a-zA-ZÑñ]+" errorVacio="El campo no puede estar vacío" errorPatron="El nombre solo admite carácteres alfabéticos">
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un nombre válido
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Apellido" class="form-label text-light">Apellido</label>
                    <input type="text" class="form-control" id="Apellido" name="Apellido" required pattern="[a-zA-ZÑñ]+" errorVacio="El campo no puede estar vacío" errorPatron="El nombre solo admite carácteres alfabéticos">
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un apellido válido
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="fechaNac" class="form-label text-light">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fechaNac" name="fechaNac" required>
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese una fecha válida
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Telefono" class="form-label text-light">Teléfono</label>
                    <input class="form-control" type="text" pattern="[0-9]+" maxlength="11" min="0" placeholder="299-1231234" name="Telefono" id="Telefono" required pattern="[0-9]+" errorVacio="Este campo no puede estar vacío" errorPatron="El NºTeléfono solo puede tener carácteres numéricos">
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un teléfono válido
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Domicilio" class="form-label text-light">Dirección</label>
                    <input type="text" class="form-control" placeholder="Ingrese su dirección" id="Domicilio" name="Domicilio" required pattern="[a-zA-ZñÑ0-9]+" errorVacio="Este campo no está vacío" errorPatron="El campo no admite carácteres especiales">
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese una dirección válida
                    </div>
                </div>
                <div class="d-flex align-content justify-content-center">
                    <button type="submit" class="btn btn-primary btn-sm fs-6">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="./js/scriptNuevaPersona.js"></script>
<?php include_once './estructura/footer.php'; ?>