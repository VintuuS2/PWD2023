<?php
$titulo = "Configuración";
include_once "../../configuracionProyecto.php";
include_once "../configuracion.php";
include_once "./Estructura/header.php";
$sesion = new Session();
if (!$sesion->validar()) {
    header('Location: ' . $urlRoot . "Vista/Login.php");
} else {
    $usuario = $sesion->getUserObj();
}
include_once "./Estructura/ultimoNav.php";
?>
<!-- HAY QUE AJUSTAR BIEN PQ NO ME GUSTA EL ROW PERO COPYPASTEÉ EL LOGIN --->
<div class="min-vh-100 d-flex justify-content-center">
    <div class="col-12 col-lg-9 bg-body-tertiary h-100 min-vh-100">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <ul class="list-group list-group w-50">
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Nombre de usuario</div>
                        <?php echo $usuario->getNombre() ?>
                    </div>
                    <button class="btn btn-primary my-auto">Modificar</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Contraseña</div>
                        <?php
                        $cant = strlen($usuario->getPass());
                        for ($i = 0; $i < $cant; $i++) {
                            echo "*";
                        }
                        ?>
                    </div>
                    <button class="btn btn-primary my-auto">Modificar</button>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">Email</div>
                        <?php echo $usuario->getMail() ?>
                    </div>
                    <button class="btn btn-primary my-auto">Modificar</button>
                </li>
            </ul>
        </div>
    </div>
</div>
</main>
<?php include_once "../../vista/estructura/footer.php"; ?>