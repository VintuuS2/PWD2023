<?php
$tituloPagina = "TP3-Pelicula subida";
include_once '../../../configuracionProyecto.php';
include_once '../estructura/header.php';
include_once '../../Control/EJ3/cargar.php';
?><style>
        #datos-pelicula {
            background-color: rgb(223, 240, 216);
            width: 75%;
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
    <div class="contenedor">
        <div class="d-flex m-auto align-items-center">
            <div class='content rounded-1' id="datos-pelicula">
                <?php
                    if ($_POST) {
                        echo "<div class='header border-bottom-0 align-items-right'>
                        <h1 class='text-center'>La pelicula introducida es</h1>
                        <a href='../EJ3.php' style='float: right;'><button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button></a>
                    </div>
                    <div class='body py-0'>
                        <span class='texto'>Titulo: </span><span class='descripcion'>" . $titulo = $_POST['titulo'] . "</span></br>
                        <span class='texto'>Actores: </span><span class='descripcion'>" . $actores = $_POST['actores'] . "</span></br>
                        <span class='texto'>Director: </span><span class='descripcion'>" . $director = $_POST['director'] . "</span></br>
                        <span class='texto'>Guion: </span><span class='descripcion'>" . $guion = $_POST['guion'] . "</span></br>
                        <span class='texto'>Produccion: </span><span class='descripcion'>" . $produccion = $_POST['produccion'] . "</span></br>
                        <span class='texto'>Año: </span><span class='descripcion'>" . $anio = $_POST["anio"] . "</span></br>
                        <span class='texto'>Nacionalidad: </span><span class='descripcion'>" . $nacionalidad = $_POST['nacionalidad'] . "</span></br>
                        <span class='texto'>Genero: </span><span class='descripcion'>" . $genero = $_POST['genero'] . "</span></br>
                        <span class='texto'>Duracion: </span><span class='descripcion'>" . $duracion = $_POST['duracion'] . "</span></br>
                        <span class='texto'>Restricciones de Edad: </span><span class='descripcion'>" . $restriccion = $_POST['edad'] . "</span></br>
                        <span class='texto'>Sinopsis: </span><span class='descripcion'>" . $sinopsis = $_POST['sinopsis'] . "</span></br>";
                        
                        if (isset($_FILES['imagenPeli']) && $_FILES['imagenPeli']['error'] === UPLOAD_ERR_OK) {
                            $archivo = strtolower($_FILES['imagenPeli']['name']);
                            $subirArchivo = new cargaArchivo();
                            $fueCargado = $subirArchivo->analizarArchivo($archivo);
                            if ($fueCargado) {
                                echo "<img src='../../archivos/$archivo' width='300px' border='2px' alt='Pelicula'/>";
                            } else {
                                echo "Error al subir el archivo.";
                            }
                        } else {
                            echo "Error al subir el archivo.";
                        }
                    echo "</div>";
                    } else {
                        echo "<h2 class='text-center'>No se han recibido datos</h2>";
                    }
                    ?>
                
            </div>
        </div>
    </div>
<?php include_once '../estructura/footer.php'; ?>