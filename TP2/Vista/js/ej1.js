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