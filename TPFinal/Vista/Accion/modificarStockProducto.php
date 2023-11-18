<?php
$titulo = "Stock cambiado";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
$datos = data_submitted();
if (isset($datos['idproducto']) && isset($datos['procantstock'])) {
    $cantStock = $datos['procantstock'];

    $controlProducto = new AbmProducto();
    if ($controlProducto->modificacionStock($datos)) {
        $mensaje = "Se ha modificado el stock del producto correctamente.";
    } else {
        $mensaje = "Hubo un error y no se pudo modificar el stock del producto.";
    }
} else {
    $mensaje = "ERROR: No se han recibido todos los datos necesarios.";
}
header('Location: ' . $urlRoot . "Vista/Deposito/cambiarStocks.php");

?>
<div class="d-flex justify-content-center align-items-center ">
    <div class="d-flex justify-content-center row col-12 col-md-8 row position-relative h-100 align-items-center min-vh-100">
        <div class="bg-grupo1 p-5 rounded-5 col-12 col-md-10 col-xl-8">
            <div class="h3 text-center text-white mb-5">
                <?php
                echo $mensaje
                ?>
            </div>
            <div class="d-flex align-content justify-content-center">
                <a class="btn btn-primary mx-3 fs-5" role="button" href="../Deposito/cambiarStocks.php">Volver atrás</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>