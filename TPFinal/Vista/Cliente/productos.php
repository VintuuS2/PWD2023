<?php
$titulo = "Productos";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/ultimoNav.php"; 
?>
<div class="d-flex justify-content-center align-items-center ">
    <div class="d-flex justify-content-center bg-gris col-12 col-md-8 position-relative h-100 align-items-center min-vh-100 row row-cols-1">
        <?php
        $controlProducto = new AbmProducto();
        $colProductos = $controlProducto->buscar(null);
        if (count($colProductos) > 0) {
            foreach ($colProductos as $unProducto) {
                $hayStock = $unProducto->getCantStock() !== 0;
                echo "<div class='col p-3 col-xxl-3 col-xl-4 col-sm-6'>
                        <div class='bg-white p-2 rounded text-black'>
                            <img src='../Imagenes/".$unProducto->getImagen()."' class='card-img-top' alt='imagen ".$unProducto->getNombre()."'>
                            <div class='card-body'>
                                <h3 class='card-title fs-4'>".$unProducto->getNombre()."</h3>
                                <p class='card-text mb-0'>".$unProducto->getDetalle()."</p>
                                <p class='card-text mb-0 fs-4 text-success fw-bold'>$".$unProducto->getPrecio()." US</p>
                                <div class='text-center'>
                                    <form method='post' action='../Accion/aniadirProductoCarrito.php'>
                                        <input type='hidden' name='idproducto' id='idproducto' value='".$unProducto->getIdProducto()."'>
                                        <button type='submit' ".($hayStock ? "" : "disabled")." class='btn btn-".($hayStock ? "primary" : "danger")." col-12 fs-5'>".($hayStock ? "<i class='fa fa-shopping-cart me-2' aria-hidden='true'></i> Añadir al carrito" : "Sin stock")."</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            echo "<h3 class='text-center text-dark'>No hay productos</h3>";
        }
        ?>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>