<?php
include_once '../../../menu-paginas.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Estilos3-4-5-6/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="../../../TP2/Util/TP1/Util-EJ5/script.js"></script>
    <title>Ejercicio 5</title>
</head>
<body>
    <form id="form" action="mensaje5.php" method="post">
        <div class="div-input">
            <label for="nombre-usuario">Nombre: </label><input type="text" name="nombre-usuario" id="nombre-usuario">
            <span id="span-nombre"></span>
        </div>
        <div class="div-input">
            <label for="apellido-usuario">Apellido: </label><input type="text" name="apellido-usuario" id="apellido-usuario">
            <span id="span-apellido"></span>
        </div>
        <div class="div-input">
            <label for="edad-usuario">Edad: </label><input type="number" name="edad-usuario" id="edad-usuario">
            <span id="span-edad"></span>
        </div>
        <div class="div-input">
            <label for="direccion-usuario">Dirección: </label><input type="text" name="direccion-usuario" id="direccion-usuario">
            <span id="span-direccion"></span>
        </div>
        <div class="div-input">
            <label for="estudios-usuario">Nivel de estudios:</label><br>
            <input checked type="radio" name="radio" id="sin-estudios-usuario" value="se"> Sin estudios<br>
            <input type="radio" name="radio" id="estudios-primarios-usuario" value="ep"> Estudios primarios<br>
            <input type="radio" name="radio" id="estudios-secundarios-usuario" value="es"> Estudios secundarios<br>
            <span id="span-estudios"></span>
        </div>
        <div class="div-input">
            <label for="genero-usuario">¿Cuál es su género?</label>
            <select name="genero-usuario" id="genero-usuario">
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
            </select>
            <span id="span-genero"></span>
        </div>
        <input type="submit" value="Enviar datos">
    </form>
</body>
</html>