@extends('sistema.sistema')
<style>
    #novo:hover {
        color: white;
    }
    .ui.grid>.row {
        display: flex !important;
    }
    #info-moradores_info, #info-moradores_length {
        font-weight: bold;
    }
    select[name="info-moradores_length"] {
        padding: 10px;
    }
    th {
        font-size: 12pt;
    }
</style>

@section('view-principal')
<h1 class="text-center">Morador</h1>

    <!-- Form -->
    <div id="form-morador-cadastro"></div>

    <div id="principal-morador">
        <form id="principal-morador-consultar" action="{{ route('morador-grid') }}" method="POST">
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
        <div id="grid-moradores"></div>
    </div>

    

    <script>
        $(document).ready(function(){

            $('#btn-option-new').click(function(e){
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: $(this).attr("data-action"),
                    data: $(this).serialize(),
                    success: function(formHtml) {
                        $('#principal-morador').hide();
                        $('#btn-option-new').css("display", "none");
                        $('#btn-option-back').css("display", "block");
                        $('#btn-option-save').css("display", "block");
                        $('h1').css("display", "none");
                        $('#form-morador-cadastro').html(formHtml);
                    }
                });
            });

            $('#principal-morador-consultar').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    dataType: "json"
                }).done(function(data){
                    //MONTAR GRID
                    text = '';

                        text += '	<table id="info-moradores" class="ui table">';
                        text += '   	<thead>';
                        text += '       	<tr>';
                        text += '            	<th><span>Morador</span></th>';
                        text += '            	<th><span>Apartamento/Bloco</span></th>';
                        text += '            	<th><span>Tipo</span></th>';
                        text += '            	<th>&nbsp;</th>';
                        text += '			</tr>';
                        text += '		</thead>';
                        text += '		<tbody>';

                            $.each(data, function(key, rs) {
                                text += '           <tr id="'+rs.id_morador+'">';
                                text += '               <td><i class="fas fa-user"></i> '+ rs.no_morador+'</td>';
                                text += '               <td><a class="ui yellow label">'+rs.no_apartamento+'</a></td>';
                                text += '               <td style="font-weight: bold;">'+rs.no_morador_tipo+'</td>';
                                text += '               <td style="text-align: center;">';
                                text += '                   <button id="morador-editar" class="ui blue button morador-editar" data-action="'+rs.id_morador+'" style="text-align: center;" data-html="Clique para editar"><i class="fas fa-pencil-alt"></i>  Editar</button>';
                                text += '                   <button id="morador-excluir" class="ui red button morador-excluir" data-action="'+rs.id_morador+'" style="text-align: center;"><i class="fas fa-times"></i>  Excluir</button>';
                                text += '               </td>';
                                text += '           </tr>'
                            });
                        
                        text += '       </tbody>';
                        text += '    </table>';

                    //GRID-MORADOR
                    $('#grid-moradores').html(text);

                    //DATA-TABLE
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
                            "sSearch": "Pesquisar",
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

                    //POPUP
                    // $('[data-html]').popup();

                    //EDITAR MORADOR
                    $('.morador-editar').click(function(e){
                        e.preventDefault();
                        $.ajax({
                            type: "GET",
                            url: '{{ route("morador-editar") }}' + '/' + $(this).attr("data-action"),
                            data: $(this).serialize(),
                            success: function(formHtml) {
                                $('#principal-morador').hide();
                                $('#btn-option-new').css("display", "none");
                                $('#btn-option-back').css("display", "block");
                                $('#btn-option-save').css("display", "block");
                                $('h1').css("display", "none");
                                $('#form-morador-cadastro').html(formHtml);
                            }
                        });
                    });

                    //EXCLUIR MORADOR
                    $('.morador-excluir').click(function(e){
                        e.preventDefault();
                        $.ajax({
                            type: "GET",
                            url: '{{ route("morador-excluir") }}' + '/' + $(this).attr("data-action"),
                            data: $(this).serialize(),
                            success: function(formHtml) {
                                $('#principal-morador').submit();
                            }
                        });
                    });

                    });
                    return false;
            });

            $('#btn-consultar-morador').click();
            


        });
    </script>
@stop