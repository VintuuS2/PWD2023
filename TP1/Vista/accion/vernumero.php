<?php
$tituloPagina = "TP1-Positivo o negativo";
include_once '../../../TP4/configuracion.php';
include_once '../estructura/header.php';
include_once '../../Control/numero.php';
if ($_GET) {
    $numero = $_GET['numero_form'];
    if ($numero != "") {
        $num = new Numero();
        $tipoNumero = $num->obtenerTipo($numero);
        $salida = "El número que fue ingresado es ";
        switch ($tipoNumero) {
            case 0:
                $salida .= "cero.";
                break;
            case 1:
                $salida .= "positivo.";
                break;
            case -1:
                $salida .= "negativo.";
                break;
        }
    } else {
        $salida = "No se ha enviado ningun número.";
    }
} else {
    $salida = "No se han recibido datos.";
}
?>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <div class="div-mensaje">
                <?php
                echo $salida;
                echo "<a href='ej1.php'>Volver atras</a>";
                ?>
            </div>
        </div>
    </div>

<?php include_once '../estructura/footer.php'; ?>