function typeWriter(elemento) {
    const textoArray = elemento.innerHTML.split('');
    elemento.innerHTML = '';
    textoArray.forEach((letra, i) => {
        setTimeout(() => elemento.innerHTML += letra, 75 * i);
    });
}

//AJAX
// function ajax() 
// {
//     $(document).ajaxStart(function() {
//         $('#loader').css('display', 'block')
//     });

//     $(document).ajaxStop(function() {
//         $('#loader').css('display', 'none')
//     });
// }

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

function dataTableTraducao() {
    //Tradução
    $tradutor = {
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados por página",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Nome ou Apartamento",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        }
    }
    return $tradutor;
}