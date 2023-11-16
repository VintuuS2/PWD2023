<?php
$tituloPagina = "TP5-Ver usuarios";
include_once "../../configuracionProyecto.php";
include_once "../configuracion.php";
include_once "./Estructura/header.php";
$objUsuario = new AbmUsuario();
$listaUsuarios = $objUsuario->buscar(null);
?>
<div class="d-flex justify-content-center align-items-center">
    <div class="d-flex justify-content-center bg-body-tertiary row col-12 col-md-12 col-xl-8 row position-relative align-items-center min-vh-100">
        <div class="z-3 row justify-content-center align-items-center position-absolute fixed-top mx-0 px-0">
            <div id="liveAlertPlaceholder" class="col-12 col-sm-10 col-md-7 col-xl-6 mt-5 text-center"></div>
        </div>
        <?php
        if (count($listaUsuarios) > 0) {
            echo "<table class='table text-center'>
                        <thead class='table-dark'>
                            <tr>
                                <th colspan='6' class='table-dark text-center fs-4'>Usuarios</th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Nombre de usuario</th>
                                <th>Email</th>
                                <th>Estado</th>
                                <th>Modificar</th>
                                <th>Cambiar estado</th>
                            </tr>
                        </thead>";
            foreach ($listaUsuarios as $usuario) {
                echo "<tr class='align-middle'>";
                echo "<form novalidate class='needs-validation' data-id=" . $usuario->getId() . " method='post' action='Accion/modificarLogin.php'>";
                echo "<td>" . $usuario->getId() . "<input type='hidden' name='idusuario' value='" . $usuario->getId() . "'></td>";
                echo "<td><input  disabled name='usnombre' class='form-control cursor-text border border-0 text-center rounded-5' maxlength='50' id='inputnombre" . $usuario->getId() . "' type='text' value='" . $usuario->getNombre() . "' placeholder='Nombre de usuario'></td>";
                echo "<td><input  disabled name='usmail' class='form-control cursor-text border border-0 text-center rounded-5' maxlength='50'  id='inputmail" . $usuario->getId() . "' type='email' value='" . $usuario->getMail() . "' placeholder='ejemplo@gmail.com'></td>";
                $estaHabilitado = is_null($usuario->getHabilitado());
                echo "<td class='col-2'>" . ($estaHabilitado ? 'Activo' : 'Deshabilitado desde: ' . $usuario->getHabilitado()) . "<input type='hidden' name='usdeshabilitado' value='" . $usuario->getHabilitado() . "'></td>";
                // Boton para activar modoficación de los datos
                echo "<td><div class='d-flex h-100 justify-content-around' id='columnaBotones" . $usuario->getId() . "'><button type='submit' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='Cambiar datos' data-bs-custom-class='custom-tooltip' class='btn btn-primary btn-modificar' id='btn-modificar-" . $usuario->getId() . "'>Editar</button></div></td>";
                echo "</form>";
                // Boton para deshabilitar o habilitar
                echo "<td>
                        <form method='post' action='Accion/" . ($estaHabilitado ? "eliminar" : "habilitar") . "Login.php'>
                            <input type='hidden' name='idusuario' value='" . $usuario->getId() . "'> 
                            <button type='submit' class='btn btn-" . ($estaHabilitado ? "danger" : "success") . "' data-bs-toggle='tooltip' data-bs-placement='top' data-bs-title='" . ($estaHabilitado ? "Deshabilitar" : "Habilitar") . " al usuario' data-bs-custom-class='custom-tooltip-" . ($estaHabilitado ? "danger" : "success") . "' name='" . ($estaHabilitado ? "deshabilitar" : "habilitar") . "'>" . ($estaHabilitado ? "Deshabilitar" : "Habilitar") . "</button>
                        </form>
                    </td>";
                echo "</tr>"; 
            }
            echo "</table>";
        } else {
            echo "<h3 class='text-center'>No hay Usuarios registrados</h3>";
        }
        ?>

    </div>
</div>
<script src="JS/validador.js"></script>
<script src="JS/funciones.js"></script>
<?php
//include_once "../../vista/estructura/footer.php";
?>