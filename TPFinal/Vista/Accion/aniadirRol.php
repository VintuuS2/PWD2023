<?php
$titulo = "Producto agregado";
include_once "../../../configuracionProyecto.php";
include_once "../Estructura/header.php"; // hay que hacer la verificación de que el usuario loggeado tenga rol de 'administrador'
include_once "../../configuracion.php";
$datos = data_submitted();
$controlRol = new AbmRol();
$listaRoles = $controlRol->buscar(null);
$aniadir = true;
if (isset($datos['rodescripcion'])) {
    foreach ($listaRoles as $rol){
        if ($rol->getRolDesc() == $datos['rodescripcion']){
            $aniadir = false;
        }
    }
    if ($aniadir){
        if($controlRol->alta($datos)){
            $mensaje = "Rol agregado correctamente";
        } else {
            $mensaje = "No se pudo agregar el rol";
        }
       
    } else {
           $mensaje = "El rol ya existe";
    }

} else {
    $mensaje = "No se han recibido todos los datos necesarios, por favor vuelva al formulario y completelo nuevamente.";
}
?>
<div class="d-flex justify-content-center align-items-center ">
    <div class="d-flex justify-content-center bg-gris row col-12 col-md-8 row position-relative h-100 align-items-center min-vh-100">
        <div class="bg-dark p-5 rounded-5 col-12 col-md-10 col-xl-8">
            <div class="h3 text-center text-white mb-5">
            <?php
            echo $mensaje
            ?>
            </div>
            <div class="d-flex align-content justify-content-center">
                <a class="btn btn-primary mx-3 fs-5" role="button" href="../Administrador/creadorRol.php">Volver atrás</a>
                <a class="btn btn-primary mx-3 fs-5" role="button" href="../Administrador/verRolesAdministrador.php">Ver lista de Roles</a>
            </div>
        </div>
    </div>
</div>
<?php
include_once "../../../vista/estructura/footer.php"
?>