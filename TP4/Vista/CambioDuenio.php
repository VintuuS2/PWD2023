<?php
include_once '../menuTP4.php';
include_once '../configuracion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Cambio de duenio</title>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');

            const patenteInput = document.getElementById('patente-cambio');
            const textoFormatoPatente = document.querySelector('.formatoCorrectoPatente');
            const textoCaracteresPatente = document.querySelector('.caracteresCorrectosPatente');

            const documentoInput = document.getElementById('dni-cambio');
            const textoFormatoDocumento = document.querySelector('.formatoCorrectoDNI');
            const textoCaracteresDocumento = document.querySelector('.caracteresCorrectosDNI');

            form.addEventListener('submit', function(event) {
                // Verifica la patente
                const patenteValue = patenteInput.value.toUpperCase();
                const formatoValidoPatente = /^[A-Z]{3}\s\d{3}$/;
                if (!formatoValidoPatente.test(patenteValue)) {
                    textoFormatoPatente.style.display = 'block';
                } else {
                    textoFormatoPatente.style.display = 'none';
                }
                if (patenteValue.length != 7) {
                    textoCaracteresPatente.style.display = 'block';
                } else {
                    textoCaracteresPatente.style.display = 'none';
                }
                if (!formatoValidoPatente.test(patenteValue) || patenteValue.length != 7) {
                    event.preventDefault(); // Evita que el formulario se envíe
                    patenteInput.style.border = '1px solid red';
                } else {
                    patenteInput.style.border = '1px solid green';
                }
                // Verifica el documento
                const dniValue = documentoInput.value.toUpperCase();
                const formatoValidoDNI = /^\d{1,8}$/;
                if (!formatoValidoDNI.test(dniValue)) {
                    textoFormatoDocumento.style.display = 'block';
                } else {
                    textoFormatoDocumento.style.display = 'none';
                }
                if (dniValue.length > 8) {
                    textoCaracteresDocumento.style.display = 'block';
                } else {
                    textoCaracteresDocumento.style.display = 'none';
                }
                if (!formatoValidoDNI.test(dniValue) || dniValue.length > 8) {
                    event.preventDefault(); // Evita que el formulario se envíe
                    documentoInput.style.border = '1px solid red';
                } else {
                    documentoInput.style.border = '1px solid green';
                }
            });
        });
    </script>

</head>

<body>
    <div class="contenedor">
        <form action="accionCambioDuenio.php" method="get" class="d-flex text-center" >
            <div class="d-flex  align-items-lg-end flex-column bg-dark" style="padding: 20px; border-radius: 10px;">
                <h1 class="fs-3 bg-info w-100" style="border-radius:10px; padding: 5px 10px; margin:0;">Cambiar el dueño de un vehículo</h1>
                <div class="form-group w-100">
                    <label for="patente-cambio" class="text-primary fs-4" style="margin:5px;">Patente del vehículo</label>
                    <div class="input-group-text" id="input-patente-cambio">
                        <i class="fa fa-car" style="width: 10%; margin-right:10px;"></i>
                        <input type="text" class="form-control" maxlength="7" id="patente-cambio" name="patente-cambio" placeholder="Ejemplo: KJL 357">
                    </div>
                    <div class="invalid-feedback formatoCorrectoPatente" style="font-size: 1.2em; margin-bottom:-10px;">El formato debe ser "ABC 123".</div>
                    <div class="invalid-feedback caracteresCorrectosPatente" style="font-size: 1.2em; margin-bottom:-10px;">Deben ser 7 carácteres.</div>
                </div>
                <div class="form-group w-100">
                    <label for="dni-cambio" class="text-primary fs-4" style="margin: 5px;">Documento del nuevo dueño</label>
                    <div class="input-group-text" id="input-dni-cambio">
                        <i class="fa fa-user" style="width: 10%; margin-right:10px;"></i>
                        <input type="text" class="form-control" maxlength="8" id="dni-cambio" name="dni-cambio" placeholder="Ejemplo: 44041670">
                    </div>
                    <div class="invalid-feedback formatoCorrectoDNI" style="font-size: 1.2em; margin-bottom:-10px;">Debe contener solo números.</div>
                    <div class="invalid-feedback caracteresCorrectosDNI" style="font-size: 1.2em; margin-bottom:-13px;">Deben ser máximo 8 digitos.</div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm" style="margin-top:15px; font-size:1.1em;">Enviar</button>
            </div>
        </form>
    </div>
</body>

</html>