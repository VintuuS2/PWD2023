<?php
$titulo = "Cambiar stocks";
include_once "../../configuracionProyecto.php";
include_once "./Estructura/header.php";
include_once "./Estructura/ultimoNav.php"; // hay que hacer la verificación de que el usuario loggeado tenga rol de 'deposito'
include_once "../configuracion.php";
$controlProducto = new AbmProducto();
$listaProductos = $controlProducto->buscar(null);
?>
<div class="d-flex justify-content-center align-items-center">
    <div class="d-flex justify-content-center row col-12 col-md-12 col-xl-8 row position-relative align-items-center min-vh-100">
        <div style="top: 100px;" class="z-3 row justify-content-center align-items-center position-fixed fixed-top mx-0 px-0">
            <div id="liveAlertPlaceholder" class="col-12 col-sm-10 col-md-7 col-xl-6 mt-5 text-center"></div>
        </div>
        <?php
        if (count($listaProductos) > 0) {
            echo "<table class='table text-center'>
                        <thead class='table-primary'>
                            <tr>
                                <th colspan='4' class='table-primary text-center fs-4'>Productos</th>
                            </tr>
                            <tr>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Stock</th>
                                <th>Modificar stock</th>
                            </tr>
                        </thead>";
            foreach ($listaProductos as $producto) {
                echo "<tr class='align-middle table-light'>";
                echo "<form novalidate class='needs-validation bg-secondary' data-id=" . $producto->getIdProducto() . " method='post' action='Accion/modificarStockProducto.php'>";
                echo "<td class='p-0'><img class='imagen-redimensionada' src='../Imagenes/" . $producto->getImagen() . "'><input type='hidden' name='idproducto' value='" . $producto->getIdProducto() . "'></td>";
                echo "<td>" . $producto->getNombre() . "</td>";
                echo "<td><input disabled type='number' name='procantstock' id='procantstock".$producto->getIdProducto()."' class='form-control cursor-text bg-light text-dark border border-0 text-center rounded-5' value='" . $producto->getCantStock() . "'</td>";
                // Boton para activar modificación del stock
                echo "<td><div class='d-flex h-100 justify-content-around' id='columnaBotones" . $producto->getIdProducto() . "'><button type='submit' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='Cambiar el stock del producto' data-bs-custom-class='custom-tooltip' class='btn btn-primary btn-modificar' id='btn-modificar-" . $producto->getIdProducto() . "'>Editar</button></div></td>";
                echo "</form>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "<h3 class='text-center'>No hay productos registrados</h3>";
        }
        ?>
    </div>
</div>
<script src="JS/scriptCambiarStocks.js"></script>
<script src="JS/funciones.js"></script>
<?php
include_once "../../vista/estructura/footer.php"
?>