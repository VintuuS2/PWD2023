$(document).ready(function(){
    if (document.cookie.includes('login=1')){
        $('.is').hide();
    } else{
        $('.cf').hide();
        $('.cs').hide();
    }
})