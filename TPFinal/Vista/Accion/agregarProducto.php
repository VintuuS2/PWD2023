<?php
$titulo = "Producto agregado";
include_once "../../../configuracionProyecto.php";
include_once "../Estructura/header.php"; // hay que hacer la verificación de que el usuario loggeado tenga rol de 'deposito'
include_once "../../configuracion.php";
$datos = data_submitted();
if (isset($datos['idproducto']) && isset($datos['pronombre']) && isset($datos['prodetalle']) && isset($datos['procantstock']) && isset($datos['proprecio']) && isset($_FILES['proimagen'])) {
    $nombre = $datos['pronombre'];
    $detalle = $datos['prodetalle'];
    $cantStock = $datos['procantstock'];
    $precio = $datos['proprecio'];
    $imagen = $_FILES['proimagen'];

    $nombre_archivo = $imagen['name'];
    $ruta_destino = '../../Imagenes/' . $nombre_archivo;
    if (file_exists($ruta_destino)) {
        $mensaje = "Ya hay una imagen con ese nombre, suba la imagen con otro nombre o suba otra imagen.";
    } else {
        if (move_uploaded_file($imagen['tmp_name'], $ruta_destino)) {
            $controlProducto = new AbmProducto();
            $datos['proimagen'] = $_FILES['proimagen'];
            if ($controlProducto->alta($datos)) {
                $mensaje = "El producto se ha cargado correctamente.";
            } else {
                $mensaje = "Hubo un error y no se pudo cargar el producto.";
            }
        } else {
            $mensaje = "Hubo un error y no se pudo subir la imagen.";
        }
    }
    
} else {
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
            <div class="d-flex align-content justify-content-center">
                <a class="btn btn-primary mx-3 fs-5" role="button" href="../Deposito/agregarProductos.php">Volver atrás</a>
                <a class="btn btn-primary mx-3 fs-5" role="button" href="../Deposito/administrarProductos.php">Ver lista de productos</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>