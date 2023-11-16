<?php
$titulo = "Compra cancelada";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
$datos = data_submitted();
if (isset($datos['idcompra']) && isset($datos['vuelta'])) {
    $linkVuelta = $datos['vuelta'];
    $controlCompra = new AbmCompra();
    $controlCompraEstado = new AbmCompraEstado();
    $controlCompraItem = new AbmCompraItem();
    $controlProducto = new AbmProducto();
    $itemsCarrito = $controlCompraItem->buscar($datos);
    // sumar stocks
    foreach ($itemsCarrito as $item) {
        $cantidadPedida = $item->getCantidad();
        $producto = $controlProducto->buscar(['idproducto' => $item->getObjProducto()->getIdProducto()])[0];
        $stockActual = $producto->getCantStock();
        $producto->setCantStock($stockActual + $cantidadPedida);
        $producto->modificar();
    }
    // se finaliza el estado actual
    $colCompraEstado = $controlCompraEstado->buscar(['idcompra' => $datos['idcompra'], 'idcompraestadotipo' => 5]);
    $ultimoEstado = $colCompraEstado[count($colCompraEstado)-1];
    $ultimoEstado->finalizar();
    // crear nuevo compraestado con compraestadotipo 'cancelada'
    $compra = $controlCompra->buscar($datos)[0];
    $controlCompraEstado->alta(['idcompraestado' => 0, 'idcompra' => $compra->getIdCompra(), 'idcompraestadotipo' => 4, 'cefechaini' => NULL, 'cefechafin' => NULL]);
    // se finaliza el nuevo estado
    $colCompraEstado = $controlCompraEstado->buscar(['idcompra' => $datos['idcompra'], 'idcompraestadotipo' => 5]);
    $estadoCancelada = $colCompraEstado[count($colCompraEstado)-1];
    $estadoCancelada->finalizar();
    $mensaje = "Se cancelo la compra correctamente";
} else {
    $mensaje = "Error: no se han recibido los datos necesarios para cancelar la compra.";
}
header('Location: ' . $urlRoot . "Vista/$linkVuelta");

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
                <a class='btn btn-primary mx-3 fs-5' role='button' href='../<?php echo $linkVuelta ?>'>Volver</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>