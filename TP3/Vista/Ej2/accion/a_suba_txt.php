<?php
include_once '../../Control/Ej2/ArchiveManajerTxt.php';
include_once '../../../../navbar.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $controlArchivo = new ArchiveManagerTxt($_FILES["archivo"]);
    $result = $controlArchivo->mostrarContenido();
    echo "<h2>$result</h2>";
}
?>