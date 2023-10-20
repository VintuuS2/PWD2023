<?php
$tituloPagina = "TP3-Archivo subido ej2";
include_once '../../Control/Ej2/ArchiveManajerTxt.php';
include_once '../../../configuracionProyecto.php';
include_once '../estructura/header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controlArchivo = new ArchiveManagerTxt($_FILES["archivo"]);
    $result = $controlArchivo->mostrarContenido();
    $mensaje = $result;
} else {
    $mensaje = "Hubo un error, por favor vuelva e intente subir el archivo de nuevo.";
}
?>
    <div class="contenedor">
        <div class="d-flex m-auto align-items-center text-center" style="text-wrap:balance;">
            <h2><?php echo $mensaje;?></h2>
        </div>
    </div>
<?php include_once '../estructura/footer.php'; ?>