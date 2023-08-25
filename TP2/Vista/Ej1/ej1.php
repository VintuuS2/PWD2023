<?php
include_once '../../../menu-paginas.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                // Evita que el formulario se envíe automáticamente
                event.preventDefault();

                // Validación simple: verifica si los campos están vacíos
                var name = $("#name").val();
                var email = $("#email").val();

                if (name === "" || email === "") {
                    alert("Por favor, complete todos los campos.");
                } else {
                    alert("Formulario enviado correctamente.");
                    // Aquí podrías agregar lógica adicional para enviar el formulario
                }
            });
        });
    </script>
</head>
<body>
    <h1>Decidimos usar JQuery como framework de JS después de investigación de otros frameworks</h1>
    <h3>Ejercicio 1: Investigue y pruebe la validación de formularios usando alguna librería o framework javaScript (JQuery, Mootools, Dojo, Prototype, etc).</h3>
    <br><br>
    <h5>Ejemplo:</h5>
    <form>
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email">
        <br>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>