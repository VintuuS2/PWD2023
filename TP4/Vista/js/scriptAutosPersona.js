document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    const dniDuenioInput = document.getElementById('dni-duenio');
    const invalidFormato = document.querySelector('.formatoCorrecto');
    const invalidCaracteres = document.querySelector('.caracteresCorrectos');

    form.addEventListener('submit', function (event) {
        const dniValue = dniDuenioInput.value.toUpperCase();
        const formatoValido = /^\d{1,8}$/;

        if (!formatoValido.test(dniValue)) {
            invalidFormato.style.display = 'block';
        } else {
            invalidFormato.style.display = 'none';
        }
        if (dniValue.length > 8) {
            invalidCaracteres.style.display = 'block';
        } else {
            invalidCaracteres.style.display = 'none';
        }
        if (!formatoValido.test(dniValue) || dniValue.length > 8) {
            event.preventDefault(); // Evita que el formulario se envíe
            dniDuenioInput.style.border = '1px solid red';
        } else {
            dniDuenioInput.style.border = '1px solid green';
        }
    });
});