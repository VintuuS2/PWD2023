<?php
$tituloPagina = "TP3-Archivo subido ej1";
include_once '../../../Control/Ej1/ArchiveManager.php';
include_once '../../../configuracionProyecto.php';
include_once '../estructura/header.php';
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileManager = new ArchiveManager();
    $result = $fileManager->uploadFile($_FILES["archivo"]);
    $mensaje .= "<h2>$result</h2>";
}
?>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <?php echo $mensaje; ?>
        </div>
    </div>
    
<?php include_once '../estructura/footer.php'; ?>
