<?php
$titulo = "Game Galaxy";
include_once "../../../configuracionProyecto.php";
//include_once "./Menu/verMenu.php";
include_once "../../configuracion.php";
//include_once "./Estructura/header.php";
/*$sesion = new Session();
if ($sesion->validar()) {
  setcookie("login", 1);
} else {
  setcookie("login", 0);
}*/
include_once "../Estructura/ultimoNav.php";
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
        <div class="card" style="width: 18rem;">
          <img src="https://i.pinimg.com/originals/1f/bf/18/1fbf1891190c7fe0a89a31009609bbd0.gif" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <!-- </1erItem> --->
        <!-- <2doItem> --->
        <div class="card" style="width: 18rem;">
          <img src="https://i.pinimg.com/originals/1f/bf/18/1fbf1891190c7fe0a89a31009609bbd0.gif" class="card-img-top" alt="...">
          <div class="card-body text-center">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <!-- </2doItem> --->
        <!-- <3erItem> --->
        <div class="card" style="width: 18rem;">
          <img src="https://i.pinimg.com/originals/1f/bf/18/1fbf1891190c7fe0a89a31009609bbd0.gif" class="card-img-top" alt="..." style="height: 100%; width: 100%;">
          <div class="card-body text-center">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <!-- </3erItem> --->
      </div>
    </div>
    <!-- </Catálogo de opciones recomendadas> --->
  </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>