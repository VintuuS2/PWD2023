<?php
include_once '../../../TP4/configuracion.php';
include_once '../../../navbar.php';
?>
<!DOCTYPE html>

<head lang="es">
    <title>Ejercicio 1, TP1</title>
    <script src="../../Control/Control-EJ1/numero.php"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="../../../TP2/Util/TP1/Util-EJ1/script.js"></script>
    <link rel="stylesheet" href="../../../TP4/Vista/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="contenedor">
        <div class="d-flex" style="margin: auto; flex-wrap:wrap; flex-direction:column; align-items:center;text-align:center;">
            <form id="form" name="form" method="get" action="vernumero.php">
                Número: <input type="number" name="numero_form" id="numero_form"><br>
                <span id="span"></span><br>
                <input id="enviar" name="enviar" type="submit" class="btn btn-primary">
            </form>
            <a href="vernumero.php">Ver respuesta</a>
        </div>
    </div>
</body>

</html>