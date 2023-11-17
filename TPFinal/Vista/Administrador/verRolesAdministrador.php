<?php
$titulo = "Cambiar roles";
include_once "../../../configuracionProyecto.php";
include_once "../../configuracion.php";
include_once "./../Estructura/ultimoNav.php";
$objUsuario = new AbmUsuario();
$listaUsuarios = $objUsuario->buscar(null);
$usuariosConRoles = $objUsuario->listarUsuarioRol(null);
?>

<div class="d-flex justify-content-center align-items-center">
    <div class="d-flex justify-content-center bg-body-tertiary col-12 col-md-12 col-xl-8 position-relative align-items-center min-vh-100 row">
        <div class="z-3 row justify-content-center align-items-center position-absolute fixed-top mx-0 px-0">
            <div id="liveAlertPlaceholder" class="col-12 col-sm-10 col-md-7 col-xl-6 mt-5 text-center"></div>
        </div>
        <?php
        if (count($listaUsuarios) > 0) {
            echo "<table class='table text-center'>
                <thead class='table-dark'>
                    <tr>
                        <th colspan='8' class='table-dark text-center fs-4'>Usuarios</th>
                    </tr>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de usuario</th>
                        <th>Rol/es</th>
                    </tr>
                </thead>";
            echo "<form novalidate class='needs-validation' method='post' id='formrolesusuario'>";
            foreach ($listaUsuarios as $usuario) {
                echo "<tr class='align-middle'>";
                echo "<td>" . $usuario->getId() . "<input type='hidden' name='idusuario[]' value='" . $usuario->getId() . "'></td>";
                echo "<td class='col-2'>". $usuario->getNombre() ."<input type='hidden' name='usnombre[]' class='cursor-text bg-white border border-0 text-center rounded-5' maxlength='50' id='usnombre'  value='" . $usuario->getNombre() . "' placeholder='Nombre de usuario'></td>";
                $arrayUsuarioRol['idusuario'] = $usuario->getId();
                $objUsuarioRol = new AbmUsuarioRol;
                $arrayUserRol = $objUsuarioRol->buscar($arrayUsuarioRol);

                echo "<td>";
                $controlRol = new AbmRol();
                $availableRoles = $controlRol->buscar(null);

                foreach ($availableRoles as $rol) {
                    $isChecked = false;
                    foreach ($arrayUserRol as $unRol) {
                        $nombreRol = $unRol->getObjRol()->getRolDesc();
                        if ($rol->getRolDesc() == $nombreRol) {
                            $isChecked = true;
                        }
                    }
                    //Verifico quién está en la SESSION y anulo que se pueda quitar el ROL de ADMINISTRADOR a si mismo
                    if (!($_SESSION['rolelegido']==$rol->getIdRol() && $_SESSION['idusuario'] == $usuario->getId())){
                        echo "<label><input type='checkbox' class='form-check-input' name='usroles[" . $usuario->getId() . "][]' id= 'usroles[]' value='". $rol->getRolDesc(). "' " . ($isChecked ? 'checked' : ''). ">". $rol->getRolDesc() . "</label><br>";
                    } else {
                        echo "Administrador no se puede quitar<br>";
                        echo "<label hidden><input type='checkbox' class='form-check-input' name='usroles[" . $usuario->getId() . "][]' id= 'usroles[]' value='". $rol->getRolDesc(). "' " . ($isChecked ? 'checked' : ''). ">". $rol->getRolDesc() . "</label>";
                    }
                }
                echo "</td>";
                echo "</tr>";
            }
            echo "</table>";
            // En este boton se recibe el evento on click de rolesAdministrador.js
            echo "
                <div class='d-flex justify-content-center align-items-center'>
                    <button class='btn btn-success' type='button' id = 'recibirdatosformboton'><i class='fa-solid fa-check'></i> Enviar</button>
                </div>";
                
            echo "</form>";
        } else {
            echo "<h3 class 'text-center'>No hay Usuarios registrados</h3>";
        }
        ?>
    </div>
</div>
<script src="../JS/funciones.js"></script>
<script src="../JS/rolesAdministrador.js"></script>
<?php
include_once "../../../vista/estructura/footer.php";

?>
