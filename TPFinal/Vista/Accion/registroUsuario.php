<?php
$titulo = "Registro";
include_once '../../configuracion.php';
include_once '../../../configuracionProyecto.php';
include_once '../Estructura/header.php';
include_once '../Estructura/ultimoNav.php';

$datos = data_submitted();
$mensaje = "";

if (isset($datos['user-register']) && isset($datos['password-register']) && isset($datos['email-register'])) {
    $registro['idusuario'] = null;
    $registro['usnombre'] = $datos['user-register'];
    $registro['uspass'] = $datos['password-register'];
    $registro['usmail'] = $datos['email-register'];
    $registro['usdeshabilitado'] = null;

    $busqueda['usmail'] = $registro['usmail'];
    

    $usuario = new AbmUsuario();
    $existe = $usuario->buscar($busqueda);
    if (count($existe)>0){
        $mensaje = "Ya existe un usuario con ese email";
    } else {
        if ($usuario->alta($registro)) {
            $mensaje = "Registro exitoso, te envíaremos al login para que completes tu registro";
        } else {
            $mensaje = "Se ha producido un error al tratar de registrar este usuario";
        }
    }
} else {
    $mensaje = "No se ingresaron datos";
}

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
<script>
    sleep(5)
    window.location
</script>

<?php
include_once '../../../vista/estructura/footer.php';
?>