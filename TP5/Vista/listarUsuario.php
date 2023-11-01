<?php
$tituloPagina = "TP5-Ver usuarios";
include_once "../../configuracionProyecto.php";
include_once('../configuracion.php');
include_once "./Estructura/header.php";
$objUsuario = new AbmUsuario;
$listaUsuarios = $objUsuario->buscar(null);
?>
<div class="d-flex justify-content-center align-items-center">
    <div class="d-flex justify-content-center bg-gris row col-12 col-md-10 col-xl-8 row position-relative align-items-center min-vh-100">
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
                                <th>Eliminar</th>
                            </tr>
                        </thead>";
            foreach ($listaUsuarios as $usuario) {
                echo "<tr class='align-middle'>";
                echo "<form class='needs-validation' method='post' action='Accion/modificarLogin.php'>";
                echo "<td>" . $usuario->getId() . "<input type='hidden' name='idusuario' value='" . $usuario->getId() . "'></td>";
                echo "<td><input disabled name='usnombre' class='bg-white border border-0 text-center rounded-5' id='inputnombre".$usuario->getId()."' type='text' value='" . $usuario->getNombre() . "'></td>";
                echo "<td><input disabled name='usmail' class='bg-white border border-0 text-center rounded-5' id='inputmail".$usuario->getId()."' type='email' value='" . $usuario->getMail() . "'></td>";
                $estaHabilitado = is_null($usuario->getHabilitado());
                echo "<td>" . ($estaHabilitado ? 'Activo' : 'Deshabilitado desde: ' . $usuario->getHabilitado()) . "<input type='hidden' name='usdeshabilitado' value='" . $usuario->getHabilitado() . "'></td>";
                // Boton para modificar
                echo "<td><button type='submit' class='btn btn-primary btn-modificar' data-id=" . $usuario->getID() . ">Modificar</button></td>";
                echo "</form>";
                // Boton para deshabilitar
                echo "<td>
                        <form method='post' action='Accion/eliminarLogin.php'>
                            <input type='hidden' name='idusuario' value='" . $usuario->getId() . "'>
                            <button type='submit'" . ($estaHabilitado ? '' : 'disabled') . " class='btn btn-danger' name='deshabilitar'>Deshabilitar</button>
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
<?php
include_once "../../vista/estructura/footer.php";
?>