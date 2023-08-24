<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ejercicio 3</title>
</head>
<body>
    <form action="mensaje.php" method="post">
        <div class="div-input">
            <label for="nombre-usuario">Nombre: </label><input type="text" name="nombre-usuario" id="nombre-usuario" required>
        </div>
        <div class="div-input">
            <label for="apellido-usuario">Apellido: </label><input type="text" name="apellido-usuario" id="apellido-usuario" required>
        </div>
        <div class="div-input">
            <label for="edad-usuario">Edad: </label><input type="number" name="edad-usuario" id="edad-usuario" required>
        </div>
        <div class="div-input">
            <label for="direccion-usuario">Dirección: </label><input type="text" name="direccion-usuario" id="direccion-usuario" required>
        </div>
        <input type="submit" value="Enviar datos">
    </form>
</body>
</html>