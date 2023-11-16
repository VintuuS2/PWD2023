<?php
$titulo = "Alterar compra";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
$controlCompraEstado = new AbmCompraEstado();
$controlCompraItem = new AbmCompraItem();
$controlProducto = new AbmProducto();
$controlCompra = new AbmCompra();
$datos = data_submitted();
if (isset($datos['idcompra'])) {
    $colItemsCancelar = array();
    $compra = $controlCompra->buscar($datos)[0];
    $itemsCompra = $controlCompraItem->buscar($datos);
    $idcompraestadotipo = false;
    foreach ($itemsCompra as $item) {
        $idProducto = $item->getObjProducto()->getIdProducto();
        $producto = $controlProducto->buscar(['idproducto' => $idProducto])[0];
        if ($datos[$idProducto] == 'Cancelar') { // Si un item llega con el dato cancelar
            $colItemsCancelar[] = $item; // Se agrega a lista de eliminar / cancelar
        } else if (!$idcompraestadotipo) {
            switch ($datos[$idProducto]) {
                case 'Aceptar':
                    $idcompraestadotipo = 2;
                    break;
                case 'Enviar':
                    $idcompraestadotipo = 3;
                    break;
                default:
                    $idcompraestadotipo = false;
                    break;
            }
        }
    }
    // si todos los items fueron cancelados
    if (count($itemsCompra) == count($colItemsCancelar)) {
        // No se eliminan los items
        foreach ($colItemsCancelar as $itemCancelar) {
            $idProducto = $itemCancelar->getObjProducto()->getIdProducto();
            $producto = $controlProducto->buscar(['idproducto' => $idProducto])[0];
            $cantidadItems = $itemCancelar->getCantidad();
            // Se suman los stocks
            $producto->setCantStock($producto->getCantStock() + $cantidadItems);
        }
        // Se finaliza el estado actual de la compra
        $colCompraEstado = $controlCompraEstado->buscar(['idcompra' => $datos['idcompra']]);
        $ultimoEstado = $colCompraEstado[count($colCompraEstado) - 1];
        $ultimoEstado->finalizar();
        // Se pone estado cancelada a la compra
        $controlCompraEstado->alta(['idcompraestado' => 0, 'idcompra' => $compra->getIdCompra(), 'idcompraestadotipo' => 4, 'cefechaini' => NULL, 'cefechafin' => NULL]);
        // se finaliza el nuevo estado cancelada
        $colCompraEstado = $controlCompraEstado->buscar(['idcompra' => $datos['idcompra'], 'idcompraestadotipo' => 5]);
        $estadoCancelada = $colCompraEstado[count($colCompraEstado) - 1];
        $estadoCancelada->finalizar();
        $mensaje = "Se canceló la compra.";
    } else { // Se eliminan solo los items cancelados
        foreach ($colItemsCancelar as $itemCancelar) {
            $idProducto = $itemCancelar->getObjProducto()->getIdProducto();
            $producto = $controlProducto->buscar(['idproducto' => $idProducto])[0];
            $cantidadItems = $itemCancelar->getCantidad();
            // Se suman los stocks
            $producto->setCantStock($producto->getCantStock() + $cantidadItems);
            // Se eliminan los items cancelados
            $itemCancelar->baja();
        }
        // Se finaliza el estado actual de la compra
        $colCompraEstado = $controlCompraEstado->buscar(['idcompra' => $datos['idcompra']]);
        $ultimoEstado = $colCompraEstado[count($colCompraEstado) - 1];
        $ultimoEstado->finalizar();

        // Se crea el nuevo estado de la compra
        $controlCompraEstado->alta(['idcompraestado' => 0, 'idcompra' => $compra->getIdCompra(), 'idcompraestadotipo' => $idcompraestadotipo, 'cefechaini' => NULL, 'cefechafin' => NULL]);   
        $controlCompraEstadoTipo = new AbmCompraEstadoTipo();
        $descripcionTipo = $controlCompraEstadoTipo->buscar(['idcompraestadotipo'=>$idcompraestadotipo])[0]->getDescripcion();
        $mensaje = "Se eliminaron " . count($colItemsCancelar).  " items de la compra y ahora la compra tiene estado '$descripcionTipo'";
    }
    
} else {
    $mensaje = "ERROR: No se pudo alterar la compra.";
}
header('Location: ' . $urlRoot . "Vista/Deposito/agregarProductos.php");

include_once "../../Vista/Deposito/administrarCompras.php";
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
                <a class="btn btn-primary mx-3 fs-5" role="button" href="../Deposito/administrarCompras.php">Volver a administrar las compras</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>