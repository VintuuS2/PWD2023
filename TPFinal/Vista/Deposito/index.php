<?php
$titulo = "Game Galaxy";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/ultimoNav.php";
$elUser = $session->getUserObj();
$elRolDelUser = $session->getRoles();
//var_dump($elRolDelUser);
?>
<div class="min-vh-100 d-flex justify-content-center">
  <div class="col-12 col-lg-9 bg-body-tertiary h-100 min-vh-100">
    <!-- <Banner> --->
    <div class="d-flex justify-content-center pt-5">
      <div class="d-flex w-75 rounded-3 h-100 bg-body-secondary justify-content-center p-5">
        <div class="align-items-center text-center">
          <h2>Bienvenido <?php echo $elUser->getNombre() ?></h2>
          <p class="fs-5">Estas viendo esto desde la vista de <?php echo $elRolDelUser[1]->getRolDesc() ?></p>
        </div>
      </div>
    </div>
    <!-- </Banner> --->
  </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>