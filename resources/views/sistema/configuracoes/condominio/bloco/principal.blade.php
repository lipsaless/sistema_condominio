@extends('sistema.sistema')

@section('view-principal')

<style>
    #novo:hover {
        color: white;
    }
</style>

<!-- Title -->
<h1 class="text-center">Blocos</h1>

<!-- Principal -->
<div id="principal">
    <!-- Buttons -->
    <div id="buttons">
        <div class="col-md-12 row">
            <button id="btn-option-back-bloco" data-module="" data-action="{{ route('bloco-principal') }}" class="ui basic button btn-resp col-xs-12" style="display:none;">
                <i class="fa fa-reply"></i>
                <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
            </button>
            <button id="btn-option-new-bloco" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('bloco-form') }}">
                <i class="fa fa-plus"></i>
                <a id="novo" href="" style="color: white !important; text-decoration: none !important;">Novo</a>
            </button>
        </div>
    </div>

    <!-- Form -->
    <div id="div-form-bloco"></div>

    <!-- Consultar -->
    <form id="principal-bloco-consultar" action="{{ route('bloco-grid') }}" method="POST" style="display:none;">
        <div class="row">
            <div class="col-md-4">
                <label for="" class="font-weight-bold">Nome:</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-2">
                <div>&nbsp;</div>
                <button id="btn-consultar-bloco" type="submit" class="ui black button">Consultar</button>
            </div>
        </div>
    </form>
    <hr>
    <!-- Grid -->
    <div id="grid-bloco"></div>
</div>

<script>
    $(document).ready(function(){
        /*Form*/
        $(document).on('click', '#btn-option-new-bloco', function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-bloco').hide();
                    $('#btn-option-new-bloco').css("display", "none");
                    $('#btn-option-back-bloco').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Cadastro de bloco');
                    $('#div-form-bloco').html(formHtml);
                    $('#div-form-bloco').show();
                }
            });
        });

         /*Voltar*/
         $('#btn-option-back-bloco').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back-bloco').hide();
            $('#btn-option-new-bloco').show();
            $('#form-bloco').hide();
            $('#grid-bloco').show();
            $('h1').html('Blocos');
        });

        //TABELA => Editar
        $(document).on('click', '.bloco-editar',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("bloco-editar") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-bloco').hide();
                    $('#btn-option-new-bloco').css("display", "none");
                    $('#btn-option-back-bloco').css('display','block');
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Editar bloco');
                    $('#div-form-bloco').html(formHtml);
                    $('#div-form-bloco').show();
                }
            });
        });

        /*Excluir*/
        $(document).on('click', '.bloco-excluir', function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: '{{ route("bloco-excluir") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize()
            }).done(function() {
                /*Submit conultar*/
                $('#btn-consultar-bloco').unbind('click').click();

                //msg
                return message('success', 'Bloco excluído com sucesso!');
            });
        });

        /*Consultar*/
        $('#principal-bloco-consultar').unbind('submit').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(data){
                //MONTAR GRID
                text = '';

                    text += '	<table id="info-bloco" class="ui selectable table">';
                    text += '   	<thead>';
                    text += '       	<tr>';
                    text += '            	<th><span><i class="fas fa-user-circle"></i> Bloco</span></th>';
                    text += '            	<th>&nbsp;</th>';
                    text += '			</tr>';
                    text += '		</thead>';
                    text += '		<tbody>';

                        $.each(data, function(key, rs) {
                            let id = rs.id_bloco;

                            text += '           <tr id="'+id+'">';
                            text += '               <td>'+rs.no_bloco+'</td>';
                            text += '               <td style="text-align: center;">';
                            text += '                   <button id="bloco-editar" class="ui blue button bloco-editar" data-action="'+id+'" style="text-align: center;" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                            text += '                   <button id="bloco-excluir" class="ui red button bloco-excluir" data-action="'+id+'" style="text-align: center;"><i class="fas fa-times"></i></button>';
                            text += '               </td>';
                            text += '           </tr>'
                        });
                    
                    text += '       </tbody>';
                    text += '    </table>';

                /*Grid*/
                $('#grid-bloco').html(text);

                /*Data-Table*/
                $('#info-bloco').DataTable({
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
        $('#btn-consultar-bloco').click();
    });
</script>
@stop