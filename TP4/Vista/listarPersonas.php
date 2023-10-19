<?php
$tituloPagina = "TP4-Ver lista de personas";
include_once '../configuracion.php';
include_once '../../configuracionProyecto.php';
include_once './estructura/header.php';
$objPersona = new AbmPersona();

$listaPersonas = $objPersona->buscar(null);
?>
<div class="vh-100 row w-100 align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris ">
        <div class="col-md-12">
            <?php
            if (count($listaPersonas) > 0) {
                echo "
                <table class='table'>
                    <thead class='table-dark'>
                        <tr>
                            <th colspan=7 class='table-dark text-center fs-4'>Personas</th>
                        </tr>
                        <tr>
                            <th>#</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Numero de DNI</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Telefono</th>
                            <th>Domicilio</th>
                        </tr>
                    </thead>";
                $i = 1;
                foreach ($listaPersonas as $persona) {
                    echo "<tr><td>" . $i . "</td><td>" . $persona->getApellido() . "</td> <td>" . $persona->getNombre() . "</td><td>" . $persona->getNroDni() . "</td><td>" . $persona->getFechaNac() . "</td><td>" .   $persona->getTelefono() . "</td><td>" . $persona->getDomicilio() . "</td></tr>";
                    $i++;
                }
                echo "</table>";
            } else {
                echo "<h3>No hay Personas registradas</h3>";
            }
            ?>
            <div class="container d-flex justify-content-center">
                <a href="autosPersona.php" class="btn btn-primary link-light fs-5">Buscar los autos de determinada persona</a>
            </div>
        </div>
    </div>
</div>
<?php include_once './estructura/footer.php'; ?>