<?php
include_once '../../../Control/Ej1/ArchiveManager.php';
include_once '../../../../TP4/configuracion.php';
include_once '../../../../navbar.php';
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fileManager = new ArchiveManager();
    $result = $fileManager->uploadFile($_FILES["archivo"]);
    $mensaje .= "<h2>$result</h2>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../../../TP4/Vista/css/style.css">
    <title>Ej1</title>
</head>
<body>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <?php echo $mensaje; ?>
        </div>
    </div>
</body>
</html>
