<?php
$titulo = "Administrar productos";
include_once "../../configuracionProyecto.php";
include_once "./Estructura/header.php";
include_once "./Estructura/navbar.php"; // hay que hacer la verificación de que el usuario loggeado tenga rol de 'deposito'
include_once "../configuracion.php";
?>
<div class="d-flex justify-content-center align-items-center ">
    <div class="d-flex justify-content-center bg-gris col-12 col-md-8 position-relative h-100 align-items-center min-vh-100 row row-cols-1">
        <?php
        $controlProducto = new AbmProducto();
        $colProductos = $controlProducto->buscar(null);
        if (count($colProductos) > 0) {
            foreach ($colProductos as $unProducto) {
                echo "<div class='col p-4 col-xl-4 col-sm-6'>
                        <div class='bg-white p-2 rounded text-black'>
                            <img src='../Imagenes/".$unProducto->getImagen()."' class='card-img-top' alt='imagen ".$unProducto->getNombre()."'>
                            <div class='card-body'>
                                <h4 class='card-title'>".$unProducto->getNombre()."</h5>
                                <p class='card-text mb-0'>".$unProducto->getDetalle()."</p>
                                <p class='card-text text-primary-emphasis fw-bold mb-0'> Stock: ".$unProducto->getCantStock()." unidades.</p>
                                <p class='card-text mb-0 text-success fw-bold'>$".$unProducto->getPrecio()." US</p>
                                <div class='text-center row'>
                                    <form method='post' action='Accion/formModificarProducto.php' class='col-6'>
                                        <input type='hidden' name='idproducto' id='idproducto' value='".$unProducto->getIdProducto()."'>
                                        <button type='submit' class='btn btn-primary mt-1'>Modificar datos</button>
                                    </form>
                                    <form method='post' action='Accion/eliminarProducto.php' class='col-6'>
                                        <input type='hidden' name='idproducto' id='idproducto' value='".$unProducto->getIdProducto()."'>
                                        <button type='submit' class='btn btn-danger mt-1'>Eliminar producto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            echo "<h3 class='text-center'>No hay productos guardados</h3>
            <div class='d-flex align-content justify-content-center'>
                <a class='btn btn-primary mx-3 fs-5' role='button' href='./depositoAgregarProductos.php'>Agregar productos</a>
            </div>";
        }
        ?>
    </div>
</div>
<?php
include_once "../../vista/estructura/footer.php"
?>