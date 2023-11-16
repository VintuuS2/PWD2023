<?php
$titulo = "Item eliminado";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";

$datos = data_submitted();
if (isset($datos['idcompraitem'])) {
    print_r($datos);
    $controlCompraItem = new AbmCompraItem();
    $item = $controlCompraItem->buscar($datos)[0];
    // Elimina el item del carrito de la base de datos
    if ($controlCompraItem->baja($datos)) {
        $mensaje = "El item se ha eliminado correctamente.";
    } else {
        $mensaje = "Hubo un error y no se pudo eliminar el item.";
    }
} else {
    $mensaje = "ERROR: No se pudo borrar el item del carrito de compras";
}
header('Location: ' . $urlRoot . "Vista/Cliente/carrito.php");
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
                <a class="btn btn-primary mx-3 fs-5" role="button" href="../Cliente/carrito.php">Volver al carrito</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>