<?php
$titulo = "Añadir producto carrito";
include_once "../../../configuracionProyecto.php";
include_once "../Estructura/header.php"; // hay que hacer la verificación de que el usuario loggeado tenga rol de 'deposito'
include_once "../../configuracion.php";
$sesion = new Session();
if (!$sesion->validar()) {
    header('Location: ' . $urlRoot . "Vista/login.php");
} else {
    $controlCompraEstado = new AbmCompraEstado();
    $controlCompraItem = new AbmCompraItem();
    $controlCompra = new AbmCompra();
    $datos = data_submitted();
    if (isset($datos['idproducto'])) {
        $usuario = $sesion->getUserObj();
        $idUsuario = $usuario->getId();
        $idProducto = $datos['idproducto'];
        $comprasCliente = $controlCompra->buscar(['idusuario' => $idUsuario]);
        // Si el cliente no tiene compras, se crea una nueva compra con el compraestadotipo de carrito
        if (count($comprasCliente) === 0) {
            crearCarrito($idUsuario, $idProducto); 
        } else { // Si tiene compras se busca la ultima compra que solo tenga compraestadotipo de carrito
            $posibleCarrito = $comprasCliente[count($comprasCliente) - 1];
            if (count($controlCompraEstado->buscar(['idcompra' => $posibleCarrito->getIdCompra()])) === 1) { // ya existe un carrito
                $objCompraCarrito = $posibleCarrito;
                $colCompraItems = $controlCompraItem->buscar(['idcompra'=>$objCompraCarrito->getIdCompra(),'idproducto'=>$idProducto]);
                // Verifico si ya existe el producto que se esta intentando agregar
                if (count($colCompraItems) != 0) {
                    $objCompraItem = $colCompraItems[0];
                    // se suma 1 a la cantidad
                    $objCompraItem->setCantidad($objCompraItem->getCantidad()+1);
                    $objCompraItem->modificar();
                } else {
                    $controlCompraItem->alta(['idcompraitem' => 0, 'idproducto' => $idProducto, 'idcompra' => $objCompraItem->getIdCompra(), 'cicantidad' => 1]);
                }
            } else {
                crearCarrito($idUsuario, $idProducto);
            }
        }
    header('Location: ' . $urlRoot . "Vista/Cliente/carrito.php");
    } else {
        $mensaje = "ERROR: No se pudo añadir el producto al carrito.";
    }
}
function crearCarrito($idUsuario, $idProducto)
{
    $controlCompra = new AbmCompra();
    $controlCompraEstado = new AbmCompraEstado();
    $controlCompraItem = new AbmCompraItem();
    // Se crea nueva compra
    $controlCompra->alta(['idcompra' => 0, 'cofecha' => null, 'idusuario' => $idUsuario]);
    $compra = $controlCompra->buscar(['idusuario' => $idUsuario])[0];
    // Se crea nuevo estado para la compra (carrito)
    $controlCompraEstado->alta(['idcompraestado' => 0, 'idcompra' => $compra->getIdCompra(), 'idcompraestadotipo' => 5, 'cefechaini' => NULL, 'cefechafin' => NULL]);
    // Se agrega el item al carrito (compraitem)
    $controlCompraItem->alta(['idcompraitem' => 0, 'idproducto' => $idProducto, 'idcompra' => $compra->getIdCompra(), 'cicantidad' => 1]);
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
                <a class="btn btn-primary mx-3 fs-5" role="button" href="../Cliente/productos.php">Volver atrás</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>