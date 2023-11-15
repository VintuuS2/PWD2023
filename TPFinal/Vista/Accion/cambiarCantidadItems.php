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
    print_r($datos);
    if (isset($datos['idcompraitem']) && isset($datos['cicantidad'])) {
        if ($datos['cicantidad'] == 0) {
            $controlCompraItem->baja($datos);
        } else {
            $objCompraItem = $controlCompraItem->buscar(['idcompraitem'=>$datos['idcompraitem']])[0];
            $objCompraItem->setCantidad($datos['cicantidad']);
            $objCompraItem->modificar();
        }
        header('Location: ' . $urlRoot . "Vista/Cliente/carrito.php");
    } else {
        $mensaje = "ERROR: No se pudo añadir el producto al carrito.";
    }
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