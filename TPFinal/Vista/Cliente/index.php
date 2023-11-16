<?php
$titulo = "Game Galaxy";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/ultimoNav.php";
$productos = new AbmProducto;
$listaProductos = $productos->buscar(null);
if (count($listaProductos)>0){
  for ($i=0; $i < 3; $i++) { 
    $elProductito = $listaProductos[$i];
    $productosDestacados[$i]['pronombre'] = $elProductito->getNombre();
    $productosDestacados[$i]['prodetalle'] = $elProductito->getDetalle();
    $productosDestacados[$i]['proprecio'] = $elProductito->getPrecio();
    $productosDestacados[$i]['proimagen'] = $elProductito->getImagen();
  }
}
//var_dump($productosDestacados);
//var_dump($_COOKIE);
?>
<div class="min-vh-100 d-flex justify-content-center">
  <div class="col-12 col-lg-9 bg-body-tertiary h-100 min-vh-100">
    <!-- <Banner> --->
    <div class="d-flex justify-content-center pt-5">
      <div class="d-flex w-75 rounded-3 h-25 bg-body-secondary justify-content-center p-5">
        <div class="align-items-center text-center">
          <h2>Game Galaxy</h2>
          <p class="fs-5">Tu tienda de juegos</p>
        </div>
      </div>
    </div>
    <!-- </Banner> --->
    <div class="border-top w-75 mx-auto my-5">

    </div>
    <!-- <Catálogo de opciones recomendadas> --->
    <div class="w-75 mt-5 p-5 bg-body-secondary mx-auto">
      <div class="text-center mb-4">
        <h3>Productos destacados</h3>
      </div>
      <div class="d-flex justify-content-around align-items-center">
        <!-- <1erItem> --->
        <?php
        
        for ($i=0; $i < 3; $i++) { 
          echo '<div class="card" style="width: 18rem;">
          <img src="../imagenes/'.$productosDestacados[$i]['proimagen'].'" class="card-img-top" alt="...">
          <div class="card-body text-center h-25 overflow-y-auto">
            <h5 class="card-title">'.$productosDestacados[$i]['pronombre'].'</h5>
            <p class="card-text">'.$productosDestacados[$i]['prodetalle'].'</p>
            <a href="'.($_COOKIE['login'] == "1" ? "./productos.php": "../login.php").'" class="btn btn-primary">Ir a producto</a>
          </div>
        </div>';
        }
        
        ?>
        <!-- </1erItem> --->
      </div>
    </div>
    <!-- </Catálogo de opciones recomendadas> --->
  </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>