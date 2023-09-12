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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Buscar auto</title>
    <script src="js/scriptBuscarAuto.js"></script>
</head>
<body>
    <div class="contenedor">
        <form action="accionBuscarAuto.php" method="get" class="d-flex justify-content-center align-items-center">
            <div class="d-flex align-items-lg-end flex-column bg-dark p-10" style="padding: 25px; border-radius: 10px; max-width:50%; min-width: 300px;">
                <div class="form-group" style="text-align:center; ">
                    <label for="patente-auto" class="text-primary fs-4" style="margin-bottom:10px;">¿Cuál es la patente del vehículo del que desea ver los datos?</label>
                    <div class="input-group-text w-10" id="input-patente-auto">
                        <i class="fa fa-car" style="width: 10%; margin-right:10px;"></i>
                        <input type="text" class="form-control" maxlength="7" id="patente-auto" name="patente-auto" placeholder="Ejemplo: KJL 357">
                    </div>
                    <div class="invalid-feedback formatoCorrecto" style="font-size: 1.2em; margin-bottom:-10px;">El formato debe ser "ABC 123".</div>
                    <div class="invalid-feedback caracteresCorrectos" style="font-size: 1.2em; margin-bottom:-13px;">Deben ser 7 carácteres.</div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm" style="margin-top:15px; font-size:1.1em;">Enviar</button>
            </div>
        </form>
    </div>
</body>
</html>