<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej3</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("form").submit(function(event) {
                var usuario = $("#usuario").val();
                var contra = $("#contra").val();

                if (usuario.trim() === "" || contra.trim() === "") {
                    alert("Por favor, completa todos los campos.");
                    event.preventDefault(); // Evita el envío del formulario
                }

                if (contra.length < 8) {
                    alert("La contraseña debe tener al menos 8 caracteres.");
                    event.preventDefault();
                }

                if (contra === usuario) {
                    alert("La contraseña no puede ser igual al nombre de usuario.");
                    event.preventDefault();
                }

                var letrasNumeros = /^[0-9a-zA-ZñÑ]+$/;
                if (!contra.match(letrasNumeros)) {
                    alert("La contraseña debe contener letras, números y la letra 'ñ' solamente.");
                    event.preventDefault();
                }
            });
        });
    </script>
</head>

<body>
    <form action="./Accion/a_alta_usuario.php" method="post" onsubmit="return validar();">
        Usuario: <input type="text" name="usuario" id="usuario">
        <br>
        Password: <input type="password" name="contra" id="contra">
        <input type="submit" value="Enviar">
    </form>
    <a href="./Accion/a_alta_usuario.php">Accion</a>
</body>

</html>