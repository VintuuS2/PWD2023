<?php
$titulo = "Mis compras";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/ultimoNav.php";
$usuario = $session->getUserObj();
$controlCompra = new AbmCompra();
$controlCompraEstado = new AbmCompraEstado;
$listaCompras = $controlCompra->buscar(['idusuario' => $usuario->getId()]);
// busco si al menos una compra no es un carrito
$i = 0;
$encontroCompra = false;
while (!$encontroCompra && $i < count($listaCompras)) {
    $unaCompra = $listaCompras[$i];
    $estadosCompras = $controlCompraEstado->buscar(['idcompra' => $unaCompra->getIdCompra()]);
    if (count($estadosCompras) > 1) {
        $encontroCompra = true;
    }
    $i++;
}
?>
<div class="d-flex justify-content-center align-items-center">
    <div class="d-flex justify-content-center row col-12 col-md-12 col-xl-8 row position-relative align-items-center min-vh-100">
        <?php
        $controlCompraItem = new AbmCompraItem;
        $controlProducto = new AbmProducto;
        if ($encontroCompra) {
            echo "<table class='table text-center'>
                        <thead class='table-primary'>
                            <tr>
                                <th colspan='4' class='table-primary text-center fs-4'>Mis compras</th>
                            </tr>
                            <tr>
                                <th>Estado</th>
                                <th>Productos</th>
                                <th>Fecha de compra</th>
                                <th>Cancelar compra</th>
                            </tr>
                        </thead>";
            foreach ($listaCompras as $compra) {
                $estadosCompras = $controlCompraEstado->buscar(['idcompra' => $compra->getIdCompra()]);
                $objCompraEstado = $estadosCompras[count($estadosCompras) - 1];
                $estado = $objCompraEstado->getObjCompraEstadoTipo()->getDescripcion();
                $fechaInicioCompra = $objCompraEstado->getFechaIni();
                $puedeCancelar = false;
                if ($objCompraEstado->getObjCompraEstadoTipo()->getIdCompraEstadoTipo() === 1) {
                    $puedeCancelar = true;
                }
                if ($estado != "carrito") {
                    $items = $controlCompraItem->buscar(['idcompra' => $compra->getIdCompra()]);
                    echo "<tr class='align-middle table-light'>";
                    echo "<td>$estado</td>";
                    echo "<td>";
                    foreach ($items as $unItem) {
                        $cantidad = $unItem->getCantidad();
                        $producto = $controlProducto->buscar(['idproducto' => $unItem->getObjProducto()->getIdProducto()])[0];
                        $nombreProducto = $producto->getNombre();
                        echo "x$cantidad $nombreProducto <br>";
                    }
                    echo "</td>";
                    echo "<td>$fechaInicioCompra</td>";
                    echo "<td>
                            <form class='m-0' method='post' action='../Accion/cancelarCompra.php'>
                                <input type='hidden' name='".($puedeCancelar ? "idcompra" : "a")."' id='".($puedeCancelar ? "idcompra" : "a")."' value='".($puedeCancelar ? $compra->getIdCompra() : "")."'> 
                                <input type='hidden' name='vuelta' id='vuelta' value='Cliente/compras.php'> 
                                <button type='submit' class='btn btn-danger'".($puedeCancelar ? "" : "disabled")." name='btncancelar'>Cancelar compra</button>
                            </form>
                        </td>";
                }
            }
            echo "</table>";
        } else {
            echo "<div class='d-flex align-content justify-content-center'>
                    <h3 class='text-center'>No tienes compras</h3>
                    <a class='btn btn-primary mx-3 fs-5' role='button' href='./productos.php'>Explorar productos</a>
                </div>";
        }
        ?>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>