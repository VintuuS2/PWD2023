$(document).ready(function () {
    var select = $('#language-select')
    var resultado = $('.resultado');
    var form = $('#form2');

    if (resultado.children().length < 1) {
        form.css("margin-top", "-400px");
    } else {
        form.css("margin-top", "20px");
    }

    $('#btnAudio').click(function () {
        $('#m')[0].play();
    });

    $('#btn-itercambiar-idiomas').click(function () {
        // Se obtienen los paises seleccionados
        var source = $("#src").val();
        var target = $("#tgt").val();
        // Si no hay ningún pais seleccionado
        if (source == "" && target == "") {
            // El botón se pone rojo ya que no puede realizar la operación
            $('#btn-itercambiar-idiomas').addClass('btn-danger');
            $('#btn-itercambiar-idiomas').removeClass('btn-light');
        } else {
            $('#btn-itercambiar-idiomas').addClass('btn-light');
            $('#btn-itercambiar-idiomas').removeClass('btn-danger');
            // Se intercambian los paises
            $("#src").val(target);
            $("#tgt").val(source);
        }
    });

    select.on('change', function(){
        var selectedLanguage = select.val();
        document.cookie = "selectedLanguage=" + selectedLanguage
        location.reload();
    })

});