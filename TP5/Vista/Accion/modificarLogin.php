<?php
$tituloPagina = "TP5-Modificar login";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "../Estructura/header.php";

$datos = data_submitted();
if (isset($datos['idusuario'])) {
    $controlUsuario = new AbmUsuario;
    $arregloID = array('idusuario' => $datos['idusuario']);
    $usuario = $controlUsuario->buscar($arregloID)[0];
    $datos['uspass'] = $usuario->getPass();
    if ($controlUsuario->modificacion($datos)) {
        $mensaje = "Se ha modificado al usuario correctamente.";
    } else {
        $mensaje = "ERROR: No se ha podido modificar al usuario.";
    }
} else {
    $mensaje = "ERROR: No se han recibido datos, por favor vuelva atras.";
}
?>
<div class="row align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center col-12 col-md-8  min-vh-100 bg-gris ">
        <div class="text-center h3 mensaje">
            <?php
            echo $mensaje;
            ?>
            <div class='container d-flex justify-content-center mt-3'>
                <a href='../listarUsuario.php' class='btn btn-primary link-light px-3 fs-5 mt-3'>Volver atrás</a>
            </div>
        </div>
    </div>
</div>
<?php include_once '../../../vista/estructura/footer.php'; ?>