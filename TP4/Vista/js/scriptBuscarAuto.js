document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const patenteInput = document.getElementById('patente-auto');
    const invalidFormato = document.querySelector('.formatoCorrecto');
    const invalidCaracteres = document.querySelector('.caracteresCorrectos');

    form.addEventListener('submit', function (event) {
        const patenteValue = patenteInput.value.toUpperCase();
        const formatoValido = /^[A-Z]{3}\s\d{3}$/;

        if (!formatoValido.test(patenteValue)) {
            invalidFormato.style.display = 'block';
        } else {
            invalidFormato.style.display = 'none';
        }
        if (patenteValue.length != 7) {
            invalidCaracteres.style.display = 'block';
        } else {
            invalidCaracteres.style.display = 'none';
        }
        if (!formatoValido.test(patenteValue) || patenteValue.length != 7) {
            event.preventDefault(); // Evita que el formulario se envíe
            patenteInput.style.border = '1px solid red';
        } else {
            patenteInput.style.border = '1px solid green';
        }
    });
});