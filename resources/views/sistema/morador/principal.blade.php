@extends('sistema.sistema')

@section('view-principal')

<!-- Title -->
<h1 class="text-center">Moradores</h1>
        
    <!-- Principal -->
    <div id="principal-morador">
        <!--Buttons-->
        <div id="buttons">
            <div class="col-md-12 row">
                <button id="btn-option-back" class="ui basic button col-xs-12" style="display:none;">
                    <i class="fa fa-reply"></i>
                    <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
                </button>
                <button id="btn-option-new" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('morador-form') }}">
                    <i class="fa fa-plus"></i>
                    <a id="novo" href="{{ route('morador-form') }}" style="color: white !important; text-decoration: none !important;">Novo</a>
                </button>
            </div>
        </div>

        <!-- Form -->
        <div id="form-morador-cadastro"></div>

        <!-- Consultar -->
        <form id="principal-morador-consultar" action="{{ route('morador-grid') }}" method="POST" style="display:none;">
            <div class="row">
                <div class="col-md-3">
                    <label for="no_apartamento" class="font-weight-bold">Apartamento:</label>
                    <select id="no_apartamento" class="custom-select">
                            <option value="">Selecione</option>
                        <?php foreach ($apartamentos as $apt): ?>
                            <option value="<?php echo $apt->id_apartamento; ?>"><?php echo $apt->no_apartamento; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="no_morador" class="font-weight-bold">Morador:</label>
                    <input type="text" id="no_morador" class="form-control" name="no_morador">
                </div>
                <div class="col-md-3">
                    <label for="no_bloco" class="font-weight-bold">Bloco:</label>
                    <select id="no_bloco" class="custom-select">
                        <option value="">Selecione</option>
                        <?php foreach ($blocos as $bloco): ?>
                            <option value="<?php echo $bloco->id_bloco; ?>"><?php echo $bloco->no_bloco; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <div>&nbsp;</div>
                    <button id="btn-consultar-morador" type="submit" class="ui black button">Consultar</button>
                </div>
            </div>
        </form>
        <hr>
        <!-- Grid -->
        <div id="grid-moradores"></div>
    </div>
    
<script>
    $(document).ready(function(){
        $(document).tooltip();
        //START AJAX E STOP AJAX
        // ajax();
        
        //PRINCIPAL => novo cadastro
        $(document).on('click', '#btn-option-new', function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-moradores').hide();
                    $('#btn-option-new').css("display", "none");
                    $('#btn-option-back').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Cadastro de morador');
                    $('#form-morador-cadastro').html(formHtml);
                    $('#form-morador-cadastro').show();
                }
            });
        });

        //TABELA => Editar
        $(document).on('click', '.morador-editar',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("morador-editar") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-moradores').hide();
                    $('#btn-option-new').css("display", "none");
                    $('#btn-option-back').css('display','block');
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Editar morador');
                    $('#form-morador-cadastro').html(formHtml);
                    $('#form-morador-cadastro').show();
                }
            });
        });

        //TABELA => Excluir
        $(document).on('click', '.morador-excluir',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("morador-excluir") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize()
            }).done(function() {
                /*Submit conultar*/
                $('#btn-consultar-morador').unbind('click').click();
                //msg
                return message('success', 'Morador excluído com sucesso!');
            });
        });

        //CONSULTAR
        $('#principal-morador-consultar').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(data){
                //PRINCIPAL => Montar grid
                text = '';

                    text += '	<table id="info-moradores" class="ui table">';
                    text += '   	<thead>';
                    text += '       	<tr>';
                    text += '            	<th><span><i class="fas fa-user"></i> <?php echo $title; ?></span></th>';
                    text += '            	<th><span><i class="fas fa-building"></i> Apartamento/Bloco</span></th>';
                    text += '            	<th><span>Tipo</span></th>';
                    text += '            	<th>&nbsp;</th>';
                    text += '			</tr>';
                    text += '		</thead>';
                    text += '		<tbody>';

                        $.each(data, function(key, rs) {
                            text += '           <tr id="'+rs.id_morador+'">';
                            text += '               <td>'+ rs.no_morador+'</td>';
                            text += '               <td><a class="ui black circular label">'+rs.no_apartamento+'</a><a class="ui black circular label">'+rs.no_bloco+'</a></td>';
                            text += '               <td>'+rs.no_morador_tipo+'</td>';
                            text += '               <td style="text-align: center;">';
                            text += '                   <button id="morador-editar" class="ui green button morador-dados" data-action="'+rs.id_morador+'" style="text-align: center;" title="Visualizar dados"><i class="fas fa-search" data-remodal="1"></i></button>';
                            text += '                   <button id="morador-editar" class="ui blue button morador-editar" data-action="'+rs.id_morador+'" style="text-align: center;" title="Editar morador"><i class="fas fa-pencil-alt"></i></button>';
                            text += '                   <button id="morador-excluir" class="ui red button morador-excluir" data-action="'+rs.id_morador+'" style="text-align: center;" title="Excluir morador"><i class="fas fa-times"></i></button>';
                            text += '               </td>';
                            text += '           </tr>'
                        });
                    
                    text += '       </tbody>';
                    text += '    </table>';

                //PRINCIPAL => Mostrar grid
                $('#grid-moradores').html(text);

                //DATATABLE => tradução
                $('#info-moradores').DataTable({
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
                });

                //PRINCIPAL => Editar
                // $('.morador-editar').unbind('click').click(function(e){
                //     e.preventDefault();
                //     $.ajax({
                //         type: "GET",
                //         url: '{{ route("morador-editar") }}' + '/' + $(this).attr("data-action"),
                //         data: $(this).serialize(),
                //         success: function(formHtml) {
                //             $('#principal-morador').hide();
                //             $('#btn-option-new').css("display", "none");
                //             $('#btn-option-back').css("display", "block");
                //             $('#btn-option-save').css("display", "block");
                //             $('h1').css("display", "none");
                //             $('#form-morador-cadastro').html(formHtml);
                //         }
                //     });
                // });

                //PRINCIPAL => Excluir
                // $('.morador-excluir').unbind('click').click(function(e){

                //     e.preventDefault();

                //     $.ajax({
                //         type: "GET",
                //         url: '{{ route("morador-excluir") }}' + '/' + $(this).attr("data-action"),
                //         data: $(this).serialize()
                //     }).done(function() {
                //         /*Submit conultar*/
                //         $('#btn-consultar-morador').unbind('click').click();
                //     });
                // });
            });
        });
        /*Submit conultar*/
        $('#btn-consultar-morador').unbind('click').click();
    });
</script>
@stop