@extends('sistema.sistema')

@section('view-principal')

<style>
    #novo:hover {
        color: white;
    }
</style>

<!-- Title -->
<h1 class="text-center">Morador tipo</h1>

<!-- Principal -->
<div id="principal">
    <!-- Buttons -->
    <div id="buttons">
        <div class="col-md-12 row">
            <button id="btn-option-back-morador-tipo" data-module="" data-action="{{ route('morador-tipo-principal') }}" class="ui basic button btn-resp col-xs-12" style="display:none;">
                <i class="fa fa-reply"></i>
                <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
            </button>
            <button id="btn-option-new-morador-tipo" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('morador-tipo-form') }}">
                <i class="fa fa-plus"></i>
                <a id="novo" href="" style="color: white !important; text-decoration: none !important;">Novo</a>
            </button>
        </div>
    </div>

    <!-- Form -->
    <div id="div-form-morador-tipo"></div>

    <!-- Consultar -->
    <form id="principal-morador-tipo-consultar" action="{{ route('morador-tipo-grid') }}" method="POST" style="display:none;">
        <div class="row">
            <div class="col-md-4">
                <label for="" class="font-weight-bold">Nome:</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-2">
                <div>&nbsp;</div>
                <button id="btn-consultar-morador-tipo" type="submit" class="ui black button">Consultar</button>
            </div>
        </div>
    </form>
    <hr>
    <!-- Grid -->
    <div id="grid-morador-tipo"></div>
</div>

<script>
    $(document).ready(function(){
        /*Form*/
        $(document).on('click', '#btn-option-new-morador-tipo', function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-morador-tipo').hide();
                    $('#btn-option-new-morador-tipo').css("display", "none");
                    $('#btn-option-back-morador-tipo').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Cadastro de morador-tipo');
                    $('#div-form-morador-tipo').html(formHtml);
                    $('#div-form-morador-tipo').show();
                }
            });
        });

         /*Voltar*/
         $('#btn-option-back-morador-tipo').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back-morador-tipo').hide();
            $('#btn-option-new-morador-tipo').show();
            $('#form-morador-tipo').hide();
            $('#grid-morador-tipo').show();
            $('h1').html('Tipos de moradores');
        });

        //TABELA => Editar
        $(document).on('click', '.morador-tipo-editar',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("morador-tipo-editar") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-morador-tipo').hide();
                    $('#btn-option-new-morador-tipo').css("display", "none");
                    $('#btn-option-back-morador-tipo').css('display','block');
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Editar morador-tipo');
                    $('#div-form-morador-tipo').html(formHtml);
                    $('#div-form-morador-tipo').show();
                }
            });
        });

        /*Excluir*/
        $(document).on('click', '.morador-tipo-excluir', function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: '{{ route("morador-tipo-excluir") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function (json) {
                    if (json.type == 'success') {
                        $('#btn-consultar-morador-tipo').unbind('click').click();

                        return message('success', json.msg);
                    } else {
                        return message('error', json.msg);
                        return false;
                    }
                }
            }).done(function() {
                /*Submit conultar*/
               

                //msg
                
            });
        });

        /*Consultar*/
        $('#principal-morador-tipo-consultar').unbind('submit').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(data){
                //MONTAR GRID
                text = '';

                    text += '	<table id="info-morador-tipo" class="ui selectable table">';
                    text += '   	<thead>';
                    text += '       	<tr>';
                    text += '            	<th><span><i class="fas fa-user-circle"></i> Bloco</span></th>';
                    text += '            	<th>&nbsp;</th>';
                    text += '			</tr>';
                    text += '		</thead>';
                    text += '		<tbody>';

                        $.each(data, function(key, rs) {
                            let id = rs.id_morador_tipo;

                            text += '           <tr id="'+id+'">';
                            text += '               <td>'+rs.no_morador_tipo+'</td>';
                            text += '               <td style="text-align: center;">';
                            text += '                   <button id="morador-tipo-editar" class="ui blue button morador-tipo-editar" data-action="'+id+'" style="text-align: center;" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                            text += '                   <button id="morador-tipo-excluir" class="ui red button morador-tipo-excluir" data-action="'+id+'" style="text-align: center;"><i class="fas fa-times"></i></button>';
                            text += '               </td>';
                            text += '           </tr>'
                        });
                    
                    text += '       </tbody>';
                    text += '    </table>';

                /*Grid*/
                $('#grid-morador-tipo').html(text);

                /*Data-Table*/
                $('#info-morador-tipo').DataTable({
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
        $('#btn-consultar-morador-tipo').click();
    });
</script>
@stop