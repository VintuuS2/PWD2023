<?php
$tituloPagina = "TP5-Login";
include_once "../../configuracionProyecto.php";
include_once "../configuracion.php";
/*$sesion = new Session();
if ($sesion->activa()){
    header('Location: '.$urlRoot."Vista/paginaSegura.php");
}*/
include_once "../../TP5/Vista/Estructura/header.php";
?>
<div class="d-flex justify-content-center align-items-center ">
    <div class="d-flex justify-content-center bg-gris row col-12 col-md-8 row position-relative h-100 align-items-center min-vh-100">
        <div class="bg-black p-5 rounded-5 text-white col-12 col-sm-8 col-md-8 col-lg-6 col-xl-4">
            <form action="./Accion/verificarLogin.php" method="post">
                <div class="text-center">
                    <h2>Login</h2>
                </div>
                <div class="form-group">
                    <label for="user-input">Nombre de Usuario</label>
                    <input type="text" class="form-control" name="user-input" id="user-input" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="password-input">Contraseña</label>
                    <input type="password" class="form-control" name="password-input" id="password-input" placeholder="Password" required>
                </div>
                <br>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Ingresar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once "../../vista/estructura/footer.php";
?>