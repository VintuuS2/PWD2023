<?php
$titulo = "Compra realizada";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
$datos = data_submitted();
if (isset($datos['idcompra'])) {
    $controlCompra = new AbmCompra();
    $controlCompraEstado = new AbmCompraEstado();
    $controlCompraItem = new AbmCompraItem();
    $controlProducto = new AbmProducto();
    // verificar los stocks
    $itemsCarrito = $controlCompraItem->buscar($datos);
    $i = 0;
    $encontroErrorStock = false;
    while (!$encontroErrorStock && $i < count($itemsCarrito)) {
        $unItem = $itemsCarrito[$i];
        $cantidadPedida = $unItem->getCantidad();
        $producto = $controlProducto->buscar(['idproducto' => $unItem->getObjProducto()->getIdProducto()])[0];
        $stockActual = $producto->getCantStock();
        if ($cantidadPedida > $stockActual) {
            $encontroErrorStock = true;
        }
        $i++;
    }
    if ($encontroErrorStock) {
        $mensaje = "Error: al menos uno de los articulos que intentó comprar no cuenta con el stock suficiente, vuelva y reintente la compra.";
        $mensajeBoton = "<a class='btn btn-primary mx-3 fs-5' role='button' href='../Cliente/carrito.php'>Volver al carrito</a>";
    } else {
        // restar stocks
        foreach ($itemsCarrito as $item) {
            $cantidadPedida = $item->getCantidad();
            $producto = $controlProducto->buscar(['idproducto' => $item->getObjProducto()->getIdProducto()])[0];
            $stockActual = $producto->getCantStock();
            $producto->setCantStock($stockActual - $cantidadPedida);
            $producto->modificar();
        }
        // finalizar carrito
        $compraEstadoCarrito = $controlCompraEstado->buscar(['idcompra' => $datos['idcompra'], 'idcompraestadotipo' => 5])[0];
        $compraEstadoCarrito->finalizar();
        // crear nuevo compraestado
        $compra = $controlCompra->buscar($datos)[0];
        $controlCompraEstado->alta(['idcompraestado' => 0, 'idcompra' => $compra->getIdCompra(), 'idcompraestadotipo' => 1, 'cefechaini' => NULL, 'cefechafin' => NULL]);
        $mensaje = "La compra se realizo correctamente.";
        $mensajeBoton = "<a class='btn btn-primary mx-3 fs-5' role='button' href='../Cliente/compras.php'>Ver mis compras</a>";
    }
} else {
    $mensaje = "Error: no se han recibido los datos necesarios para finalizar la compra.";
    $mensajeBoton = "<a class='btn btn-primary mx-3 fs-5' role='button' href='../Cliente/carrito.php'>Volver al carrito</a>";
}
header('Location: ' . $urlRoot . "Vista/Cliente/compras.php");

include_once "../Estructura/ultimoNav.php";
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
                <?php
                echo $mensajeBoton;
                ?>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>