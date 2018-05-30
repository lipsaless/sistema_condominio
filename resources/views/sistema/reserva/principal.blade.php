@extends('sistema.sistema')

<style>
    #novo:hover {
        color: white;
    }
</style>

@section('view-principal')

<!-- Title -->
<h1 class="text-center">Reservas</h1>

    <!-- Principal -->
    <div id="principal-reserva">
        <!--Buttons-->
        <div id="buttons">
            <div class="col-md-12 row">
                <button id="btn-option-back-reserva" data-module="" class="ui basic button btn-resp col-xs-12" style="display:none">
                    <i class="fa fa-reply"></i>
                    <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
                </button>
                <button id="btn-option-new-reserva" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('reserva-form') }}">
                    <i class="fa fa-plus"></i>
                    <a id="novo" href="" style="color: white !important; text-decoration: none !important;">Novo</a>
                </button>
            </div>
        </div>

        <!-- Form -->
        <div id="form-reserva-cadastro"></div>

        <!-- Consultar -->
        <form id="principal-reserva-consultar" action="{{ route('reserva-grid') }}" method="POST" style="display:none;">
            <div class="row">
                <div class="col-md-3">
                    <label for="no_apartamento" class="font-weight-bold">Apartamento:</label>
                    <input type="text" name="no_apartamento" id="apartamento" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="" class="font-weight-bold">Morador:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="" class="font-weight-bold">Local de Reserva:</label>
                    <select class="custom-select">
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <div>&nbsp;</div>
                    <button id="btn-consultar-reserva" type="submit" class="ui black button">Consultar</button>
                </div>
            </div>
        </form>
        <hr>
        <!-- Grid -->
        <div id="grid-reservas"></div>
    </div>

<script>
    $(document).ready(function(){
        /*Form*/
        $('#btn-option-new-reserva').unbind('click').click(function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-reservas').hide();
                    $('#btn-option-new-reserva').css("display", "none");
                    $('#btn-option-back-reserva').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Cadastro de reserva');
                    $('#form-reserva-cadastro').html(formHtml);
                    $('#form-reserva-cadastro').show();
                }
            });
        });

        /*Voltar*/
        $('#btn-option-back-reserva').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back-reserva').hide();
            $('#btn-option-new-reserva').show();
            $('#form-reserva').hide();
            $('#grid-reservas').show();
            $('h1').html('Reservas');
        });

        /*Excluir*/
        $(document).on('click', '.reserva-excluir', function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: '{{ route("reserva-excluir") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize()
            }).done(function() {
                /*Submit conultar*/
                $('#btn-consultar-reserva').unbind('click').click();

                //msg
                return message('success', 'Reserva excluída com sucesso!');
            });
        });

        /*Form*/
        $('#principal-reserva-consultar').submit(function() {
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(data){

                text = '';

                    text += '	<table id="info-reserva" class="table user-list">';
                    text += '   	<thead>';
                    text += '       	<tr>';
                    text += '           	<th width="40"><span>Reserva</span></th>';
                    text += '            	<th><span>Apartamento/Bloco</span></th>';
                    text += '            	<th><span>Morador</span></th>';
                    text += '            	<th><span>Data</span></th>';
                    text += '            	<th>&nbsp;</th>';
                    text += '			</tr>';
                    text += '		</thead>';
                    text += '		<tbody>';
                        $.each(data, function(key, rs) {
                            let id = rs.id_reserva;

                            text += '           <tr id="'+id+'">';
                            text += '               <td>'+rs.no_reserva_local+'</td>';
                            text += '               <td><a class="ui black circular label">'+rs.no_apartamento+'</a></td>';
                            text += '               <td>'+rs.no_morador+'</td>';
                            text += '               <td id="dt_reserva">'+rs.dt_reserva+'</td>';
                            text += '               <td style="text-align: center;">';
                            text += '                   <button id="reserva-excluir" class="ui red button reserva-excluir" data-action="'+id+'" style="text-align: center;"><i class="fas fa-times"></i></button>';
                            text += '               </td>';
                            text += '           </tr>'
                        });
                    text += '       </tbody>';

                /*Grid*/
                $('#grid-reservas').html(text);

                /*Data-Table*/
                $('#info-reserva').DataTable({
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
                        "sSearch": "Nome",
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
            return false;
        });
        /*Submit consultar*/
        $('#btn-consultar-reserva').click();
    });
</script>
@stop