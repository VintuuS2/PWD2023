<?php
include_once '../configuracion.php';
include_once '../../navbar.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <title>Nueva persona</title>
</head>

<body>
    <div class="contenedor row m-auto">
        <div>
            <form id="form" action="./accion/accionNuevaPersona.php" method="post" class="row g-3 needs-validation" novalidate>
                <h2 class="text-center" class="w-100">Añadir persona a la base de datos</h2>
                <div class="col-md-4">
                    <label for="NroDni" class="form-label">DNI</label>
                    <input class="form-control" type="text" pattern="[0-9]" min="0" maxlength="8" placeholder="12345678" id="NroDni" name="NroDni" required />
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un DNI válido
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un nombre válido
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Apellido" class="form-label">Apellido</label>
                    <input type="text" class="form-control" id="Apellido" name="Apellido" required>
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un apellido válido
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="fechaNac" class="form-label">Fecha de nacimiento</label>
                    <input type="date" class="form-control" id="fechaNac" name="fechaNac" required>
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese una fecha válida
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Telefono" class="form-label">Teléfono</label>
                    <input class="form-control" type="text" pattern="[0-9]+" maxlength="11" min="0" placeholder="299-1231234" name="Telefono" id="Telefono" required>
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un teléfono válido
                    </div>
                </div>
                <div class="col-md-4">
                    <label for="Domicilio" class="form-label">Dirección</label>
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
</body>

</html>