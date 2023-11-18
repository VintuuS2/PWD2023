$(document).ready(function () {
  var registro = $("#registro");

  registro.on("submit", function (event) {
    var formulario = this;
    var contrasenia = $('#password-register').val();
    var confirmarContrasenia = $('#password-registerConfirm');
    confirmarContrasenia.attr("pattern","^"+contrasenia+"$");

    if (!formulario.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
    }

    $(formulario).addClass("was-validated");
  });
  
  $(".needs-validation input[pattern]").on("input", function () {
    var input = $(this);
    if (input.has("#password-register")){
      var contrasenia = $('#password-register').val();
      var confirmarContrasenia = $('#password-registerConfirm');
      confirmarContrasenia.attr("pattern","^"+contrasenia+"$");
    }
    var mensajeError = "";

    if (input.prop("required") && input.val() === "") {
      mensajeError = input.attr("errorVacio");
    } else if (input.prop("pattern") && !input[0].checkValidity()) {
      mensajeError = input.attr("errorPatron");
    }

    if (mensajeError != "") {
      input.siblings(".invalid-feedback").html(mensajeError);
    } else {
      input.siblings(".invalid-feedback").text("");
    }
  });
});
