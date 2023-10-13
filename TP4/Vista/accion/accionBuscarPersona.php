<?php
include_once '../../configuracion.php';
include_once '../../../configuracionProyecto.php';
include_once '../estructura/header.php';
$datos = data_submitted();
if (isset($datos['dni-modificar'])) {
    $dniPersona = $datos['dni-modificar'];
    $controlPersona = new AbmPersona();
    $arrayPersonas = $controlPersona->buscar(null);
    $i = 0;
    $encontroPersona = false;
    // While que verifica y busca a la persona con el número de dni
    while ($i < count($arrayPersonas) && !$encontroPersona) {
        if ($arrayPersonas[$i]->getNroDni() == $dniPersona) {
            $encontroPersona = true;
        }
        $i++;
    }
    if ($encontroPersona) {
        //Cuando se encuentra una persona
        $mensaje = "
            <form id='form' action='./ActualizarDatosPersona.php' method='post' class='row g-3 needs-validation' novalidate>
            <h2 class='w-100 text-center'>Modificar Persona DNI N°" . $dniPersona . " en la Base de Datos</h2>
            <input type='text' class='form-control d-none' id='NroDni' name='NroDni' value='$dniPersona'>
            
            <div class='col-md-4'>
                <label for='Nombre' class='form-label'>Nombre</label>
                <input type='text' class='form-control' id='Nombre' placeholder='Su nombre' name='Nombre' value='" . $arrayPersonas[$i - 1]->getNombre() . "'required>
                <div class='valid-feedback'>
                    Dato ingresado correctamente!
                </div>
                <div class='invalid-feedback'>
                    Ingrese un nombre válido
                </div>
            </div>
            <div class='col-md-4'>
                <label for='Apellido' class='form-label'>Apellido</label>
                <input type='text' class='form-control' id='Apellido' placeholder='Su apellido' name='Apellido' value='" . $arrayPersonas[$i - 1]->getApellido() . "' required>
                <div class='valid-feedback'>
                    Dato ingresado correctamente!
                </div>
                <div class='invalid-feedback'>
                    Ingrese un apellido válido
                </div>
            </div>
            <input type='text' class='form-control d-none' id='fechaNac' name='fechaNac' value='" . $arrayPersonas[$i - 1]->getFechaNac() . "'>
            <div class='col-md-4'>
                <label for='Telefono' class='form-label'>Teléfono</label>
                <input class='form-control' type='text' pattern='[0-9]+' maxlength='11' min='0' placeholder='Ejemplo: 299-1231234' name='Telefono' id='Telefono' value='" . $arrayPersonas[$i - 1]->getTelefono() . "' required>
                <div class='valid-feedback'>
                    Dato ingresado correctamente!
                </div>
                <div class='invalid-feedback'>
                    Ingrese un teléfono válido
                </div>
            </div>
            <div class='row justify-content-center text-center m-auto mt-2'>
                <div class='col-md-6'>
                    <label for='Domicilio' class='form-label'>Dirección</label>
                    <input type='text' class='form-control' placeholder='Ingrese su dirección' id='Domicilio' name='Domicilio' value='" . $arrayPersonas[$i - 1]->getDomicilio() . "' required>
                    <div class='valid-feedback'>
                        Dato ingresado correctamente!
                    </div>
                    <div class='invalid-feedback'>
                        Ingrese una dirección válida
                    </div>
                </div>
            </div>
            <div class='d-flex align-content justify-content-center'>
                <a href='../buscarPersona.php' class='btn btn-primary link-light px-3 mx-5 fs-5'>Volver atrás</a>
                <button type='submit' class='btn btn-primary btn-sm mx-5 px-3 fs-5'>Enviar</button>
            </div>
        </form>
        <div class='mt-3 w-100 text-left' id='error'>
            <!-- Aca se muestran los mensajes de error del formulario -->
        </div>";
    } else {
        $mensaje = "<h3>No hay ninguna persona con el DNI N°" . $dniPersona . " en la base de datos.</h3>";
    }
} else {
    $mensaje = "<h2 class='text-center'>No se ha recibido ningún número de documento.</h2>";
}
?>
<div class="vh-100 row w-100 align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-50 vh-100 bg-gris ">
        <div class="col-md-12">
            <?php
            echo $mensaje;
            ?>
        </div>
    </div>
</div>
<script src="../js/scriptAccionBuscarPersona.js"></script>
<?php include_once '../estructura/footer.php'; ?>