<?php
    include_once '../../../menu-paginas.php';

    include_once '../../Control/Control-EJ1/numero.php';
    if ($_GET) {
        $numero = $_GET['numero_form'];
        if ($numero != "") {
            $num = new Numero();
            $tipoNumero = $num->obtenerTipo($numero);
            $salida = "El número que fue ingresado es ";
            switch ($tipoNumero) {
                case 0: $salida .= "cero."; break;
                case 1: $salida .= "positivo."; break;
                case -1: $salida .= "negativo."; break;
            }
            
        } else {
            $salida = "No se ha enviado ningun número.";
        }
    } else {
            $salida = "No se han recibido datos.";
    }
?>
<!DOCTYPE html>
<head>
    <title>Ver tipo de número</title>
</head>
<body>
    <div class="div-mensaje">
        <?php
            echo $salida;
            echo "<a href='ej1.php'>Volver atras</a>";
        ?>
    </div>
</body>
</html>