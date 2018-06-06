@extends('sistema.sistema')

@section('view-principal')

<!-- Title -->
<h1 class="text-center">Animais</h1>

<!-- Principal -->
<div id="principal">
    <!-- Buttons -->
    <div id="buttons">
        <div class="col-md-12 row">
            <button id="btn-option-back-morador-animal" data-module="" data-action="{{ route('morador-animal-principal') }}" class="ui basic button btn-resp col-xs-12" style="display:none">
                <i class="fa fa-reply"></i>
                <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
            </button>
            <button id="btn-option-new-animal-form" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('morador-animal-form') }}">
                <i class="fa fa-plus"></i>
                <a id="novo" href="" style="color: white !important; text-decoration: none !important;">Novo</a>
            </button>
        </div>
    </div>

    <!-- Form -->
    <div id="div-form-morador-animal"></div>

    <!-- Consultar -->
    <form id="principal-morador-animal-consultar" action="{{ route('morador-animal-grid') }}" method="POST" style="display:none;">
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
                <label for="" class="font-weight-bold">Tipo:</label>
                <select class="custom-select">
                    <?php foreach ($tipos as $tipo): ?>
                        <option value="<?php echo $tipo->id_animal_tipo; ?>"><?php echo $tipo->no_animal_tipo; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-2">
                <div>&nbsp;</div>
                <button id="btn-consultar-morador-animal" class="ui black button">Consultar</button>
            </div>
        </div>
    </form>
    <!-- Grid -->
    <div id="grid-morador-animal"></div>
</div>

<script>
    $(document).ready(function(){
        /*Form*/
        $('#btn-option-new-animal-form').unbind('click').click(function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-morador-animal').hide();
                    $('#btn-option-new-animal-form').css("display", "none");
                    $('#btn-option-back-morador-animal').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Cadastro de animais');
                    $('#div-form-morador-animal').html(formHtml);
                    $('#div-form-morador-animal').show();
                }
            });
            return false;
        });

        //Voltar
        $('#btn-option-back-morador-animal').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back-morador-animal').hide();
            $('#btn-option-new-animal-form').show();
            $('#form-morador-animal').hide();
            $('#grid-morador-animal').show();
            $('h1').html('Animais');
            $('#btn-consultar-morador-animal').click();
        });

        //TABELA => Editar
        $(document).on('click', '.morador-animal-editar',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("morador-animal-editar") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-morador-animal').hide();
                    $('#btn-option-new-animal-form').css("display", "none");
                    $('#btn-option-back-morador-animal').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html("Cadastro de animal");
                    $('#div-form-morador-animal').html(formHtml);
                    $('#div-form-morador-animal').show();
                }
            });
        });

        //TABELA => Excluir
        $(document).on('click', '.morador-animal-excluir',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("morador-animal-excluir") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize()
            }).done(function() {
                /*Submit conultar*/
                $('#btn-consultar-morador-animal').unbind('click').click();
                //msg
                return message('success', 'Animal excluído com sucesso!');
            });
        });

        /*Consultar*/
        $('#principal-morador-animal-consultar').unbind('submit').submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(data){
                
                text = '';

                    text += '	<table id="info-morador-animal" class="table user-list">';
                    text += '   	<thead>';
                    text += '       	<tr>';
                    text += '           	<th width="40"> Morador</th>';
                    text += '            	<th><span> Apartamento</span></th>';
                    text += '            	<th><span> Bloco</span></th>';
                    text += '            	<th><span> Animal</span></th>';
                    text += '            	<th><span> Tipo</span></th>';
                    text += '            	<th>&nbsp;</th>';
                    text += '			</tr>';
                    text += '		</thead>';
                    text += '		<tbody>';
                    $.each(data, function(key, rs) {
                        let id = rs.id_animal;

                        text += '           <tr id="'+id+'">';
                        text += '               <td>'+ rs.no_morador+'</td>';
                        text += '               <td><a class="ui black circular label">'+rs.no_apartamento+'</a></td>';
                        text += '               <td><a class="ui black circular label">'+rs.no_bloco+'</a></td>';
                        text += '               <td>'+rs.no_animal+'</td>';
                        text += '               <td><a class="ui circular label">'+rs.no_animal_tipo+'</a></td>';
                        text += '               <td style="text-align: center;">';
                        text += '                   <button id="morador-animal-editar" class="ui blue button morador-animal-editar" data-action="'+id+'" style="text-align: center;" data-html="Clique para editar" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                        text += '                   <button id="morador-animal-excluir" class="ui red button morador-animal-excluir" data-action="'+id+'" style="text-align: center;"><i class="fas fa-times" title="Excluir"></i></button>';
                        text += '               </td>';
                        text += '           </tr>'
                        });
                    text += '       </tbody>';

                /*Grid*/
                $('#grid-morador-animal').html(text);

                // /*Data-Table*/
                $('#info-morador-animal').DataTable({
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
            });
        });
        $('#btn-consultar-morador-animal').click();
    });
</script>
@stop