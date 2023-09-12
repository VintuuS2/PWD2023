<?php
include_once '../../../menu-paginas.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo TXT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <div class="d-flex align-items-center py-4 bg-body-tertiary">
        <main class="form-signin w-100 m-auto">
            <div class="container-centered">
                <form action="./accion/a_suba_txt.php" method="post" enctype="multipart/form-data">
                    <div class="container d-flex justify-content-center">
                        <div class="bg-secondary m-4  d-flex justify-content-center align-items-center" style="height: 300px; width: 500px;">
                            <div class="bg-light position-relative " style="height: 270px; width: 470px;">
                                <div class="d-grid gap-2 col-10 mx-auto position-absolute top-50 start-50 translate-middle">
                                    <div class="form-floating mb-2">
                                        Seleccionar archivo TXT: <input type="file" name="archivo" id="archivo">
                                    </div>
                                    <div id="formconsole" class="error"></div>
                                    <input type="submit" value="Subir Archivo" id="boton" class="btn btn-primary " style="background-color: rgb(0,206,129);border-color: rgb(0,206,129)">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>

</html>