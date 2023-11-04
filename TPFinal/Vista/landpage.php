<?php
$titulo = "Telaraña";
include_once "../../configuracionProyecto.php";
include_once "./Estructura/header.php";
?>

<div class="min-vh-100 d-flex justify-content-center">
    <div class="col-12 col-lg-9 bg-gris h-100 min-vh-100">
        <div class="position-relative overflow-hidden p-3 p-md-5 text-center bg-body-tertiary">
          <div class="col-md-6 p-lg-5 mx-auto my-5">
            <h1 class="display-3 fw-bold">Telaraña</h1>
            <h3 class="fw-normal text-muted mb-3">Tu página de videojuegos</h3>
            <div class="d-flex gap-3 justify-content-center lead fw-normal">
              <a class="icon-link" href="#">
                Learn more
                <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
              </a>
              <a class="icon-link" href="#">
                Buy
                <svg class="bi"><use xlink:href="#chevron-right"></use></svg>
              </a>
            </div>
          </div>
        </div>
    </div>
</div>

<?php
include_once "../../vista/estructura/footer.php"
?>