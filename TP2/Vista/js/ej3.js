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