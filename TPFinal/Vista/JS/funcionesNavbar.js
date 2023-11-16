// Función para obtener el valor de una cookie por nombre
function getCookie(cookieName) {
    var name = cookieName + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var cookieArray = decodedCookie.split(';');
    var cookieValor = "";

    for (var i = 0; i < cookieArray.length; i++) {
        var cookie = cookieArray[i].trim();
        if (cookie.indexOf(name) == 0) {
            cookieValor = cookie.substring(name.length, cookie.length);
        }
    }
    return cookieValor;
}

$(document).ready(function(){
    form = $('#form-nav')
    select = $('#selectVerComo');
    optionSelect = select.val();
    datos = {opcionSeleccionada: optionSelect,};

    if (document.cookie.includes('login=1')){
        $('.is').hide();
        if (document.cookie.includes('verComo=0')){
            $('.verComo').hide();
        }
    } else {
        $('.cf').hide();
        $('.cs').hide();
        $('.verComo').hide();
    }

    select.on('change',function(){
        form[0].submit();
        console.log(select.val());
    })

    form.on('submit',function(event){
        event.preventDefault();
        $.ajax({type: 'Post',
        url: "http://localhost/PWD2023/TPFinal/Vista/Menu/verMenu.php",
        data: optionSelect,
        success: function(response){
            console.log(response);
        }});
    })
})