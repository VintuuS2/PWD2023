<?php
$tituloPagina = "TP2-VerDatos";
include_once './../../../configuracionProyecto.php';
include_once './../../Vista/estructura/header.php';
include_once "../../Control/Ej3/Usuarios.php";
?>
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
    <div class='content rounded-1' id="datos-pelicula">
        <div class="header border-bottom-0 align-items-right">
            <h1>La pelicula introducida es</h1>
            <a href='../../Vista/EJ4/ej4.php' style="float: right;"><button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button></a>
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
        </div>
    </div>
    <?php
include_once './../../../vista/estructura/footer.php';
?>

