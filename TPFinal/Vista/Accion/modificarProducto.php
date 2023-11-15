<?php
$titulo = "Producto modificado";
include_once "../../../configuracionProyecto.php";
include_once "../Estructura/header.php"; // hay que hacer la verificación de que el usuario loggeado tenga rol de 'deposito'
include_once "../../configuracion.php";
$datos = data_submitted();
$error = false;
if (isset($datos['idproducto']) && isset($datos['pronombre']) && isset($datos['prodetalle']) && isset($datos['procantstock']) && isset($datos['proprecio'])) {
    $nombre = $datos['pronombre'];
    $detalle = $datos['prodetalle'];
    $cantStock = $datos['procantstock'];
    $precio = $datos['proprecio'];

    $nombreImagen = $datos['nombreimagen'];
    $rutaArchivo = "../../Imagenes/" . $nombreImagen;
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
    $ruta_destino = '../../Imagenes/' . $nombre_archivo;
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
    $mensaje = "No se han recibido todos los datos necesarios, por favor vuelva al formulario y completelo nuevamente.";
}
?>
<div class="d-flex justify-content-center align-items-center ">
    <div class="d-flex justify-content-center bg-gris row col-12 col-md-8 row position-relative h-100 align-items-center min-vh-100">
        <div class="bg-dark p-5 rounded-5 col-12 col-md-10 col-xl-8">
            <div class="h3 text-center text-white mb-5">
                <?php
                echo $mensaje
                ?>
            </div>
            <?php
            if ($error) {
                echo "<div class='d-flex align-content justify-content-center'>
                        <form method='post' action='./formModificarProducto.php'>
                            <input type='hidden' name='idproducto' id='idproducto' value='" . $datos['idproducto'] . "'>
                            <button type='submit' class='btn btn-primary mx-3 fs-5'>Volver a intentar modificar el producto</button>
                        </form>
                    </div>";
            } else {
                echo "<div class='d-flex align-content justify-content-center'>
                        <a class='btn btn-primary mx-3 fs-5' role='button' href='../Deposito/administrarProductos.php'>Volver a la lista de productos</a>
                    </div>";
            }
            ?>

        </div>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>