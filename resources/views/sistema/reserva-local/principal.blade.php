@extends('sistema.sistema')

@section('view-principal')

<style>
    #novo:hover {
        color: white;
    }
</style>

<!-- Title -->
<h1 class="text-center">Locais de reserva</h1>

<!-- Principal -->
<div id="principal">
    <!-- Buttons -->
    <div id="buttons">
        <div class="col-md-12 row">
            <button id="btn-option-back-reserva-local" data-module="" data-action="{{ route('reserva-local-principal') }}" class="ui basic button btn-resp col-xs-12" style="display:none;">
                <i class="fa fa-reply"></i>
                <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
            </button>
            <button id="btn-option-new-reserva-local" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('reserva-local-form') }}">
                <i class="fa fa-plus"></i>
                <a id="novo" href="" style="color: white !important; text-decoration: none !important;">Novo</a>
            </button>
        </div>
    </div>

    <!-- Form -->
    <div id="div-form-reserva-local"></div>

    <!-- Consultar -->
    <form id="principal-reserva-local-consultar" action="{{ route('reserva-local-grid') }}" method="POST" style="display:none;">
        <div class="row">
            <div class="col-md-4">
                <label for="" class="font-weight-bold">Nome:</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-2">
                <div>&nbsp;</div>
                <button id="btn-consultar-reserva-local" type="submit" class="ui black button">Consultar</button>
            </div>
        </div>
    </form>
    <hr>
    <!-- Grid -->
    <div id="grid-reserva-local"></div>
</div>

<script>
    $(document).ready(function(){
        /*Form*/
        $(document).on('click', '#btn-option-new-reserva-local', function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-reserva-local').hide();
                    $('#btn-option-new-reserva-local').css("display", "none");
                    $('#btn-option-back-reserva-local').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Cadastro de local de reserva');
                    $('#div-form-reserva-local').html(formHtml);
                    $('#div-form-reserva-local').show();
                }
            });
        });

        /*Voltar*/
        $('#btn-option-back-reserva-local').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back-reserva-local').hide();
            $('#btn-option-new-reserva-local').show();
            $('#div-form-reserva-local').hide();
            $('#grid-reserva-local').show();
            $('h1').html('Locais de Reserva');
        });

        
         //TABELA => Editar
         $(document).on('click', '.reserva-local-editar',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("reserva-local-editar") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-reserva-local').hide();
                    $('#btn-option-new-reserva-local').css("display", "none");
                    $('#btn-option-back-reserva-local').css('display','block');
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Editar local de reserva');
                    $('#div-form-reserva-local').html(formHtml);
                    $('#div-form-reserva-local').show();
                }
            });
        });

        /*Excluir*/
        $(document).on('click', '.reserva-local-excluir', function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: '{{ route("reserva-local-excluir") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') {
                        $('#btn-consultar-reserva-local').unbind('click').click();

                        //mensagem
                        return message('success', json.msg);
                    } else {
                        //mensagem
                        return message('success', json.msg);
                        return false;
                    }
                }
            })
        });

        /*Consultar*/
        $('#principal-reserva-local-consultar').unbind('submit').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(data){
                //MONTAR GRID
                text = '';

                    text += '	<table id="info-reserva-local" class="ui table">';
                    text += '   	<thead>';
                    text += '       	<tr>';
                    text += '            	<th><span><i class="fas fa-home"></i> Local</span></th>';
                    text += '            	<th><span><i class="fas fa-cash"></i> Valor</span></th>';
                    text += '            	<th><span><i class="fas fa-user"></i> Nº Convidados<span></th>';
                    text += '            	<th>&nbsp;</th>';
                    text += '			</tr>';
                    text += '		</thead>';
                    text += '		<tbody>';

                        $.each(data, function(key, rs) {
                            let id = rs.id_reserva_local;

                            text += '           <tr id="'+id+'">';
                            text += '               <td>'+rs.no_reserva_local+'</td>';
                            text += '               <td>'+rs.vl_reserva_local+'</td>';
                            text += '               <td>'+rs.nu_convidados+'</td>';
                            text += '               <td style="text-align: center;">';
                            text += '                   <button id="reserva-local-editar" class="ui blue button reserva-local-editar" data-action="'+id+'" style="text-align: center;" title="Editar local"><i class="fas fa-pencil-alt"></i></button>';
                            text += '                   <button id="reserva-local-excluir" class="ui red button reserva-local-excluir" data-action="'+id+'" style="text-align: center;"><i class="fas fa-times"></i></button>';
                            text += '               </td>';
                            text += '           </tr>'
                        });
                    
                    text += '       </tbody>';
                    text += '    </table>';

                /*Grid*/
                $('#grid-reserva-local').html(text);

                /*Data-Table*/
                $('#info-reserva-local').DataTable({
                    //Tradução
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
                        "sSearch": "Nome do local",
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
                });
            });
        });
        /*Submit consultar*/
        $('#btn-consultar-reserva-local').click();
    });
</script>
@stop