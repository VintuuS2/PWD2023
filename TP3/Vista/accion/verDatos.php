<?php
include_once '../../../configuracionProyecto.php';
include_once '../../../../navbar.php';
include_once '../../../Control/EJ3/cargar.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos de la pelicula</title>
    <link rel="stylesheet" href="../../../../TP4/Vista/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <style>
        #datos-pelicula {
            background-color: rgb(223, 240, 216);
            width: 50%;
            margin: auto;
            padding: 25px;
            margin-top: 5%;
        }

        h1 {
            color: rgb(49, 126, 172);
        }

        .texto {
            color: rgb(70, 136, 71);
            font-weight: bolder;
        }

        .descripcion {
            color: rgb(101, 158, 102);
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <div class='content rounded-1' id="datos-pelicula">
                <div class="header border-bottom-0 align-items-right">
                    <h1>La pelicula introducida es</h1>
                    <a href='EJ3.php' style="float: right;"><button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button></a>
                </div>
                <div class='body py-0'>
                    <span class='texto'>Titulo: </span><span class='descripcion'><?php echo $titulo = $_POST['titulo']; ?></span></br>
                    <span class='texto'>Actores: </span><span class='descripcion'><?php echo $actores = $_POST['actores']; ?></span></br>
                    <span class='texto'>Director: </span><span class='descripcion'><?php echo $director = $_POST['director']; ?></span></br>
                    <span class='texto'>Guion: </span><span class='descripcion'><?php echo $guion = $_POST['guion']; ?></span></br>
                    <span class='texto'>Produccion: </span><span class='descripcion'><?php echo $produccion = $_POST['produccion']; ?></span></br>
                    <span class='texto'>Año: </span><span class='descripcion'><?php echo $anio = $_POST["anio"]; ?></span></br>
                    <span class='texto'>Nacionalidad: </span><span class='descripcion'><?php echo $nacionalidad = $_POST['nacionalidad']; ?></span></br>
                    <span class='texto'>Genero: </span><span class='descripcion'><?php echo $genero = $_POST['genero']; ?></span></br>
                    <span class='texto'>Duracion: </span><span class='descripcion'><?php echo $duracion = $_POST['duracion']; ?></span></br>
                    <span class='texto'>Restricciones de Edad: </span><span class='descripcion'><?php echo $restriccion = $_POST['edad']; ?></span></br>
                    <span class='texto'>Sinopsis: </span><span class='descripcion'><?php echo $sinopsis = $_POST['sinopsis']; ?></span></br>
                    <?php
                    // verifica que se puedan cargar el archivo
                    if (isset($_FILES['imagenPeli']) && $_FILES['imagenPeli']['error'] === UPLOAD_ERR_OK) {
                        $archivo = strtolower($_FILES['imagenPeli']['name']);
                        $subirArchivo = new cargaArchivo();
                        $fueCargado = $subirArchivo->analizarArchivo($archivo);
                        if ($fueCargado) {
                            echo "<img src='../../archivos/$archivo' width='200px' border='2px' alt='Pelicula'/>";
                        } else {
                            echo "Error al subir el archivo.";
                        }
                    } else {
                        echo "Error al subir el archivo.";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

</body>

</html>