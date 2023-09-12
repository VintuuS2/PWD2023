
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
        const dniValue = documentoInput.value.toUpperCase();
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