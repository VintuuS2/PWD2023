<?php
$titulo = "Registro";
include_once '../../../configuracionProyecto.php';
include_once '../../configuracion.php';
//include_once '../Estructura/ultimoNav.php';

$datos = data_submitted();
$mensaje = "";

if (isset($datos['user-register']) && isset($datos['password-register']) && isset($datos['email-register'])) {
    $registro['idusuario'] = null;
    $registro['usnombre'] = $datos['user-register'];
    $registro['uspass'] = md5($datos['password-register']);
    $registro['usmail'] = $datos['email-register'];
    $registro['usdeshabilitado'] = null;

    $busqueda['usmail'] = $registro['usmail'];
    

    $usuario = new AbmUsuario();
    $abmUsuarioRol = new AbmUsuarioRol;
    $existe = $usuario->buscar($busqueda);
    if (count($existe)>0){
        $_SESSION['mensajeError'] = "Ya existe un usuario con ese email";
    } else {
        if ($usuario->alta($registro)) {
            $_SESSION['mensajeExito'] = "Registro exitoso";
            //Le doy rol al usuario creado
            $elUsuarioEnCuestion = $usuario->buscar($busqueda);
            $registrarRol['idusuario'] = $elUsuarioEnCuestion[0]->getId();
            $registrarRol['idrol'] = 3;
            $abmUsuarioRol->alta($registrarRol);
        } else {
            $_SESSION['mensajeError'] = "Se ha producido un error al tratar de registrar este usuario";
        }
    }
} else {
    $mensaje = "No se ingresaron datos";
}
header('Location: '. $urlRoot . "Vista/login.php");
?>

<div class="min-vh-100 d-flex justify-content-center">
    <div class="col-12 col-lg-9 bg-body-tertiary h-100 min-vh-100 justify-content-center align-items-center d-flex">
        <div>
            <div>
                <h2> <?php echo $mensaje ?> </h2>
            </div>
            <div class="text-center">
                <a href="<?php echo $PROYECTOROOT ?>TPFinal/Vista/login.php" class="btn btn-primary">Volver</a>
            </div>
        </div>
    </div>
</div>

<?php
include_once '../../../vista/estructura/footer.php';
?>