function typeWriter(elemento) {
    const textoArray = elemento.innerHTML.split('');
    elemento.innerHTML = '';
    textoArray.forEach((letra, i) => {
        setTimeout(() => elemento.innerHTML += letra, 75 * i);
    });
}

//AJAX
function ajax() 
{
    $(document).ajaxStart(function() {
        $('#loader').css('display', 'block')
    });

    $(document).ajaxStop(function() {
        $('#loader').css('display', 'none')
    });
}

//MENSAGEM
function message(type, msg) {
    if (msg) {
        //CONFIG MENSAGEM
        toastr.options = {
                // "closeButton": true,
                "closeButton": true,
                "newestOnTop": true,
                "progressBar": true,
                "showDuration": "600",
                "progressBar": true,
                "hideDuration": "500",
                "timeOut": "8500",
                "extendedTimeOut": "1000",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut",
                "positionClass": "toast-top-center",
        }
    }
    //EXIBE MENSAGEM
    Command:toastr[type]('<strong>'+msg+'</strong>');
}