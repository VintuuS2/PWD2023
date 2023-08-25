<?php
class ArchiveManager {
    public function uploadFile($file) {
        $extensionesPermitidas = array("pdf", "doc");
        $maxFileSize = 2 * 1024 * 1024; // 2 MB
        
        $fileName = $file["name"];
        $fileSize = $file["size"];
        $fileTmp = $file["tmp_name"];
        $extensionArchivo = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $mensaje = "";
        
        if (!in_array($extensionArchivo, $extensionesPermitidas)) {
            $mensaje = "El archivo debe ser de tipo PDF o DOC.";
        } elseif ($fileSize > $maxFileSize) {
            $mensaje = "El tamaño del archivo excede el límite de 2 MB.";
        } elseif (move_uploaded_file($fileTmp, "../Upload" . $fileName)) {
            $mensaje = "Archivo subido con éxito. <a href='../Upload $fileName' target='_blank'>Descargar archivo</a>";
        } else {
            $mensaje = "Error al subir el archivo.";
        }
        
        return $mensaje;
    }
}
?>

