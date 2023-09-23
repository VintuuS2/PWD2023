<?php
include_once '../configuracion.php';
include_once './estructura/header.php';
?>
<div class="vh-100 row w-100 m-auto">
    <div class="d-flex justify-content-center align-items-center">
        <form id="form" action="./accion/accionNuevaPersona.php" method="post" class="w-50 row g-3 needs-validation bg-dark p-4 rounded" novalidate>
            <h2 class="text-center text-primary">Añadir persona a la base de datos</h2>
            <div class="col-md-4">
                <label for="NroDni" class="form-label text-light">DNI</label>
                <input class="form-control" type="text" pattern="[0-9]" min="0" maxlength="8" placeholder="12345678" id="NroDni" name="NroDni" required />
                <div class="valid-feedback">
                    Dato ingresado correctamente!
                </div>
                <div class="invalid-feedback">
                    Ingrese un DNI válido
                </div>
            </div>
            <div class="col-md-4">
                <label for="Nombre" class="form-label text-light">Nombre</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                <div class="valid-feedback">
                    Dato ingresado correctamente!
                </div>
                <div class="invalid-feedback">
                    Ingrese un nombre válido
                </div>
            </div>
            <div class="col-md-4">
                <label for="Apellido" class="form-label text-light">Apellido</label>
                <input type="text" class="form-control" id="Apellido" name="Apellido" required>
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
                <input class="form-control" type="text" pattern="[0-9]+" maxlength="11" min="0" placeholder="299-1231234" name="Telefono" id="Telefono" required>
                <div class="valid-feedback">
                    Dato ingresado correctamente!
                </div>
                <div class="invalid-feedback">
                    Ingrese un teléfono válido
                </div>
            </div>
            <div class="col-md-4">
                <label for="Domicilio" class="form-label text-light">Dirección</label>
                <input type="text" class="form-control" placeholder="Ingrese su dirección" id="Domicilio" name="Domicilio" required>
                <div class="valid-feedback">
                    Dato ingresado correctamente!
                </div>
                <div class="invalid-feedback">
                    Ingrese una dirección válida
                </div>
            </div>
            <div class="d-flex align-content justify-content-center">
                <button type="submit" class="btn btn-primary btn-sm" style="margin-top:15px; font-size:1.1em;">Enviar</button>
            </div>
        </form>
        <div class="text-left mt-3" id="error">
            <!-- Aca se muestran los mensajes de error del formulario -->
        </div>
    </div>
</div>
<script src="./js/scriptNuevaPersona.js"></script>
<?php include_once './estructura/footer.php'; ?>