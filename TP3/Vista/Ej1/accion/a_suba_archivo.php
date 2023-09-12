<?php
include_once '../../Control/Ej1/ArchiveManager.php';
include_once '../../../../navbar.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileManager = new ArchiveManager();
    $result = $fileManager->uploadFile($_FILES["archivo"]);
    echo "<h2>$result</h2>";
}
?>
