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
    $controlUsuario->modificacion($datos);
}
header('Location: ' . $urlRoot . "Vista/Administrador/listarUsuariosAdministrador.php");
?>
<?php include_once '../../../vista/estructura/footer.php'; ?>