<?php
$tituloPagina = "TP2-Acceso";
include_once '../../../configuracionProyecto.php';
include_once "../../../Control/Ej3/Usuarios.php";
include_once '../estructura/header.php';
if ($_POST) {
    $datosLoggeo['usuario'] = $_POST['usuario'];
    $datosLoggeo['clave'] = $_POST['contra'];
    $usuarios1 = new Usuarios();
    if ($usuarios1->verificarCredenciales($datosLoggeo['usuario'], $datosLoggeo['clave'])) {
        $mensaje = "<h2> Bienvenido de vuelta, " . $datosLoggeo['usuario'] . "<h2>";
    } else {
        $mensaje = "<h2> Los datos no coinciden con nuestra base de datos</h2>";
    }
} else {
    $mensaje = "<h2> Hubo un error, vuelva y complete el formulario de nuevo</h2>";
}
?>

    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">ç
            <?php echo $mensaje; ?>
        </div>
    </div>
<?php
include_once '../estructura/footer.php';
?>