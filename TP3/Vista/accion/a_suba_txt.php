<?php
$tituloPagina = "TP3-Archivo subido ej2";
include_once '../../../Control/Ej2/ArchiveManajerTxt.php';
include_once '../../../configuracionProyecto.php';
include_once '../estructura/header.php';
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controlArchivo = new ArchiveManagerTxt($_FILES["archivo"]);
    $result = $controlArchivo->mostrarContenido();
    $mensaje .= "<h2>$result</h2>";
}
?>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <?php echo $mensaje;?>
        </div>
    </div>
<?php include_once '../estructura/footer.php'; ?>