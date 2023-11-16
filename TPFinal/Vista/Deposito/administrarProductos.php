<?php
$titulo = "Administrar productos";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/ultimoNav.php";
$datos = data_submitted();
$mensajeForm = "";
$activarModal = false;
if (isset($datos['idproducto'])) {
    $controlProducto = new AbmProducto();
    $producto = $controlProducto->buscar($datos)[0];
    $id = $producto->getIdProducto();
    $nombre = $producto->getNombre();
    $detalle = $producto->getDetalle();
    $cantStock = $producto->getCantStock();
    $precio = $producto->getPrecio();
    $nombreImagen = $producto->getImagen();

    $mensajeForm = "<form action='../Accion/modificarProducto.php' id='form' method='POST' class='col-12 needs-validation p-4 rounded-5 gap-3 m-0' novalidate enctype='multipart/form-data'>
    <h2 class='mt-1 mb-4 text-center text-primary' style='text-wrap: balance;'>Modificar datos del producto</h2>
    <input type='hidden' name='idproducto' id='idproducto' required value='" . $id . "'>
    <div class='input-group mb-3'>
      <span class='input-group-text bg-secondary-emphasis fw-bold border-0 text-info' id='basic-addon1'>Nombre</span>
      <input type='text' class='form-control' name='pronombre' id='pronombre' maxlength='50' required value='" . $nombre . "' placeholder='Nombre del producto' aria-describedby='basic-addon1'>
      <div class='invalid-feedback'>
        Debe ingresar un nombre para el producto
      </div>
    </div>
    <div class='input-group mb-3'>
      <span class='input-group-text bg-secondary-emphasis fw-bold border-0 text-info' id='basic-addon2'>Detalles</span>
      <textarea type='text' class='form-control' name='prodetalle' id='prodetalle' maxlength='512' rows='4' required value='" . $detalle . "' placeholder='Detalles del producto' aria-describedby='basic-addon2' style='resize: none;'></textarea>
      <div class='invalid-feedback'>
        Debe ingresar un detalle para el producto
      </div>
    </div>
    <div class='input-group mb-3'>
      <span class='input-group-text bg-secondary-emphasis fw-bold border-0 text-info' id='basic-addon3'>Cantidad de stock</span>
      <input type='number' class='form-control' name='procantstock' id='procantstock' value='" . $cantStock . "' required min='0' placeholder='Cantidad de stock actual' aria-describedby='basic-addon3'>
      <div class='invalid-feedback'>
        Debe ingresar una cantidad de stock válida
      </div>
    </div>
    <div class='input-group mb-3'>
      <span class='input-group-text bg-secondary-emphasis fw-bold border-0 text-info' id='basic-addon4'>Precio</span>
      <input type='number' class='form-control' name='proprecio' id='proprecio' required min='0' value='" . $precio . "' placeholder='Precio del producto en dolares' aria-describedby='basic-addon4'>
      <div class='invalid-feedback'>
        Debe ingresar un precio válido
      </div>
    </div>
    <div class='input-group mb-3 align-items-center'>
      <div class='col-3 p-0' style='display: inline-table;'>
        <span class='input-group-text bg-secondary-emphasis fw-bold border-0 text-info rounded rounded-bottom-0 text-center d-block' id='basic-addon5'>Imagen guardada</span>
        <img src='../Imagenes/" . $nombreImagen . "' alt='imagen " . $nombre . "' class='w-100'>
      </div>
      <input type='file' class='form-control ms-1' name='proimagen' id='proimagen' accept='.png,.jpg' aria-describedby='basic-addon5'>
      <div class='invalid-feedback'>
        La imagen debe ser en formato JPG o PNG
      </div>
    </div>
    <input type='hidden' name='nombreimagen' id='nombreimagen' value='" . $nombreImagen . "'>
    <div class='float-end'>
      <button type='submit' class='btn btn-success btn-sm fs-4'>Enviar</button>
    </div>
  </form>";
  $activarModal = true;
} else {
    $mensajeForm = "ERROR: No se han recibido todos los datos necesarios.";
}
?>
<div class="d-flex justify-content-center align-items-center ">
    <div class="d-flex justify-content-center bg-gris col-12 col-md-8 position-relative h-100 align-items-center min-vh-100 row row-cols-1">
        <button type="hidden" id="btnActivarModal" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#modificacionModal"></button>
        <div class="modal fade modal-xl" id="modificacionModal" tabindex="-1" aria-labelledby="tituloModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="tituloModal">Modificación</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <?php
                        echo $mensajeForm;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $controlProducto = new AbmProducto();
        $colProductos = $controlProducto->buscar(null);
        if (count($colProductos) > 0) {
            foreach ($colProductos as $unProducto) {
                echo "<div class='col p-4 col-xxl-3 col-xl-4 col-sm-6'>
                        <div class='bg-white p-2 rounded text-black'>
                            <img src='../Imagenes/" . $unProducto->getImagen() . "' class='card-img-top' alt='imagen " . $unProducto->getNombre() . "'>
                            <div class='card-body'>
                                <h4 class='card-title'>" . $unProducto->getNombre() . "</h4>
                                <p class='card-text mb-0'>" . $unProducto->getDetalle() . "</p>
                                <p class='card-text text-primary-emphasis fw-bold mb-0'> Stock: " . $unProducto->getCantStock() . " unidades.</p>
                                <p class='card-text mb-0 text-success fw-bold'>$" . $unProducto->getPrecio() . " US</p>
                                <div class='text-center row'>
                                    <form method='post' action='" . $_SERVER['PHP_SELF'] . "' class='col-6'>
                                        <input type='hidden' name='idproducto' id='idproducto' value='" . $unProducto->getIdProducto() . "'>
                                        <button type='submit' class='btn btn-primary mt-1'>Modificar datos</button>
                                    </form>
                                    <form method='post' action='../Accion/eliminarProducto.php' class='col-6'>
                                        <input type='hidden' name='idproducto' id='idproducto' value='" . $unProducto->getIdProducto() . "'>
                                        <button type='submit' class='btn btn-danger mt-1'>Eliminar producto</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>";
            }
        } else {
            echo "<h3 class='text-center text-dark'>No hay productos guardados</h3>
            <div class='d-flex align-content justify-content-center'>
                <a class='btn btn-primary mx-3 fs-5' role='button' href='./AgregarProductos.php'>Agregar productos</a>
            </div>";
        }
        ?>
    </div>
</div>
<script>
    $(document).ready(function() {
        <?php
        if ($activarModal) {
            echo '$("#btnActivarModal").click();';
        }
        ?>
    });
</script>
<script src="../JS/formModificarProducto.js"></script>
<script src="../JS/scriptAgregarProductos.js"></script>
<?php
include_once "../../../vista/estructura/footer.php"
?>