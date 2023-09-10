<?php
include_once '../menuTP4.php';
include_once '../configuracion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cambio de duenio</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const patenteInput = document.getElementById('cambio-duenio');
            const invalidFormato = document.querySelector('.formatoCorrecto');
            const invalidCaracteres = document.querySelector('.caracteresCorrectos');

            form.addEventListener('submit', function(event) {
                const patenteValue = patenteInput.value.toUpperCase();
                const formatoValido = /^[A-Z]{3}\s\d{3}$/;

                if (!formatoValido.test(patenteValue)) {
                    event.preventDefault(); // Evita que el formulario se envíe
                    patenteInput.style.border = '1px solid red';
                    invalidFormato.style.display = 'block';
                } else {
                    invalidFormato.style.display = 'none';
                }
                if (patenteValue.length != 7) {
                    event.preventDefault(); // Evita que el formulario se envíe
                    patenteInput.style.border = '1px solid red';
                    invalidCaracteres.style.display = 'block';
                } else {
                    invalidCaracteres.style.display = 'none';
                }
            });
        });
    </script>

</head>

<body>
    <form action="accionCambioDuenio.php" method="get" class="d-flex justify-content-center align-items-center" style="margin-top: 15%;">
        <div class="d-flex align-items-lg-end flex-column bg-dark  p-10" style="padding: 20px; border-radius: 10px;">
            <div class="form-group" style="text-align:center;">
                <label for="cambio-duenio" class="text-primary fs-3" style="margin-bottom:10px;">Cambio de duenio</label>
                <div class="input-group-text w-10" id="input-cambio-duenio">
                    <i class="fa fa-car" style="width: 10%; margin-right:10px;"></i>
                    <input type="text" class="form-control" id="cambio-duenio" name="cambio-duenio" placeholder="Ejemplo: KJL 357">
                </div>
                <div class="invalid-feedback formatoCorrecto" style="font-size: 1.2em; margin-bottom:-10px;">Debe contener solo números.</div>
                <div class="invalid-feedback caracteresCorrectos" style="font-size: 1.2em; margin-bottom:-13px;">Deben ser máximo 8 digitos.</div>
            </div>
            <div class="input-group-text w-10" id="input-patente-cambio">
                <i class="fa fa-user" style="width: 10%; margin-right:10px;"></i>
                <input type="text" class="form-control" id="patente-cambio" name="cambio-duenio" placeholder="44041670">
            </div>
            <div class="invalid-feedback formatoCorrecto" style="font-size: 1.2em; margin-bottom:-10px;">Debe contener solo números.</div>
            <div class="invalid-feedback caracteresCorrectos" style="font-size: 1.2em; margin-bottom:-13px;">Deben ser máximo 8 digitos.</div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm" style="margin-top:15px; font-size:1.1em;">Enviar</button>
        </div>
    </form>
</body>

</html>