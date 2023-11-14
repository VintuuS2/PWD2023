<?php
$titulo = "Roles Modificados";
include_once "../../../configuracionProyecto.php";
include_once "../Estructura/header.php";
include_once "../../configuracion.php";
$datos = data_submitted();
$error = false;
if (!isset($datos['usroles'])){
    $datos['usroles'] = -1;
}
if (isset($datos['idusuario']) && isset($datos['usnombre']) && isset($datos['usroles'])) {
    $ids = $datos['idusuario'];
    $nombres = $datos['usnombre'];
    $roles = $datos['usroles'];
    $objUsuario = new AbmUsuario();
    $objUsuarioRol = new AbmUsuarioRol();
    $objRol = new AbmRol();
    foreach ($ids as $id) {
        $usuarioBuscado = $objUsuario->buscar(['idusuario' => $id]);
        if (!empty($usuarioBuscado)) {
            $usuario = $usuarioBuscado[0];

            echo "ID: " . $usuario->getId() . "<br>";
            echo "Nombre de usuario: " . $usuario->getNombre() . "<br>";

            $listaRoles = $objRol->buscar(null);

            $roleNameToIdMap = [];

            foreach ($listaRoles as $rol) {
                $roleNameToIdMap[$rol->getRolDesc()] = $rol->getIdRol();
            }

            $idRoles = [];

            if (isset($roles[$id]) && is_array($roles[$id])) {
                foreach ($roles[$id] as $roleName) {
                    if (isset($roleNameToIdMap[$roleName])) {
                        $idRoles[] = $roleNameToIdMap[$roleName];
                    } else {
                        echo "Rol '$roleName' no encontrado.<br>";
                    }
                }
            }

            $rolesActuales = $objUsuarioRol->buscar(['idusuario' => $usuario->getId()]);

            $rolesEliminar = [];
            foreach ($rolesActuales as $rolActual) {
                $idRolActual = $rolActual->getObjRol()->getIdRol();
                if (!in_array($idRolActual, $idRoles)) {
                    $rolesEliminar[] = $idRolActual;
                }
            }

            print_r($rolesEliminar);
            foreach ($rolesEliminar as $idRolEliminar) {
                if ($objUsuarioRol->baja(['idusuario' => $usuario->getId(), 'idrol' => $idRolEliminar])) {
                    echo "Rol eliminado correctamente.<br>";
                } else {
                    echo "Error al eliminar Rol.<br>";
                }
            }

            foreach ($idRoles as $idRol) {
                echo $usuario->getId(). "<br>";
                echo $idRol . "<br>";

                // Verificar si la relación usuario-rol ya existe
                $relacionExistente = $objUsuarioRol->buscar(['idusuario' => $usuario->getId(), 'idrol' => $idRol]);

                if (empty($relacionExistente)) {
                    // La relación no existe, entonces puedes insertarla
                    if ($objUsuarioRol->alta(['idusuario' => $usuario->getId(), 'idrol' => $idRol])) {
                        echo "Usuario Rol cargado correctamente<br>";
                    } else {
                        echo "Error al cargar Usuario Rol<br>";
                    }
                } else {
                    echo "La relación usuario-rol ya existe. No se ha insertado.<br>";
                }
            }
        } else {
            echo "Usuario $id no encontrado.<br>";
        }
        echo "<br>";
    }
} else {
    echo "El formulario no ha llegado correctamente o no se han seleccionado roles, reinténtalo.";
}
?>
