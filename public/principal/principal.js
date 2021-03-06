function typeWriter(elemento) {
    const textoArray = elemento.innerHTML.split('');
    elemento.innerHTML = '';
    textoArray.forEach((letra, i) => {
        setTimeout(() => elemento.innerHTML += letra, 75 * i);
    });
}

//AJAX
// $(document).ready(function () 
// {
    $(document).ajaxStart(function() {
        $('#loader').show()
    });

    $(document).ajaxStop(function() {
        $('#loader').hide()
    });
// });

function msg(json) {
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
    Command:toastr[json.type]('<strong>'+json.msg+'</strong>');
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

function carregarListaApt() {
    $('#no_apartamento').autocomplete({
        source: JSON.parse($('#lista-apt').val()),
        select: function(evento, itemSelecionado) {
            if (!itemSelecionado.item) {
                $('[name="id_apartamento"]').val(null);
            } else {
                $('[name="id_apartamento"]').val(itemSelecionado.item.id);
                //AJAX
                $.ajax({
                    type: 'GET'
                    ,url: $('#rota-morador-apt').val()
                    ,dataType: 'json'
                    ,data: {
                        id_apartamento: itemSelecionado.item.id,
                    }
                }).done(function(data) {
                    let html = '';
                    $.each(data, function(key, rs) {
                        html += '<option value="'+rs.id_morador+'">'+rs.no_morador+'</option>';
                    });

                    $('#id_morador').css('opacity', '1 !important');
                    $('#id_morador').html(html);
                });
            }
        }
    })
}

function formatted(campo) {
    campo.substr(0, 3) + '-' + campo.substr(3, 3) + '-' + campo.substr(6,4);
} 