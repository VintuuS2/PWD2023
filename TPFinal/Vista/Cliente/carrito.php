<?php
$titulo = "Mi carrito";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../../Vista/Estructura/ultimoNav.php";

$usuario = $session->getUserObj();
$idUsuario = $usuario->getId();
$controlCompra = new AbmCompra();
$controlCompraEstado = new AbmCompraEstado();
$controlCompraItem = new AbmCompraItem();
$controlProducto = new AbmProducto();
$comprasCliente = $controlCompra->buscar(['idusuario' => $idUsuario]);
$existeCarrito = false;
if (count($comprasCliente) == 0) { // si no hay compras
    // Se crea nueva compra carrito
    $controlCompra->alta(['idcompra' => 0, 'cofecha' => null, 'idusuario' => $idUsuario]);
    $comprasUsuario = $controlCompra->buscar(['idusuario' => $idUsuario]);
    $objCompra = $comprasUsuario[count($comprasUsuario) - 1];
    // Se crea nuevo estado para la compra (carrito)
    $controlCompraEstado->alta(['idcompraestado' => 0, 'idcompra' => $objCompra->getIdCompra(), 'idcompraestadotipo' => 5, 'cefechaini' => NULL, 'cefechafin' => NULL]);
} else {
    $posibleCompraCarrito = $comprasCliente[count($comprasCliente) - 1];
    if (count($controlCompraEstado->buscar(['idcompra' => $posibleCompraCarrito->getIdCompra()])) === 1) { // ya existe un carrito
        $existeCarrito = true;
        $objCompra = $posibleCompraCarrito;
    } else { // no existe un carrito
        // Se crea nueva compra carrito
        $controlCompra->alta(['idcompra' => 0, 'cofecha' => null, 'idusuario' => $idUsuario]);
        $comprasUsuario = $controlCompra->buscar(['idusuario' => $idUsuario]);
        $objCompra = $comprasUsuario[count($comprasUsuario) - 1];
        // Se crea nuevo estado para la compra (carrito)
        $controlCompraEstado->alta(['idcompraestado' => 0, 'idcompra' => $objCompra->getIdCompra(), 'idcompraestadotipo' => 5, 'cefechaini' => NULL, 'cefechafin' => NULL]);
    }
}
$itemsCarrito = $controlCompraItem->buscar(['idcompra' => $objCompra->getIdCompra()]);
$cantidadItems = count($itemsCarrito);
$precioTotal = 0;

?>
<section class="min-vh-100">
    <div style="top: 100px;" class="z-3 row justify-content-center align-items-center position-fixed fixed-top mx-0 px-0">
        <div id="liveAlertPlaceholder" class="col-12 col-sm-10 col-md-7 col-xl-6 mt-5 text-center"></div>
    </div>
    <div class="container py-5 h-100 d-flex justify-content-center">
        <div class="row d-flex justify-content-center align-items-center h-100 col-12">
            <div class="card card-registration card-registration-2 bg-light text-dark rounded-5 p-0">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-8">
                            <div class="p-5">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h1 class="fw-bold mb-0 text-black">Carrito de compras</h1>
                                    <h6 class="mb-0 text-black-50"><?php echo ($existeCarrito ? $cantidadItems : "Sin") ?> producto<?php echo ($cantidadItems !== 1) ? "s" : ""; ?></h6>
                                </div>
                                <hr>

                                <?php
                                if ($cantidadItems == 0) {
                                    echo "<h3 class='text-center'>El carrito está vacio</h3>";
                                } else {
                                    foreach ($itemsCarrito as $item) {
                                        $id = $item->getIdCompraItem();
                                        $cantidad = $item->getCantidad();
                                        $producto = $item->getObjProducto();
                                        $img = $producto->getImagen();
                                        $nombre = $producto->getNombre();
                                        $detalle = $producto->getDetalle();
                                        $precio = $producto->getPrecio();
                                        $stock = $producto->getCantStock();
                                        $precioTotal += $precio * $cantidad;
                                        echo "<div class='row mb-4 d-flex justify-content-between align-items-center position-relative py-3'>
                                        <div class='col-md-2 col-lg-2 col-xl-2'>
                                            <img src='../Imagenes/$img' class='img-fluid rounded-3' alt='$nombre'>
                                        </div>
                                        <div class='col-md-6 col-lg-6 col-xl-7'>
                                            <h5 class='text-black mb-0'>$nombre</h5>
                                            <h6 class='text-black-50'>$detalle</h6>
                                        </div>
                                        <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
                                            <button class='btn btn-link px-1 botonRestar' data-product-id='$id'>
                                                <i class='fas fa-minus fs-5'></i>
                                            </button>

                                            <input id='inputCantidad$id' data-product-id='$id' data-product-name='$nombre' min='1' maximo='$stock' name='cantidad' value='$cantidad' type='number' class='cicantidad form-control form-control-sm text-center' />

                                            <button class='btn btn-link px-1 botonSumar' data-product-id='$id'>
                                                <i class='fas fa-plus fs-5'></i>
                                            </button>
                                        </div>
                                        <div class='col-md-1 col-lg-1 col-xl-1 text-center p-0'>
                                            <h6 class='d-inline m-0' id='precioTotal$id'>$ " . $precio * $cantidad . "</h6>
                                        </div>
                                        <form action='../Accion/eliminarItemCarrito.php' id='form$id' method='POST'>
                                            <input type='hidden' name='idcompraitem' id='idcompraitem' value='$id'>
                                            <button type='submit' style='left: 93%;' class='text-light w-auto fs-3 d-block position-absolute p-0 top-0 px-2 btn btn-danger' data-bs-toggle='tooltip' data-bs-placement='left' data-bs-title='Eliminar del carrito' data-bs-custom-class='custom-tooltip-danger'><i class='fas fa-times'></i></button>
                                        </form>
                                    </div>
    
                                    <hr>";
                                    }
                                }
                                ?>
                                <div class="pt-5">
                                    <h6 class="mb-0"><a href="productos.php" class="text-black-50"><i class="fas fa-long-arrow-alt-left me-2"></i>Volver a la tienda</a></h6>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 bg-grey rounded-5">
                            <div class="p-5">
                                <h3 class="fw-bold mb-5 mt-2 pt-1">Resumen</h3>
                                <hr class="my-4">

                                <div class="d-flex justify-content-between mb-4">
                                    <h5 class="text-uppercase"><?php echo ($existeCarrito ? $cantidadItems : "Sin") ?> producto<?php echo ($cantidadItems !== 1) ? "s" : ""; ?></h5>
                                </div>
                                <h4 class="pt-1">Envio gratuito por email</h4>
                                <hr class="my-4">

                                <div class="d-flex justify-content-between mb-5">
                                    <h5 class="text-uppercase">Precio total</h5>
                                    <h5>$ <?php echo $precioTotal ?></h5>
                                </div>
                                <div class="col-12">
                                    <form action="../Accion/finalizarCompra.php" method="post" id="formFinalizar">
                                        <input type="hidden" name="idcompra" id="idcompra" value="<?php echo $objCompra->getIdCompra() ?>">
                                        <button type="submit" class="btn btn-success btn-block btn-lg col-12">Finalizar compra</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script src="../JS/scriptCarrito.js"></script>
<script src="../JS/funciones.js"></script>
<?php
include_once "../../../vista/estructura/footer.php"
?>