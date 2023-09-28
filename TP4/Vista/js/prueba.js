// Cuando el documento esté listo (cargado), haremos algunas cosas.
$(document).ready(function () {
    // Encontramos todos los formularios que necesitan ser validados.
    var forms = $(".needs-validation");
    console.log(forms);
    // Cuando alguien intenta enviar un formulario...
    forms.on("submit", function (event) {
      // Guardamos el formulario que se está enviando.
      var formulario = this;
  
      // Si el formulario no está lleno de forma correcta...
      if (!formulario.checkValidity()) {
        // No dejamos que el formulario se envíe.
        event.preventDefault();
        // Detenemos cualquier otra cosa que esté tratando de hacer el formulario.
        event.stopPropagation();
      }
  
      // Marcamos el formulario como "fue validado".
      $(formulario).addClass("was-validated");
    });
  
    // Escuchamos cuando alguien escribe en los campos de texto con patrones especiales.
    $(".needs-validation input[pattern]").on("input", function () {
      // Guardamos el campo de texto en el que alguien está escribiendo.
      var campo = $(this);
      console.log(campo);
      // Preparamos un lugar para guardar mensajes de error.
      var mensajeError = "";
  
      // Si el campo es necesario (requerido) y está vacío...
      if (campo.prop("required") && campo.val() === "") {
        // Decimos que se necesita llenar este campo.
        mensajeError = campo.attr("errorVacio");
      } else if (campo.prop("pattern") && !campo[0].checkValidity()) {
        // Si tiene un patrón especial y no coincide con ese patrón...
        // Decimos que hay un error de patrón.
        mensajeError = campo.attr("errorPatron");
      }
  
      // Mostramos el mensaje de error en un lugar especial.
      if (mensajeError != "") {
        campo.siblings(".invalid-feedback").text(mensajeError);
      } else {
        // Si no hay error, borramos cualquier mensaje anterior.
        campo.siblings(".invalid-feedback").text("");
      }
    });
  });
  