<?php
include_once '../menuTP4.php';
include_once '../Control/AbmPersona.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir persona</title>
</head>
<body>
    <div class="container border shadow mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="col-4 p-5">
                <div class="p-2 text-center">
                    <?php  
                        if ($_POST){
                            $dni = $_POST['NroDni'];
                        
                            $personas = new AbmPersona();
                            $listaPersonas = $personas->buscar(null);
                            $existe = false;
                            $i=0;
                            while (!$existe && $i<count($listaPersonas)) {
                                if($listaPersonas[$i]->getNroDni()==$dni){
                                    $existe = true;
                                }
                                $i++;
                            }
                            if ($existe){
                                echo "Ya hay una persona cargada con este número de documento";
                            } else {
                                $respuesta = $personas->alta($_POST);
                                if ($respuesta){
                                    echo "Se cargó exitosamente";
                                } else {
                                    echo "Hubo un error al cargar la persona.";
                                }
                            }
                        }
                    ?>
                </div>
                <div class="w-100"></div>
                <div class="p-2 d-flex justify-content-center align-items-center">
                    <a class="btn btn-primary" role="button" href="../Vista/listarPersonas.php">Ver lista de personas</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>