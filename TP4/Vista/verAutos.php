<?php
$tituloPagina = "TP4-Ver lista de vehiculos";
include_once '../configuracion.php';
include_once '../../configuracionProyecto.php';
include_once './estructura/header.php';
$objAuto = new AbmAuto();

$listaAutos = $objAuto->buscar(null);
?>
    <div class="vh-100 row w-100 align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris ">
            <div class="col-md-8">
                <?php
                if (count($listaAutos) > 0) {
                    echo "
                        <table class='table'>
                            <thead class='table-dark'>
                                <tr>
                                    <th class='text-center fs-4' colspan=6>Autos</th>
                                </tr>
                                <tr>
                                    <th>#</th>
                                    <th>Patente</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Nombre</th>
                                    <th>Apellido</th>
                                </tr>
                            </thead>";
                    $i = 1;
                    foreach ($listaAutos as $auto) {
                        $objDuenio = $auto->getObjDuenio();
                        echo "<tr><td>" . $i . "</td><td>" . $auto->getPatente() . "</td><td>" . $auto->getMarca() . "</td><td>" . $auto->getModelo() . "</td><td>" . $objDuenio->getNombre() . "</td><td>" .   $objDuenio->getApellido() . "</td></tr>";
                        $i++;
                    }
                    echo "</table>";
                } else {
                    echo "<h3>No hay autos registrados.</h3>";
                }
                ?>
            </div>
        </div>
    </div>
<?php include_once './estructura/footer.php'; ?>