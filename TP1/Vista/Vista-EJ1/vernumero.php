<?php
    include_once '../../../TP4/configuracion.php';
    include_once '../../../navbar.php';
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
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