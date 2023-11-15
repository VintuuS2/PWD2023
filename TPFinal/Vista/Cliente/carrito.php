<?php
$titulo = "Mi carrito";
include_once "../../../configuracionProyecto.php";
include_once "../Estructura/header.php";
include_once "../Estructura/ultimoNav.php";
include_once "../../configuracion.php";
$sesion = new Session();
if (!$sesion->validar()) {
    header('Location: ' . $urlRoot . "Vista/login.php");
} else {
    $usuario = $sesion->getUserObj(); // Obtengo el user actual
    $idUsuario = $usuario->getId();
    $controlCompra = new AbmCompra();
    $controlCompraEstado = new AbmCompraEstado();
    $controlCompraItem = new AbmCompraItem();
    $controlProducto = new AbmProducto();
    $comprasCliente = $controlCompra->buscar(['idusuario' => $idUsuario]);
    $posibleCarrito = $comprasCliente[count($comprasCliente) - 1];
    $existeCarrito = false;
    if (count($controlCompraEstado->buscar(['idcompra' => $posibleCarrito->getIdCompra()])) === 1) { // ya existe un carrito
        $existeCarrito = true;
        $objCompra = $posibleCarrito;
    }
    $itemsCarrito = $controlCompraItem->buscar(['idcompra'=>$objCompra->getIdCompra()]);
    $cantidadItems = count($itemsCarrito);
}
?>
<section class="min-vh-100">
    <div class="container py-5 h-100 d-flex justify-content-center">
        <div class="row d-flex justify-content-center align-items-center h-100 col-12">
            <div class="card card-registration card-registration-2 bg-light text-dark rounded-5 p-0">
                <div class="card-body p-0">
                    <div class="row g-0">
                        <div class="col-lg-8">
                            <div class="p-5">
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h1 class="fw-bold mb-0 text-black">Carrito de compras</h1>
                                    <h6 class="mb-0 text-black-50"><?php echo ($existeCarrito ? $cantidadItems : "Sin") ?> producto<?php if ($cantidadItems !== 1) { echo "s";} ?></h6>
                                </div>
                                <hr class="my-4">

                                <?php
                                if ($cantidadItems == 0) {
                                    echo "<h3 class='text-center'>El carrito está vacio</h3>";
                                } else {
                                    $precioTotal = 0;
                                    foreach ($itemsCarrito as $item) {
                                        $id = $item->getIdCompraItem();
                                        $cantidad = $item->getCantidad();
                                        $producto = $item->getObjProducto();
                                        $img = $producto->getImagen();
                                        $nombre = $producto->getNombre();
                                        $detalle = $producto->getDetalle();
                                        $precio = $producto->getPrecio();
                                        $precioTotal += $precio*$cantidad;
                                        echo "<div class='row mb-4 d-flex justify-content-between align-items-center position-relative'>
                                        <div class='col-md-2 col-lg-2 col-xl-2'>
                                            <img src='../../Imagenes/$img' class='img-fluid rounded-3' alt='$nombre'>
                                        </div>
                                        <div class='col-md-6 col-lg-6 col-xl-7'>
                                            <h5 class='text-black mb-0'>$nombre</h5>
                                            <h6 class='text-black-50'>$detalle</h6>
                                        </div>
                                        <div class='col-md-3 col-lg-3 col-xl-2 d-flex'>
                                            <button class='btn btn-link px-1' onclick=\"this.parentNode.querySelector('input[type=number]').stepDown()\">
                                                <i class='fas fa-minus fs-5'></i>
                                            </button>
    
                                            <input id='inputCantidad$id' min='1' name='cantidad' value='$cantidad' type='number' class='form-control form-control-sm text-center' />
    
                                            <button class='btn btn-link px-1' onclick=\"this.parentNode.querySelector('input[type=number]').stepUp()\">
                                                <i class='fas fa-plus fs-5'></i>
                                            </button>
                                        </div>
                                        <div class='col-md-1 col-lg-1 col-xl-1 text-center p-0'>
                                            <h6 class='d-inline m-0' id='precioTotal$id'>$ ".$precio*$cantidad."</h6>
                                        </div>
                                        <a href='#!' style='left: 92%' class='text-danger w-auto fs-2 d-block position-absolute top-0'><i class='fas fa-times'></i></a>
                                    </div>
    
                                    <hr class='my-4'>";
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
                                    <h5 class="text-uppercase"><?php echo ($existeCarrito ? $cantidadItems : "Sin") ?> producto<?php if ($cantidadItems !== 1) { echo "s";} ?></h5>
                                    <h5>$ <?php echo $precioTotal ?></h5>
                                </div>

                                <h5 class="text-uppercase mb-3">Shipping</h5>

                                <div class="mb-4 pb-2">
                                    <select class="select">
                                        <option value="1">Standard-Delivery- €5.00</option>
                                        <option value="2">Two</option>
                                        <option value="3">Three</option>
                                        <option value="4">Four</option>
                                    </select>
                                </div>

                                <hr class="my-4">

                                <div class="d-flex justify-content-between mb-5">
                                    <h5 class="text-uppercase">Precio total</h5>
                                    <h5>$ 137.00</h5>
                                </div>

                                <button type="button" class="btn btn-success btn-block btn-lg">Finalizar compra</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
include_once "../../../vista/estructura/footer.php"
?>