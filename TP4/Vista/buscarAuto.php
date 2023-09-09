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
    <title>Buscar auto</title>
    
</head>
<body>
        <!-- hay que usar javascript para verificar la patente -->
    <form action="accionBuscarAuto.php" method="get" class="d-flex justify-content-center align-items-center" style="margin-top: 15%;">
        <div class="d-flex align-items-lg-end flex-column bg-dark  p-10" style="padding: 20px; border-radius: 10px;">
            <div class="form-group" style="text-align:center;">
                <label for="patente-auto" class="text-primary fs-3" style="margin-bottom:10px;">Patente del auto</label>
                <div class="input-group-text w-10">
                    <i class="fa fa-car" style="width: 10%; margin-right:10px;"></i>
                    <input type="text" class="form-control" id="patente-auto" name="patente-auto" placeholder="Ejemplo: KJL 357">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-sm" style="margin-top:15px; font-size:1.1em;">Enviar</button>
        </div>
    </form>

</body>
</html>