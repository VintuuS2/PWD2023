<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="../../../TP2/Util/TP1/Util-EJ7/script.js"></script>
    <title>Ejercicio 7</title>
</head>
<body>
    <form id="form" action="operacion.php" method="get">
        <input type="number" name="primer-numero" id="primer-numero" placeholder="Primer número">
        <span id="span-primer"></span>
        <input type="number" name="segundo-numero" id="segundo-numero" placeholder="Segundo número">
        <span id="span-segundo"></span>
        <select name="operacion" id="operacion">
            <option value="+">Suma</option>
            <option value="-">Resta</option>
            <option value="*">Multiplicación</option>
        </select>
        <input id="enviar" type="submit" value="Enviar">
    </form>
</body>
</html>