<?php
include_once '../../configuracion.php';
include_once '../../../navbar.php';
if ($_GET) {
    $dniPersona = $_GET['dni-modificar'];
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
            <h2 style='text-align: center;' class='w-100'>Modificar Persona DNI N°" . $dniPersona . " en la Base de Datos</h2>
            <input type='text' class='form-control' id='NroDni' name='NroDni' style='display: none;' value='$dniPersona'>
            
            <div class='col-md-4'>
                <label for='Nombre' class='form-label'>Nombre</label>
                <input type='text' class='form-control' id='Nombre' placeholder='Su nombre' name='Nombre' value='". $arrayPersonas[$i-1]->getNombre() . "'required>
                <div class='valid-feedback'>
                    Dato ingresado correctamente!
                </div>
                <div class='invalid-feedback'>
                    Ingrese un nombre válido
                </div>
            </div>
            <div class='col-md-4'>
                <label for='Apellido' class='form-label'>Apellido</label>
                <input type='text' class='form-control' id='Apellido' placeholder='Su apellido' name='Apellido' value='". $arrayPersonas[$i-1]->getApellido() ."' required>
                <div class='valid-feedback'>
                    Dato ingresado correctamente!
                </div>
                <div class='invalid-feedback'>
                    Ingrese un apellido válido
                </div>
            </div>
            <input type='text' class='form-control' id='fechaNac' name='fechaNac' style='display: none;' value='".$arrayPersonas[$i-1]->getFechaNac()."'>
            <div class='col-md-4'>
                <label for='Telefono' class='form-label'>Teléfono</label>
                <input class='form-control' type='text' pattern='[0-9]+' maxlength='11' min='0' placeholder='Ejemplo: 299-1231234' name='Telefono' id='Telefono' value='". $arrayPersonas[$i-1]->getTelefono() ."' required>
                <div class='valid-feedback'>
                    Dato ingresado correctamente!
                </div>
                <div class='invalid-feedback'>
                    Ingrese un teléfono válido
                </div>
            </div>
            <div class='row justify-content-center text-center mt-2' style='margin: auto;'>
                <div class='col-md-6'>
                    <label for='Domicilio' class='form-label'>Dirección</label>
                    <input type='text' class='form-control' placeholder='Ingrese su dirección' id='Domicilio' name='Domicilio' value='". $arrayPersonas[$i-1]->getDomicilio() ."' required>
                    <div class='valid-feedback'>
                        Dato ingresado correctamente!
                    </div>
                    <div class='invalid-feedback'>
                        Ingrese una dirección válida
                    </div>
                </div>
            </div>
            <div class='d-flex align-content justify-content-center'>
                <button class='btn btn-primary' style='padding: 5px; font-size:1.1em; margin-top:15px; margin-right:20px;'><a href='../buscarPersona.php' class='link-light' style='padding: 5px; text-decoration:none;'>Volver atrás</a></button>
                <button type='submit' class='btn btn-primary btn-sm' style='margin-top:15px; font-size:1.1em;'>Enviar</button>
            </div>
        </form>
        <div class='mt-3 w-100' id='error' style='text-align:left;'>
            <!-- Aca se muestran los mensajes de error del formulario -->
        </div>";
    } else {
        $mensaje = "<h3>No hay ninguna persona con el DNI N°" . $dniPersona . " en la base de datos.</h3>";
    }
} else {
    $mensaje = "<h2>No se ha recibido ningún número de documento.</h2>";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Ver auto</title>
    <script src="../js/scriptAccionBuscarPersona.js"></script>
</head>
<body>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center; text-align:center;">
            <?php
            echo $mensaje;
            ?>
        </div>
    </div>
</body>
</html>