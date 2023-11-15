<?php
$titulo = "Producto eliminado";
include_once "../../../configuracionProyecto.php";
include_once "../Estructura/header.php"; // hay que hacer la verificación de que el usuario loggeado tenga rol de 'deposito'
include_once "../../configuracion.php";
$datos = data_submitted();
if (isset($datos['idproducto'])) {
    $controlProducto = new AbmProducto();
    $producto = $controlProducto->buscar($datos)[0];

    $nombre_imagen = $producto->getImagen();
    $ruta_destino = '../../Imagenes/' . $nombre_imagen;
    if (file_exists($ruta_destino)) {
        // Elimina la imagen que tenia ese producto
        if (unlink($ruta_destino)) {
            // Elimina el producto de la base de datos
            if ($controlProducto->baja($datos)) {
                $mensaje = "El producto se ha eliminado correctamente.";
            } else {
                $mensaje = "Hubo un error y no se pudo eliminar el producto.";
            }
        } else {
            $mensaje = "Hubo un error y no se pudo borrar el archivo $nombre_imagen.";
        }
    } else {
        echo "Hubo un error: El archivo $nombre_imagen no existe.";
    }
} else {
    $mensaje = "ERROR: No se han recibido todos los datos necesarios.";
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
            <div class="d-flex align-content justify-content-center">
                <a class="btn btn-primary mx-3 fs-5" role="button" href="../Deposito/administrarProductos.php">Volver a administrar productos</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>