<?php
$titulo = "Roles Modificados";

include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
//include_once "../Estructura/header.php";
//include_once "../Estructura/ultimoNav.php";

$datos = data_submitted();
$error = false;
$mensaje = "";
if (!isset($datos['usroles'])) {
    $datos['usroles'] = -1;
}
if (isset($datos['idusuario']) && isset($datos['usnombre']) && isset($datos['usroles'])) {
    $ids = $datos['idusuario'];
    $nombres = $datos['usnombre'];
    $roles = $datos['usroles'];
    $controlUsuario = new AbmUsuario();
    $controlUsuarioRol = new AbmUsuarioRol();
    $controlRol = new AbmRol();

    foreach ($ids as $id) {
        $usuarioBuscado = $controlUsuario->buscar(['idusuario' => $id]);
        if (!empty($usuarioBuscado)) {

            $usuario = $usuarioBuscado[0];
            $listaRoles = $controlRol->buscar(null);
            $roleNameToIdMap = [];

            foreach ($listaRoles as $rol) {
                $roleNameToIdMap[$rol->getRolDesc()] = $rol->getIdRol();
            }

            $idRoles = [];

            if (isset($roles[$id]) && is_array($roles[$id])) {
                foreach ($roles[$id] as $roleName) {
                    if (isset($roleNameToIdMap[$roleName])) {
                        $idRoles[] = $roleNameToIdMap[$roleName];
                    }
                }
            }

            foreach ($idRoles as $idRol) {
                // Verificar si la relación usuario-rol ya existe
                $relacionExistente = $controlUsuarioRol->buscar(['idusuario' => $usuario->getId(), 'idrol' => $idRol]);

                if (empty($relacionExistente)) {
                    // La relación no existe, entonces podes insertarla
                    if ($controlUsuarioRol->alta(['idusuario' => $usuario->getId(), 'idrol' => $idRol])) {
                        //setCookie('alta', 'Rol/es agregados correctamente.');
                    }
                }
            }

            $rolesActuales = $controlUsuarioRol->buscar(['idusuario' => $usuario->getId()]);

            $rolesEliminar = [];
            foreach ($rolesActuales as $rolActual) {
                $idRolActual = $rolActual->getObjRol()->getIdRol();
                if (!in_array($idRolActual, $idRoles)) {
                    $rolesEliminar[] = $idRolActual;
                }
            }

            $soyYo = false;
            $estoyEnEseRol = false;
            if (count($rolesEliminar)==count($rolesActuales)){
                foreach ($rolesEliminar as $idRolEliminar) {
                    
                    if ($controlUsuarioRol->baja(['idusuario' => $usuario->getId(), 'idrol' => $idRolEliminar])) {
                        //setCookie('baja', 'Rol/es borrados correctamente.');
                    }
                }
                $controlUsuarioRol->alta(['idusuario' => $usuario->getId(), 'idrol' => '3']);
            } else {
                foreach ($rolesEliminar as $idRolEliminar) {

                    if ($_SESSION['idusuario'] == $usuario->getId()){
                        $soyYo = true;
                    }
                    if ($_SESSION['rolelegido'] == $idRolEliminar){
                        $estoyEnEseRol = true;
                    }

                    if ($controlUsuarioRol->baja(['idusuario' => $usuario->getId(), 'idrol' => $idRolEliminar])) {
                        //setCookie('baja', 'Rol/es borrados correctamente.');
                    }
                    //echo "<br><br>Este es mi usuario: ";
                    //var_dump($soyYo);
                    //echo "<br><br>Este es el rol de ADM en teoria: ";
                    //var_dump($estoyEnEseRol);
                    //echo "<br><br>";
                    if ($soyYo && $estoyEnEseRol){
                        $session->updateRol();
                        //echo $_SESSION['idroles'][0]."<br>";
                        $_SESSION['rolelegido'] = $_SESSION['idroles'][0];
                    }
                }
            }
            //var_dump($_SESSION);


            

            



            if ($_SESSION['idusuario'] == $datos['idusuario']) {
                $session->updateRol();
            }
        }
    }
    //header('Location: ' . $urlRoot . "Vista/Administrador/verRolesAdministrador.php");
} else {
    $mensaje = "El formulario no ha llegado correctamente o no se han seleccionado roles, reinténtalo.";
}
header('Location: ' . $urlRoot . "Vista/Administrador/verRolesAdministrador.php");
//include_once '../Estructura/ultimoNav.php';
?>
<!--
<div class="d-flex justify-content-center align-items-center ">
    <div class="d-flex justify-content-center bg-gris row col-12 col-md-8 row position-relative h-100 align-items-center min-vh-100">
        <div class="bg-dark p-5 rounded-5 col-12 col-md-10 col-xl-8">
            <div class="h3 text-center text-white mb-5">
            <?php
            //echo $mensaje;
            ?>
            </div>
            <div class="d-flex align-content justify-content-center">
                <a class="btn btn-primary mx-3 fs-5" role="button" href="../Administrador/verRolesAdministrador.php">Ver lista de Roles por Usuario</a>
            </div>
        </div>
    </div>
</div>
-->
<?php
//include_once "../../../vista/estructura/footer.php"; 
?>