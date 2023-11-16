<?php
$tituloPagina = "Modificar";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";

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
header('Location: ' . $urlRoot . "Vista/Administrador/listarUsuariosAdministrador.php");
?>
<?php include_once '../../../vista/estructura/footer.php'; ?>