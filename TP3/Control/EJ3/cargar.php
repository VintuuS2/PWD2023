<?php

class cargaArchivo {
    public function analizarArchivo($archivo) {
        
        $rutaDestino = '../../archivos/' . $archivo;
        if (move_uploaded_file($_FILES['imagenPeli']['tmp_name'], $rutaDestino)) {
            return true; // Éxito al cargar y analizar el archivo
        } else {
            return false; // Error al mover el archivo
        }
    }
}
?>
