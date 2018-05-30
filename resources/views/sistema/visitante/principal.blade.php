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
    <form id="principal-visitante-consultar" action="{{ route('funcionario-grid') }}" method="POST" style="display:none;">
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
        //START AJAX E STOP AJAX
        // ajax();

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

        /*Edit*/
        $(document).on('click', '.visitante-editar', function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("visitante-editar") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#grid-visitantes').hide();
                    $('#btn-option-new-visitante').css("display", "none");
                    $('#btn-option-back-visitante').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').html('Editar visitante');
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
        $('#principal-visitante-consultar').unbind.submit(function(e) {
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
                    text += '            	<th><span><i class="fas fa-user"></i> Funcionário</span></th>';
                    text += '            	<th><span><i class="fas fa-cart"></i> E-mail</span></th>';
                    text += '            	<th><span><i class="fas fa-phone"></i> Telefone/Celular</span></th>';
                    text += '            	<th>&nbsp;</th>';
                    text += '			</tr>';
                    text += '		</thead>';
                    text += '		<tbody>';

                        $.each(data, function(key, rs) {
                            let id = rs.id_visitante;

                            text += '           <tr id="'+id+'">';
                            text += '               <td>'+rs.no_visitante+'</td>';
                            text += '               <td style="text-align: center;">';
                            text += '                   <button id="funcionario-editar" class="ui blue button funcionario-editar" data-action="'+id+'" style="text-align: center;"><i class="fas fa-pencil-alt"></i></button>';
                            text += '                   <button id="funcionario-excluir" class="ui red button funcionario-excluir" data-action="'+id+'" style="text-align: center;"><i class="fas fa-times"></i></button>';
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
                        "sSearch": "Nome ou E-mail",
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