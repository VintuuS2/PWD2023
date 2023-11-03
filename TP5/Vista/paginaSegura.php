<?php
$tituloPagina = "TP5-Login";
include_once "../../configuracionProyecto.php";
include_once "../configuracion.php";
$sesion = new Session();
include_once "../../TP5/Vista/Estructura/header.php";
$unaPersona = new AbmUsuario();
$listaPersona = $unaPersona->buscar($_SESSION);
$mensaje = $listaPersona[0];
?>
<div class="d-flex justify-content-center align-items-center ">
    <div class="d-flex justify-content-center bg-gris row col-12 col-md-8 row position-relative h-100 align-items-center min-vh-100">
        <div class="bg-black p-5 rounded-5 text-white col-12 col-sm-8 col-md-8 col-lg-6 col-xl-4 text-center">
            <h3>Loggeado Correctamente</h3>
            <p>Bienvenido <?php echo $mensaje->getNombre(); ?></p>
            <a class="btn btn-primary text-center" href="<?php echo $PROYECTOROOT."TP5/Vista/Accion/destruirSession.php" ?>">Cerrar sesión</a>
        </div>
    </div>
</div>
<?php
include_once "../../vista/estructura/footer.php";
?>