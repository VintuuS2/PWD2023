<?php
$titulo = "Configuración";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/header.php";
include_once "../Estructura/ultimoNav.php";
$usuario = $session->getUserObj();
?>
<div class="min-vh-100 d-flex justify-content-center">
    <div style="top: 100px;" class="z-3 row justify-content-center align-items-center position-fixed fixed-top mx-0 px-0">
        <div id="liveAlertPlaceholder" class="col-12 col-sm-10 col-md-7 col-xl-6 mt-5 text-center"></div>
    </div>
    <div class="col-12 col-lg-9 bg-body-tertiary h-100 min-vh-100">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <ul class="list-group list-group w-50">
                <form id="miFormulario" class="needs-validation row" action="./../Accion/modificarDatosUsuario.php" method="POST" novalidate>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold ">Nombre de usuario</div>
                            <input type='text' name = 'idusuario' id="idusuario" hidden value= <?php echo "'" . $usuario->getId() . "'"?>>
                            <input class='form-control' type='text' required name='usnombre' id='usnombre' value= <?php echo "'" . $usuario->getNombre() . "'"?>>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold ">Contraseña</div>
                            <input class='form-control' type='password' required name='uspass' id='uspass' value= <?php echo "'" . $usuario->getPass() . "'"?>>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold ">E-mail</div>
                            <input class='form-control' type='email' name='usmail' required  id='usmail' value= <?php echo "'" . $usuario->getMail() . "'"?>>
                        </div>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <div class="ms-2 me-auto">
                            <div class="fw-bold ">Estado de Cuenta</div>
                            <?php
                            $habilitado = $usuario->getHabilitado();
                            echo is_null($habilitado) ? "Usuario habilitado" : "Usuario deshabilitado";
                            ?>
                        </div>
                        <!-- Aca existia un boton de eliminar -->
                    </li>
                    <div class="mt-4">
                        <button type="submit" class="btn btn-primary" id="btnenviar" name="btnenviar">Enviar</button>
                    </div>
                </form>
            </ul>
        </div>
    </div>
</div>
</main>
<script src="./../JS/validadorForm.js"></script>
<script src="./../JS/deshabilitarUsuario.js"></script>
<?php include_once "../../../vista/estructura/footer.php";
