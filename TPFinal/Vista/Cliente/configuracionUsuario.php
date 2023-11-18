<?php
$titulo = "Configuración";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/ultimoNav.php";
$usuario = $session->getUserObj();
?>
<div class="min-vh-100 d-flex justify-content-center">
    <div style="top: 100px; z-index:100;" class="row justify-content-center align-items-center position-fixed fixed-top mx-0 px-0">
        <div id="liveAlertPlaceholder" class="col-12 col-sm-10 col-md-7 col-xl-6 mt-5 text-center"></div>
    </div>
    <div class="col-12 col-lg-9 bg-body-tertiary h-100 min-vh-100">
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <form data-bs-theme="light" id="miFormulario" class="needs-validation row bg-gris p-4 rounded col-12 col-xs-10 col-md-8 col-xl-6" action="./../Accion/modificarDatosUsuario.php" method="POST" novalidate>
                <h2 class="text-center text-primary">Modificación de datos</h2>
                <div class="input-group mb-4">
                    <div class="ms-2 me-auto">
                        <?php
                        $habilitado = $usuario->getHabilitado();
                        echo "<div class='fw-bold text-black'>Estado de Cuenta: " . (is_null($habilitado) ? "Usuario habilitado</div>" : "Usuario deshabilitado</div>");
                        ?>
                    </div>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text fw-bold border-0" id="basic-addon1">Usuario</span>
                    <input type="text" class="form-control" name="usnombre" id="usnombre" maxlength="50" required placeholder="Nombre de usuario" value=<?php echo "'" . $usuario->getNombre() . "'" ?> aria-describedby="basic-addon1">
                    <div class="invalid-feedback">
                        Debe ingresar un nombre de usuario
                    </div>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text fw-bold border-0" id="basic-addon2">E-mail</span>
                    <input aria-describedby="basic-addon2" class='form-control' type='email' name='usmail' placeholder="ejemplo@email.com" required id='usmail' value=<?php echo "'" . $usuario->getMail() . "'" ?>>
                    <div class="invalid-feedback">
                        Debe ingresar un email válido
                    </div>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text fw-bold border-0" id="basic-addon5">Contraseña actual</span>
                    <input class='form-control' type='password' required maxlength="32" placeholder="Ingrese su contraseña" autocomplete="on" name='uspass' id='uspass' value='' aria-describedby="basic-addon5">
                    <div class="invalid-feedback">
                        Debe ingresar su contraseña para confirmar cambios
                    </div>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text fw-bold border-0" id="basic-addon3">Nueva Contraseña*</span>
                    <input class='form-control' type='password' maxlength="32" autocomplete="on" name='nueva_uspass' id='nueva_uspass' aria-describedby="basic-addon3" placeholder="(opcional)">
                    <div class="invalid-feedback">
                        Debe ingresar una contraseña diferente a la actual
                    </div>
                </div>
                <div class="input-group mb-4">
                    <span class="input-group-text fw-bold border-0" id="basic-addon4">Confirme nueva contraseña</span>
                    <input class='form-control' type='password' maxlength="32" autocomplete="on" name='confirmar_nueva_uspass' id='confirmar_nueva_uspass' aria-describedby="basic-addon3" placeholder="(opcional)">
                    <div class="invalid-feedback">
                        Las nuevas contraseñas no coinciden
                    </div>
                </div>

                <div class="d-flex align-content justify-content-center">
                    <button type="submit" class="btn btn-success btn-sm fs-5">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../JS/md5.min.js"></script>
<script>
    passMd5 = "<?php echo $usuario->getPass(); ?>";
</script>
<script src="../JS/scriptConfiguracionUsuario.js"></script>
<?php

include_once "../../../vista/estructura/footer.php";
?>