<?php

class cargaArchivo {
    public function analizarArchivo($nombreArchivo) {
        $rutaDestino = '../../archivos/' . $nombreArchivo;

        // Verificar si el archivo es una imagen
        $tipoArchivo = $_FILES['imagenPeli']['type'];
        $extensionValida = false;

        if ($tipoArchivo === 'image/jpeg' || $tipoArchivo === 'image/png' || $tipoArchivo === 'image/jpg') {
            $extensionValida = true;
        }

        if ($extensionValida && move_uploaded_file($_FILES['imagenPeli']['tmp_name'], $rutaDestino)) {
            return true; // Éxito al cargar y analizar el archivo
        } else {
            return false; // Error al mover el archivo o extensión no válida
        }
    }
}

?>
