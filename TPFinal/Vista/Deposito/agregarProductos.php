<?php
$titulo = "Agregar productos";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
//include_once "../Estructura/header.php";
include_once "../Estructura/ultimoNav.php"; // hay que hacer la verificación de que el usuario loggeado tenga rol de 'deposito'
?>
<div class="d-flex justify-content-center align-items-center ">
  <div class="d-flex justify-content-center bg-gris col-12 col-md-8 row position-relative h-100 align-items-center min-vh-100">
    <div class="bg-dark p-5 rounded-5 col-12 col-md-10 col-xl-8">
      <form action="../Accion/agregarProducto.php" id="form" method="POST" class="col-12 needs-validation p-4 rounded-5 gap-3" novalidate enctype="multipart/form-data">
        <h2 class="mt-1 mb-4 text-center text-primary" style="text-wrap: balance;">Agregar producto a la base de datos</h2>
        <input type="hidden" name="idproducto" id="idproducto" required value="0">
        <div class="input-group mb-3">
          <span class="input-group-text bg-secondary-emphasis fw-bold border-0 text-info" id="basic-addon1">Nombre</span>
          <input type="text" class="form-control" name="pronombre" id="pronombre" maxlength="50" required placeholder="Nombre del producto" aria-describedby="basic-addon1">
          <div class="invalid-feedback">
            Debe ingresar un nombre para el producto
          </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text bg-secondary-emphasis fw-bold border-0 text-info" id="basic-addon2">Detalles</span>
          <textarea type="text" class="form-control" name="prodetalle" id="prodetalle" maxlength="512" rows='4' required placeholder="Detalles del producto" aria-describedby="basic-addon2" style="resize: none;"></textarea>
          <div class="invalid-feedback">
            Debe ingresar un detalle para el producto
          </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text bg-secondary-emphasis fw-bold border-0 text-info" id="basic-addon3">Cantidad de stock</span>
          <input type="number" class="form-control" name="procantstock" id="procantstock" required min="0" placeholder="Cantidad de stock actual" aria-describedby="basic-addon3">
          <div class="invalid-feedback">
            Debe ingresar una cantidad de stock válida
          </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text bg-secondary-emphasis fw-bold border-0 text-info" id="basic-addon4">Precio</span>
          <input type="number" class="form-control" name="proprecio" id="proprecio" required min="0" placeholder="Precio del producto en dolares" aria-describedby="basic-addon4">
          <div class="invalid-feedback">
            Debe ingresar un precio válido
          </div>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text bg-secondary-emphasis fw-bold border-0 text-info" id="basic-addon5">Imagen</span>
          <input type="file" class="form-control" name="proimagen" id="proimagen" accept=".png,.jpg" required aria-describedby="basic-addon5">
          <div class="invalid-feedback">
            Debe ingresar una imagen en formato JPG o PNG
          </div>
        </div>
        <div class="d-flex align-content justify-content-center">
          <button type="submit" class="btn btn-success btn-sm fs-5">Enviar</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script src="../JS/scriptAgregarProductos.js"></script>
<?php
include_once "../../../vista/estructura/footer.php"
?>