<?php
class ArchiveManager {
    public function uploadFile($file) {
        $extencionesPermitidas = array("pdf", "doc");
        $maxFileSize = 2 * 1024 * 1024; // 2 MB
        
        $fileName = $file["name"];
        $fileSize = $file["size"];
        $fileTmp = $file["tmp_name"];
        $extensionArchivo = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        
        if (!in_array($extensionArchivo, $extencionesPermitidas)) {
            return "El archivo debe ser de tipo PDF o DOC.";
        }
        
        if ($fileSize > $maxFileSize) {
            return "El tamaño del archivo excede el límite de 2 MB.";
        }
        
        $uploadPath = "../Upload" . $fileName;
        
        if (move_uploaded_file($fileTmp, $uploadPath)) {
            return "Archivo subido con éxito. <a href='$uploadPath' target='_blank'>Descargar archivo</a>";
        } else {
            return "Error al subir el archivo.";
        }
    }
}

