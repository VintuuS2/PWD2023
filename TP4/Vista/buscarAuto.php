<?php
include_once '../menuTP4.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Buscar auto</title>
</head>
<body>
        <!-- hay que usar javascript para verificar la patente -->
    <form action="accionBuscarAuto.php" method="get" class="d-flex justify-content-center align-items-center" style="margin-top: 15%;">
        <div class="d-flex align-items-lg-end flex-column bg-dark bg-gradient p-10" style="padding: 20px; border-radius: 10px;">
            <div class="form-group">
                <label for="patente-auto" class="text-primary fs-3" style="margin-bottom:10px;">Patente del auto</label>
                <input type="text" class="form-control" id="patente-auto" name="patente-auto" placeholder="ejemplo: AC 123 DE">
            </div>
            <button type="submit" class="btn btn-primary btn-sm" style="margin-top:15px;">Enviar</button>
        </div>
    </form>
</body>
</html>