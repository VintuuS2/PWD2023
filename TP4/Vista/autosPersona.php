<?php
include_once '../../navbar.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Buscar auto</title>
    <script src="js/scriptAutosPersona.js"></script>
</head>
<body>
    <div class="contenedor">
        <form action="accion/accionBuscarPersona.php" method="get" class="d-flex justify-content-center align-items-center">
            <div class="d-flex align-items-lg-end flex-column bg-dark p-10" style="padding: 20px; border-radius: 10px; max-width:45%; min-width: 300px;">
                <div class="form-group" style="text-align:center;">
                    <label for="dni-duenio" class="text-primary fs-4" style="margin-bottom:10px;">¿Cuál es el dni de la persona de la que desea ver sus vehículos?</label>
                    <div class="input-group-text w-10" id="input-dni-duenio">
                        <i class="fa fa-user" style="width: 10%; margin-right:10px;"></i>
                        <input type="text" maxlength="8" class="form-control" id="dni-duenio" name="dni-duenio" placeholder="Ejemplo: 44041670">
                    </div>
                    <div class="invalid-feedback formatoCorrecto" style="font-size: 1.2em; margin-bottom:-10px;">Solo números (sin puntos).</div>
                    <div class="invalid-feedback caracteresCorrectos" style="font-size: 1.2em; margin-bottom:-13px;">Deben ser máximo 8 dígitos.</div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm" style="margin-top:15px; font-size:1.1em;">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>