<?php
$titulo = "Configuración";
include_once "../../configuracionProyecto.php";
include_once "../configuracion.php";
include_once "./Estructura/header.php";
$sesion = new Session();
if (!$sesion->validar()) {
    header('Location: ' . $urlRoot . "Vista/Login.php");
}
include_once "./Estructura/ultimoNav.php";
?>
<!-- HAY QUE AJUSTAR BIEN PQ NO ME GUSTA EL ROW PERO COPYPASTEÉ EL LOGIN --->
<div class="d-flex justify-content-center align-items-center ">
    <div class="d-flex justify-content-center bg-body-tertiary row col-12 col-md-8 row position-relative h-100 align-items-center min-vh-100 text-center">
        <h2 class="pt-5">FALTA CONTENIDO</h2>
        <p class="mt-">Acá el usuario puede cambiar los datos de su cuenta y (OPCIONAL) deshabilitar su cuenta.</p>
        <div class="bg-black p-5 rounded-5 text-white col-12 col-sm-8 col-md-8 col-lg-6 col-xl-4">
            <form action="./Accion/verificarLogin.php" method="post" class="needs-validation" novalidate>
                <div class="text-center">
                    <h2>Cambiar configuración</h2>
                </div>
                <div class="form-group">
                    <label for="user-input">Nombre de Usuario</label>
                    <input type="text" class="form-control" name="user-input" id="user-input" placeholder="Username" errorVacio="Por favor rellene este campo" errorPatron="El contenido solo acepta carácteres alfanuméricos" required>
                    <div class="invalid-feedback">
                        Rellene este campo
                    </div>
                </div>
                <div class="form-group">
                    <label for="password-input">Contraseña</label>
                    <input type="password" class="form-control" name="password-input" id="password-input" placeholder="Password" errorVacio="Por favor rellene este campo" errorPatron="El contenido solo acepta carácteres alfanuméricos" required>
                    <div class="invalid-feedback">
                        Rellene este campo
                    </div>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>
</main>
<?php include_once "../../vista/estructura/footer.php"; ?>