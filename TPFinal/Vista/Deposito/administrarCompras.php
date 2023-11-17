<?php
$titulo = "Administrar compras";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/ultimoNav.php";
$controlCompraEstadoTipo = new AbmCompraEstadoTipo();
$controlCompraEstado = new AbmCompraEstado();
$controlCompraItem = new AbmCompraItem();
$controlProducto = new AbmProducto();
$controlUsuario = new AbmUsuario();
$controlCompra = new AbmCompra();
?>
<div class="d-flex justify-content-center align-items-center">
    <div class="d-flex justify-content-center row col-12 col-md-12 col-xl-8 row position-relative align-items-center min-vh-100">
        <?php
        $listaCompras = $controlCompra->buscar(null);
        if (count($listaCompras) > 0) {
            echo "<table class='table text-center'>
                        <thead class='table-primary'>
                            <tr>
                                <th colspan='6' class='table-primary text-center fs-4'>Compras</th>
                            </tr>
                            <tr>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Productos</th>
                                <th>Cambiar estado</th>
                                <th>Fechas</th>
                                <th>Cancelar compra</th>
                            </tr>
                        </thead>";
            foreach ($listaCompras as $compra) {
                $estadosCompras = $controlCompraEstado->buscar(['idcompra' => $compra->getIdCompra()]);
                $nombreUsuario = $controlUsuario->buscar(['idusuario'=>$compra->getObjUsuario()->getId()])[0]->getNombre();
                $objCompraEstado = $estadosCompras[count($estadosCompras) - 1];
                $estado = $objCompraEstado->getObjCompraEstadoTipo()->getDescripcion();

                if ($estado != "carrito") {
                    $idSiguienteEstado = (($objCompraEstado->getObjCompraEstadoTipo()->getIdCompraEstadoTipo()) + 1);
                    switch ($idSiguienteEstado) {
                        case 2:
                            $siguienteEstado = "Aceptar";
                            break;
                        case 3:
                            $siguienteEstado = "Enviar";
                            break;
                        default:
                            $siguienteEstado = false;
                            break;
                    };
                    $fechaInicioCompra = $objCompraEstado->getFechaIni();
                    $idCompra = $compra->getIdCompra();
                    $puedeCancelar = false;
                    if ($objCompraEstado->getObjCompraEstadoTipo()->getIdCompraEstadoTipo() > 0 && $objCompraEstado->getObjCompraEstadoTipo()->getIdCompraEstadoTipo() < 3) {
                        $puedeCancelar = true;
                    }
                    $items = $controlCompraItem->buscar(['idcompra' => $idCompra]);
                    echo "<tr class='align-middle table-light'>";
                    echo "<td>$nombreUsuario</td>";
                    echo "<td>$estado</td>";
                    echo "<td class='text-start'><form class='m-0' method='post' action='../Accion/alterarCompra.php'>";
                    echo "<input type='hidden' name='idcompra' id='idcompra' value='$idCompra'>";
                    foreach ($items as $unItem) {
                        $cantidad = $unItem->getCantidad();
                        $producto = $controlProducto->buscar(['idproducto' => $unItem->getObjProducto()->getIdProducto()])[0];
                        $idproducto = $producto->getIdProducto();
                        $nombreProducto = $producto->getNombre();
                        echo "x$cantidad $nombreProducto";
                        echo "<div class='float-end " . (!$siguienteEstado || ($siguienteEstado == "No cancelar" && count($items) == 1) ? "d-none" : "") . "' >";
                        echo "<div class='form-check-inline'>
                                <input class='form-check-input' checked type='radio' value='$siguienteEstado' name='$idproducto' id='radio1Estado$idproducto'>
                                <label class='form-check-label' for='radio1Estado$idproducto'>$siguienteEstado</label>
                            </div>
                            <div class='form-check-inline'>
                                <input class='form-check-input' type='radio' value='Cancelar' name='$idproducto' id='radio2Estado$idproducto'>
                                <label class='form-check-label' for='radio2Estado$idproducto'>Cancelar</label>
                            </div>";
                        echo "</div><br>";
                    }
                    echo "</td><td><button type='submit' class='btn btn-success' " . (!$siguienteEstado || ($siguienteEstado == "No cancelar" && count($items) == 1) ? "disabled" : "") . "><i class='fa fa-paper-plane' aria-hidden='true'></i>
                    </button></td>";
                    echo "</form>";
                    echo "<td>";
                    foreach ($estadosCompras as $unEstadoCompra) {
                        if ($unEstadoCompra->getObjCompraEstadoTipo()->getDescripcion() != "carrito") {
                            echo "<b>".$unEstadoCompra->getObjCompraEstadoTipo()->getDescripcion()."</b>: ".$unEstadoCompra->getFechaIni()."<br>";
                        }
                    }
                    echo "</td>";
                    echo "<td>
                            <form class='m-0' method='post' action='../Accion/cancelarCompra.php'>
                                <input type='hidden' name='" . ($puedeCancelar ? "idcompra" : "a") . "' id='" . ($puedeCancelar ? "idcompra" : "a") . "' value='" . ($puedeCancelar ? $idCompra : "") . "'>
                                <input type='hidden' name='vuelta' id='vuelta' value='Deposito/administrarCompras.php'> 
                                <button type='submit' class='btn btn-danger'" . ($puedeCancelar ? "" : "disabled") . " name='btncancelar'>Cancelar compra</button>
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