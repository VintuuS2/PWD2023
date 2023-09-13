<?php
include_once '../configuracion.php';
include_once '../../navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Nuevo Auto</title>
</head>
<body>
    <div class="contenedor row m-auto">
        <form id="form" method="post" name="form" action="./accion/accionNuevoAuto.php" class="row g-3 needs-validation form">
            <h2 class="text-center">Nuevo auto</h2>
            <div class="col-md-4">
                <label for="Patente" class="form-label">Patente</label>
                <input type="text" class="form-control" maxlength="7" id="Patente" name="Patente" placeholder="ABC 123">
                <div class="valid-feedback">
                    Dato ingresado correctamente!
                </div>
                <div class="invalid-feedback">
                    Ingrese una Patente válida.
                </div>
            </div>
            <div class="col-md-4">
                <label for="Marca" class="form-label">Marca</label>
                <input type="text" class="form-control" placeholder="Fiat uno" id="Marca" name="Marca">
                <div class="valid-feedback">
                    Dato ingresado correctamente!
                </div>
                <div class="invalid-feedback">
                    Ingrese una Marca válida.
                </div>
            </div>
            <div class="col-md-4">
                <label for="Modelo" class="form-label">Modelo</label>
                <input type="text" class="form-control" placeholder="98" id="Modelo" name="Modelo">
                <div class="valid-feedback">
                    Dato ingresado correctamente!
                </div>
                <div class="invalid-feedback">
                    Ingrese un Modelo válido.
                </div>
            </div>
            <div class="row justify-content-center text-center" style="margin: auto;">
                <div class="col-md-8">
                    <label for="DniDuenio" class="form-label">DNI del dueño</label>
                    <input type="text" class="form-control" placeholder="12345678" maxlength="8" id="DniDuenio" name="DniDuenio">
                    <div class="valid-feedback">
                        Dato ingresado correctamente!
                    </div>
                    <div class="invalid-feedback">
                        Ingrese un DNI válido.
                    </div>
                </div>
            </div>
            <div class="d-flex align-content justify-content-center">
                <button type="submit" class="btn btn-primary btn-sm" style="margin-top:15px; font-size:1.1em;">Enviar</button>
            </div>
        </form>
        <div class="text-left" id="error">

        </div>
    </div>
    <script src="./js/scriptNuevoAuto.js"></script>
</body>
</html>