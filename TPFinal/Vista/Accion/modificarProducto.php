<?php
$titulo = "Producto modificado";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
$datos = data_submitted();
$error = false;
if (isset($datos['idproducto']) && isset($datos['pronombre']) && isset($datos['prodetalle']) && isset($datos['procantstock']) && isset($datos['proprecio'])) {
    $nombre = $datos['pronombre'];
    $detalle = $datos['prodetalle'];
    $cantStock = $datos['procantstock'];
    $precio = $datos['proprecio'];

    $nombreImagen = $datos['nombreimagen'];
    $rutaArchivo = "../Imagenes/" . $nombreImagen;
    if ($_FILES['proimagen']['name'] === "") {
        $imagenInfo = pathinfo($rutaArchivo);
        $imagen = array(
            'name'      => $imagenInfo['basename'],
            'full_path' => $imagenInfo['dirname'],
            'type'      => mime_content_type($rutaArchivo),
            'error'     => 0,
            'size'      => filesize($rutaArchivo)
        );
    } else {
        $imagen = $_FILES['proimagen'];
    }
    $datos['proimagen'] = $imagen;
    $nombre_archivo = $imagen['name'];
    $ruta_destino = '../Imagenes/' . $nombre_archivo;
    // Si no existe la imagen (se cambió la imagen)
    if (!(file_exists($ruta_destino))) {
        // Se borra la foto anterior
        if (file_exists($rutaArchivo)) {
            // Intentar borrar el archivo
            if (unlink($rutaArchivo)) {
                // Se sube la nueva foto
                if (move_uploaded_file($imagen['tmp_name'], $ruta_destino)) {
                    $controlProducto = new AbmProducto();
                    if ($controlProducto->modificacion($datos)) {
                        $mensaje = "El producto se ha modificado correctamente.";
                    } else {
                        $error = true;
                        $mensaje = "Hubo un error y no se pudo modificar el producto.";
                    }
                } else {
                    $error = true;
                    $mensaje = "Hubo un error y no se pudo subir la nueva imagen.";
                }
            } else {
                $error = true;
                $mensaje = "Hubo un error y no se pudo borrar el archivo $nombreImagen.";
            }
        } else {
            $error = true;
            echo "Hubo un error: El archivo $nombreImagen no existe.";
        }
    } else { // si ya existe la imagen (no se modificó)
        $controlProducto = new AbmProducto();
        if ($controlProducto->modificacion($datos)) {
            $mensaje = "El producto se ha modificado correctamente.";
        } else {
            $error = true;
            $mensaje = "Hubo un error y no se pudo modificar el producto.";
        }
    }
} else {
    $error = true;
}
header('Location: ' . $urlRoot . "Vista/Deposito/administrarProductos.php");
?>