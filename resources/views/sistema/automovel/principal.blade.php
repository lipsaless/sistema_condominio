@extends('sistema.sistema')

@section('view-principal')

<!-- Title -->
<h1 class="text-center">Automóveis</h1>

<!-- Principal -->
<div id="principal-morador-automovel">
    <!-- Buttons -->
    <div id="buttons">
        <div class="col-md-12 row">
            <button id="btn-option-back-morador-automovel" class="ui basic button col-xs-12" style="display:none;">
                <i class="fa fa-reply"></i>
                <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
            </button>
            <button id="btn-option-new-automovel-form" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('morador-automovel-form') }}">
                <i class="fa fa-plus"></i>
                <a id="novo" href="" style="color: white !important; text-decoration: none !important;">Novo</a>
            </button>
        </div>
    </div>

    <!-- Form -->
    <div id="div-form-morador-automovel"></div>

    <!-- Consultar -->
    <form id="principal-morador-automovel-consultar" action="{{ route('morador-automovel-grid') }}" method="POST" style="display:none;">
        <div class="row">
            <div class="col-md-3">
                <label for="no_apartamento" class="font-weight-bold">Apartamento:</label>
                <select class="custom-select">
                        <option value="">Selecione</option>
                    <?php foreach ($apartamentos as $apt): ?>
                        <option value="<?php echo $apt->id_apartamento; ?>"><?php echo $apt->no_apartamento; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="" class="font-weight-bold">Morador:</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-3">
                <label for="" class="font-weight-bold">Bloco:</label>
                <select class="custom-select">
                        <option value="">Selecione</option>
                    <?php foreach ($blocos as $bloco): ?>
                        <option value="<?php echo $bloco->id_bloco; ?>"><?php echo $bloco->no_bloco; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <div>&nbsp;</div>
                <button id="btn-consultar-morador-automovel" type="submit" class="ui black button">Consultar</button>
            </div>
        </div>
    </form>
    <hr>
    <!-- Grid -->
    <div id="grid-morador-automovel"></div>
</div>

<script>
    $(document).ready(function(){
         /*Form*/
         $('#btn-option-new-automovel-form').unbind('click').click(function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-morador-automovel').hide();
                    $('#btn-option-new-automovel-form').css("display", "none");
                    $('#btn-option-back-morador-automovel').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html("Cadastro de automóvel");
                    $('#div-form-morador-automovel').html(formHtml);
                    $('#div-form-morador-automovel').show();
                }
            });
        });

        /*Voltar*/
        $('#btn-option-back-morador-automovel').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back-morador-automovel').hide();
            $('#btn-option-new-automovel-form').show();
            $('#form-morador-automovel').hide();
            $('#grid-morador-automovel').show();
            $('#btn-morador-consulta').click();
            $('h1').html('Automóveis');
        });

         //TABELA => Editar
         $(document).on('click', '.morador-automovel-editar',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("morador-automovel-editar") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-morador-automovel').hide();
                    $('#btn-option-new-automovel-form').css("display", "none");
                    $('#btn-option-back-morador-automovel').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html("Cadastro de automóvel");
                    $('#div-form-morador-automovel').html(formHtml);
                    $('#div-form-morador-automovel').show();
                }
            });
        });

        //TABELA => Excluir
        $(document).on('click', '.morador-automovel-excluir',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("morador-automovel-excluir") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize()
            }).done(function() {
                /*Submit conultar*/
                $('#btn-consultar-morador-automovel').unbind('click').click();
                //msg
                return message('success', 'Automóvel excluído com sucesso!');
            });
        });

        //TABELA => Editar
        $(document).on('click', '.morador-automovel-editar',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("morador-automovel-editar") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-morador-automovel').hide();
                    $('#btn-option-new-morador-automovel').css("display", "none");
                    $('#btn-option-back-morador-automovel').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('#form-morador-automovel-cadastro').html(formHtml);
                    $('#div-form-morador-automovel').show();
                }
            });
        });

        /*Consultar*/
        $('#principal-morador-automovel-consultar').submit(function(e) {
            e.preventDefault()
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(data){
                //GRID
                text = '';

                    text += '	<table id="info-morador-automovel" class="table user-list">';
                    text += '   	<thead>';
                    text += '       	<tr>';
                    text += '           	<th width="40">Morador(a)</th>';
                    text += '            	<th><span>Apartamento/Bloco</span></th>';
                    text += '            	<th><span>Automóvel</span></th>';
                    text += '            	<th>&nbsp;</th>';
                    text += '			</tr>';
                    text += '		</thead>';
                    text += '		<tbody>';
                    $.each(data, function(key, rs) {
                            text += '           <tr id="'+rs.id_automovel+'">';
                            text += '               <td>'+ rs.no_morador+'</td>';
                            text += '               <td><a class="ui black circular label">'+rs.no_apartamento+'</a><a class="ui black circular label">'+rs.no_bloco+'</a></td>';
                            text += '               <td style="font-weight: bold;">'+rs.no_automovel+'</td>';
                            text += '               <td style="text-align: center;">';
                            text += '                   <button id="morador-automovel-editar" class="ui blue button morador-automovel-editar" data-action="'+rs.id_automovel+'" style="text-align: center;" data-html="Clique para editar" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                            text += '                   <button id="morador-automovel-excluir" class="ui red button morador-automovel-excluir" data-action="'+rs.id_automovel+'" style="text-align: center;"><i class="fas fa-times" title="Excluir"></i></button>';
                            text += '               </td>';
                            text += '           </tr>'
                        });
                    text += '       </tbody>';
                    text += '   </table>';

                /*Grid*/
                $('#grid-morador-automovel').html(text);

                /*Data-Table*/
                $('#info-morador-automovel').DataTable({
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
                        "sSearch": "Morador ou automóvel",
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
         /*Submit conultar*/
         $('#btn-consultar-morador-automovel').unbind('click').click();
    });
</script>
@stop