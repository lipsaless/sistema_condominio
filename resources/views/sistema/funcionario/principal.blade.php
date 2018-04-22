@extends('sistema.sistema')

<style>
    #novo:hover {
        color: white;
    }
</style>

@section('view-principal')
    <h1 class="text-center">Funcionários</h1>

    <div id="div-form-funcionario-cadastro"></div>

    <div id="principal-funcionario">

        <!--NOVO-->
        <div id="buttons">
            <div class="col-md-12 row">
                <button id="btn-option-back-funcionario" data-module="" data-action="{{ route('funcionario-principal') }}" class="ui basic button btn-resp col-xs-12" style="display:none">
                    <i class="fa fa-reply"></i>
                    <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
                </button>
                <button id="btn-option-new-funcionario" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('funcionario-form') }}">
                    <i class="fa fa-plus"></i>
                    <a id="novo" href="" style="color: white !important; text-decoration: none !important;">Novo</a>
                </button>
            </div>
        </div>

        <form id="principal-funcionario-consultar" action="{{ route('funcionario-grid') }}" method="POST" class="display:none;">
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="font-weight-bold">Nome:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-2">
                    <div>&nbsp;</div>
                    <button id="btn-consultar-funcionario" type="submit" class="ui black button">Consultar</button>
                </div>
            </div>
        </form>
        <hr>
        <div id="grid-funcionarios"></div>
    </div>

    


    <script>
        $(document).ready(function(){

            $('#btn-option-new-funcionario').click(function(e){
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: $(this).attr("data-action"),
                    data: $(this).serialize(),
                    success: function(formHtml) {
                        $('#principal-funcionario').hide();
                        $('#btn-option-new-funcionario').css("display", "none");
                        $('#btn-option-back-funcionario').css("display", "block");
                        $('#btn-option-save').css("display", "block");
                        $('h1').css("display", "none");
                        $('#div-form-funcionario-cadastro').html(formHtml);
                    }
                });
            });


            $('#principal-funcionario-consultar').submit(function() {
                $.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    dataType: "json"
                }).done(function(data){
                    //MONTAR GRID
                    text = '';

                        text += '	<table id="info-funcionarios" class="table user-list">';
                        text += '   	<thead>';
                        text += '       	<tr>';
                        text += '           	<th width="40"><span></span></th>';
                        text += '            	<th><span>Funcionário</span></th>';
                        text += '            	<th><span>Apt/Bloco</span></th>';
                        text += '            	<th><span>Tipo</span></th>';
                        text += '            	<th>&nbsp;</th>';
                        text += '			</tr>';
                        text += '		</thead>';
                        text += '		<tbody>';
                            $.each(data, function(key, rs) {
                                    text += '           <tr id="'+rs.id_funcionario+'">';
                                    text += '               <td>'+rs.no_funcionario+'</td>';
                                    text += '               <td><a class="ui blue label"></a></td>';
                                    text += '               <td style="font-weight: bold;"></td>';
                                    text += '               <td style="text-align: center;">';
                                    text += '                   <button id="morador-editar" class="ui blue button morador-editar" data-action="'+rs.id_funcionario+'" style="text-align: center;" data-html="Clique para editar"><i class="fas fa-pencil-alt"></i>  Editar</button>';
                                    text += '                   <button id="morador-excluir" class="ui red button morador-excluir" data-action="'+rs.id_funcionario+'" style="text-align: center;"><i class="fas fa-times"></i>  Excluir</button>';
                                    text += '               </td>';
                                    text += '           </tr>'
                            });
                        text += '       </tbody>';
                        text += '     </table>';

                    $('#grid-funcionarios').html(text);

                    //DATA-TABLE
                    $('#info-funcionarios').DataTable({
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

                    });

                    return false;
            });
            $('#btn-consultar-funcionario').click();
        });
    </script>
@stop