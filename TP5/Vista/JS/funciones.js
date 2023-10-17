$(document).ready(function () {
    var select = $('#language-select')
    var resultado = $('.resultado');
    var form2 = $('#form2');
    var form = $('#form');

    if (resultado.children().length < 1) {
        form2.css("margin-top", "-400px");
    } else {
        form2.css("margin-top", "20px");
    }

    $('#borrar').on('click',function(){
        $('.resultado').remove();
        if ($('.res1').children().length < 1) {
            form.css("margin-top", "-400px");
        } else {
            form.css("margin-top", "20px");
        }
    });

    $('#borrar').click(function(){
        $('.modal-dialog').remove();
        if ($('.resultado').children().length < 1) {
            form.css("margin-top", "-400px");
        } else {
            form.css("margin-top", "20px");
        }
    });

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
        window.location = $(document).val();
    })

});