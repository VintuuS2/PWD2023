/*
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('form');

    const patenteInput = document.getElementById('patente-cambio');
    const textoFormatoPatente = document.querySelector('.formatoCorrectoPatente');
    const textoCaracteresPatente = document.querySelector('.caracteresCorrectosPatente');

    const documentoInput = document.getElementById('dni-cambio');
    const textoFormatoDocumento = document.querySelector('.formatoCorrectoDNI');
    const textoCaracteresDocumento = document.querySelector('.caracteresCorrectosDNI');

    form.addEventListener('submit', function(event) {
        // Verifica la patente
        const patenteValue = patenteInput.value.toUpperCase();
        const formatoValidoPatente = /^[A-Z]{3}\s\d{3}$/;
        if (!formatoValidoPatente.test(patenteValue)) {
            textoFormatoPatente.style.display = 'block';
        } else {
            textoFormatoPatente.style.display = 'none';
        }
        if (patenteValue.length != 7) {
            textoCaracteresPatente.style.display = 'block';
        } else {
            textoCaracteresPatente.style.display = 'none';
        }
        if (!formatoValidoPatente.test(patenteValue) || patenteValue.length != 7) {
            event.preventDefault(); // Evita que el formulario se envíe
            patenteInput.style.border = '1px solid red';
        } else {
            patenteInput.style.border = '1px solid green';
        }
        // Verifica el documento
        const dniValue = documentoInput.value;
        const formatoValidoDNI = /^\d{1,8}$/;
        if (!formatoValidoDNI.test(dniValue)) {
            textoFormatoDocumento.style.display = 'block';
        } else {
            textoFormatoDocumento.style.display = 'none';
        }
        if (dniValue.length > 8) {
            textoCaracteresDocumento.style.display = 'block';
        } else {
            textoCaracteresDocumento.style.display = 'none';
        }
        if (!formatoValidoDNI.test(dniValue) || dniValue.length > 8) {
            event.preventDefault(); // Evita que el formulario se envíe
            documentoInput.style.border = '1px solid red';
        } else {
            documentoInput.style.border = '1px solid green';
        }
    });
});
*/


$(document).ready(function(){
    var forms = $(".needs-validation");

    forms.on('submit',function(event){
        var formulario = this;

        if (!formulario.checkValidity()){
            event.preventDefault();
            event.stopPropagation();
        }

        $(formulario).addClass("was-validated");
    });
    $(".needs-validation input[pattern]").on("input", function(){
        var input = $(this);
        var mensajeError = "";

        if (input.prop("required") && input.val() === ""){
            mensajeError = input.attr("errorVacio");
        } else if (input.prop("pattern") && !input[0].checkValidity()){
            mensajeError = input.attr("errorPatron");
        }
        if (mensajeError != ""){
            input.siblings(".invalid-feedback").text(mensajeError);
        } else {
            input.siblings(".invalid-feedback").html("");
        }
    });
})