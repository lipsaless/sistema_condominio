@extends('sistema.sistema')

@section('view-principal')

<style>
    #novo:hover {
        color: white;
    }
</style>

<!-- Title -->
<h1 class="text-center">Visitantes</h1>

<!-- Principal -->
<div id="principal-visitantes">
    <!-- Buttons -->
    <div id="buttons">
        <div class="col-md-12 row">
            <button id="btn-option-back-visitante" data-module="" data-action="{{ route('visitante-principal') }}" class="ui basic button btn-resp col-xs-12" style="display:none;">
                <i class="fa fa-reply"></i>
                <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
            </button>
            <button id="btn-option-new-visitante" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('visitante-form') }}">
                <i class="fa fa-plus"></i>
                <a id="novo" href="" style="color: white !important; text-decoration: none !important;">Novo</a>
            </button>
        </div>
    </div>

    <!-- Form -->
    <div id="form-visitantes"></div>

    <!-- Consultar -->
    <form id="principal-visitante-consultar" action="{{ route('visitante-grid') }}" method="POST" style="display:none;">
        <div class="row">
            <div class="col-md-4">
                <label for="" class="font-weight-bold">Nome:</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-2">
                <div>&nbsp;</div>
                <button id="btn-consultar-visitante" type="submit" class="ui black button">Consultar</button>
            </div>
        </div>
    </form>
    <hr>
    <!-- Grid -->
    <div id="grid-visitantes"></div>
</div>

<script>
    $(document).ready(function(){
        /*Form*/
        $(document).on('click', '#btn-option-new-visitante', function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-visitantes').hide();
                    $('#btn-option-new-visitante').css("display", "none");
                    $('#btn-option-back-visitante').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Cadastro de visitante');
                    $('#form-visitantes').html(formHtml);
                    $('#form-visitantes').show();
                }
            });
        });

        /*Excluir*/
        $(document).on('click', '.visitante-excluir', function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: '{{ route("visitante-excluir") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize()
            }).done(function() {
                /*Submit conultar*/
                $('#btn-consultar-visitante').unbind('click').click();

                //msg
                return message('success', 'Visitante excluído com sucesso!');
            });
        });

        /*Consultar*/
        $('#principal-visitante-consultar').unbind('submit').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(data){
                //MONTAR GRID
                text = '';

                    text += '	<table id="info-visitantes" class="ui table">';
                    text += '   	<thead>';
                    text += '       	<tr>';
                    text += '            	<th><span><i class="fas fa-user-circle"></i> Visitante</span></th>';
                    text += '            	<th><span><i class="fas fa-home"></i> Apartamento visitado</span></th>';
                    text += '            	<th><span><i class="fas fa-user"></i> Morador<span></th>';
                    text += '            	<th>&nbsp;</th>';
                    text += '			</tr>';
                    text += '		</thead>';
                    text += '		<tbody>';

                        $.each(data, function(key, rs) {
                            let id = rs.id_visitante;

                            text += '           <tr id="'+id+'">';
                            text += '               <td>'+rs.no_visitante+'</td>';
                            text += '               <td><a class="ui black circular label">'+rs.no_apartamento+'</a></td>';
                            text += '               <td>'+rs.no_morador+'</td>';
                            text += '               <td style="text-align: center;">';
                            text += '                   <button id="visitante-excluir" class="ui red button visitante-excluir" data-action="'+id+'" style="text-align: center;"><i class="fas fa-times"></i></button>';
                            text += '               </td>';
                            text += '           </tr>'
                        });
                    
                    text += '       </tbody>';
                    text += '    </table>';

                /*Grid*/
                $('#grid-visitantes').html(text);

                /*Data-Table*/
                $('#info-visitantes').DataTable({
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
        });
        /*Submit consultar*/
        $('#btn-consultar-visitante').click();
    });
</script>
@stop