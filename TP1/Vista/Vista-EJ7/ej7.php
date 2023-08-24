<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 7</title>
</head>
<body>
    <form action="operacion.php" method="get">
        <input type="number" name="primer-numero" id="primer-numero" placeholder="Primer número" required>
        <input type="number" name="segundo-numero" id="segundo-numero" placeholder="Segundo número" required>
        <select name="operacion" id="operacion">
            <option value="+">Suma</option>
            <option value="-">Resta</option>
            <option value="*">Multiplicación</option>
        </select>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>