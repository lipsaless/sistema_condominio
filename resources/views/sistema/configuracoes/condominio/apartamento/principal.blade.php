@extends('sistema.sistema')

@section('view-principal')

<style>
    #novo:hover {
        color: white;
    }
</style>

<!-- Title -->
<h1 class="text-center">Apartamentos</h1>

<!-- Principal -->
<div id="principal">
    <!-- Buttons -->
    <div id="buttons">
        <div class="col-md-12 row">
            <button id="btn-option-back-apt" data-module="" data-action="{{ route('apt-principal') }}" class="ui basic button btn-resp col-xs-12" style="display:none;">
                <i class="fa fa-reply"></i>
                <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
            </button>
            <button id="btn-option-new-apt" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('apt-form') }}">
                <i class="fa fa-plus"></i>
                <a id="novo" href="" style="color: white !important; text-decoration: none !important;">Novo</a>
            </button>
        </div>
    </div>

    <!-- Form -->
    <div id="div-form-apt"></div>

    <!-- Consultar -->
    <form id="principal-apt-consultar" action="{{ route('apt-grid') }}" method="POST" style="display:none;">
        <div class="row">
            <div class="col-md-4">
                <label for="" class="font-weight-bold">Nome:</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-2">
                <div>&nbsp;</div>
                <button id="btn-consultar-apt" type="submit" class="ui black button">Consultar</button>
            </div>
        </div>
    </form>
    <hr>
    <!-- Grid -->
    <div id="grid-apt"></div>
</div>

<script>
    $(document).ready(function(){
        /*Form*/
        $(document).on('click', '#btn-option-new-apt', function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-apt').hide();
                    $('#btn-option-new-apt').css("display", "none");
                    $('#btn-option-back-apt').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Cadastro de apartamento');
                    $('#div-form-apt').html(formHtml);
                    $('#div-form-apt').show();
                }
            });
        });

         /*Voltar*/
         $('#btn-option-back-apt').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back-apt').hide();
            $('#btn-option-new-apt').show();
            $('#form-apt').hide();
            $('#grid-apt').show();
            $('h1').html('Apartamentos');
        });

        //TABELA => Editar
        $(document).on('click', '.apt-editar',function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("apt-editar") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-apt').hide();
                    $('#btn-option-new-apt').css("display", "none");
                    $('#btn-option-back-apt').css('display','block');
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Editar apartamento');
                    $('#div-form-apt').html(formHtml);
                    $('#div-form-apt').show();
                }
            });
        });

        /*Excluir*/
        $(document).on('click', '.apt-excluir', function(e){
            e.preventDefault();

            $.ajax({
                type: "GET",
                url: '{{ route("apt-excluir") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize()
            }).done(function() {
                /*Submit conultar*/
                $('#btn-consultar-apt').unbind('click').click();

                //msg
                return message('success', 'Apartamento excluído com sucesso!');
            });
        });

        /*Consultar*/
        $('#principal-apt-consultar').unbind('submit').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(data){
                //MONTAR GRID
                text = '';

                    text += '	<table id="info-apt" class="ui table">';
                    text += '   	<thead>';
                    text += '       	<tr>';
                    text += '            	<th><span><i class="fas fa-user-circle"></i> Apartamento</span></th>';
                    text += '            	<th><span><i class="fas fa-home"></i> Bloco</span></th>';
                    text += '            	<th>&nbsp;</th>';
                    text += '			</tr>';
                    text += '		</thead>';
                    text += '		<tbody>';

                        $.each(data, function(key, rs) {
                            let id = rs.id_apartamento;

                            text += '           <tr id="'+id+'">';
                            text += '               <td>'+rs.no_apartamento+'</td>';
                            text += '               <td><a class="ui black circular label">'+rs.no_bloco+'</a></td>';
                            text += '               <td style="text-align: center;">';
                            text += '                   <button id="apt-editar" class="ui blue button apt-editar" data-action="'+id+'" style="text-align: center;" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                            text += '                   <button id="apt-excluir" class="ui red button apt-excluir" data-action="'+id+'" style="text-align: center;"><i class="fas fa-times"></i></button>';
                            text += '               </td>';
                            text += '           </tr>'
                        });
                    
                    text += '       </tbody>';
                    text += '    </table>';

                /*Grid*/
                $('#grid-apt').html(text);

                /*Data-Table*/
                $('#info-apt').DataTable({
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
        $('#btn-consultar-apt').click();
    });
</script>
@stop