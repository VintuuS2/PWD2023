<?php
$tituloPagina = "TP5-Ver usuarios";
include_once "../../configuracionProyecto.php";
include_once('../../TP5/configuracion.php');
include_once "../../TP5/Vista/Estructura/header.php";
$objUsuario = new AbmUsuario;
$listaUsuarios = $objUsuario->buscar(null);
?>
<div class="d-flex justify-content-center align-items-center">
    <div class="d-flex justify-content-center bg-gris row col-12 col-md-8 row position-relative h-100 align-items-center min-vh-100">
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
                    echo "<tr class='align-center'><td>" . $usuario->getId() . "</td><td>" . $usuario->getNombre() . "</td> <td>" . $usuario->getMail() . "</td> <td>" . (is_null($usuario->getHabilitado()) ? 'Activo' : 'Deshabilitado desde: ' . $usuario->getHabilitado()) .  "</td> <td><button class='btn btn-primary modificar'>Modificar</button></td> <td><button class='btn btn-danger'>Deshabilitar</button></td>";

                }
                echo "</table>";
            } else {
                echo "<h3 class='text-center'>No hay Usuarios registrados</h3>";
            }
            ?>

    </div>
</div>
<?php
include_once "../../vista/estructura/footer.php";
?>