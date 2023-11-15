$(document).ready(function(){
    if (document.cookie.includes('login=1')){
        $('.is').hide();
        /*if (document.cookie.includes('verComo=0')){
            $('.verComo').hide();
        }*/
    } else {
        $('.cf').hide();
        $('.cs').hide();
        $('.verComo').hide();
    }
})