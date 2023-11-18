$(document).ready(function () {
  var login = $("#login");

  login.on("submit", function (event) {
    var formulario = this;

    if (!formulario.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
      if ($('#password-registerConfirm') !== $('#password-register')){
        $('#password-registerConfirm').siblings(".invalid-feedback").html($('#password-registerConfirm').attr("errorPatron"))
      }
    }

    $(formulario).addClass("was-validated");
  });
  
  $(".needs-validation input[pattern]").on("input", function () {
    var input = $(this);
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
