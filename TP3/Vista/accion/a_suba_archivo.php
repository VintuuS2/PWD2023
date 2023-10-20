<?php
$tituloPagina = "TP3-Archivo subido ej1";
include_once '../../Control/Ej1/ArchiveManager.php';
include_once '../../../configuracionProyecto.php';
include_once '../estructura/header.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileManager = new ArchiveManager();
    $result = $fileManager->uploadFile($_FILES["archivo"]);
    $mensaje = $result;
} else {
    $mensaje = "Hubo un error, por favor vuelva e intente subir el archivo de nuevo.";
}
?>
    <div class="contenedor">
        <div class="d-flex m-auto align-items-center text-center" style="text-wrap:balance;">
            <h2><?php echo $mensaje; ?></h2>
        </div>
    </div>
    
<?php include_once './../../../vista/estructura/footer.php'; ?>
