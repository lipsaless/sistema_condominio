@extends('sistema.sistema')

<style>
    #novo:hover {
        color: white;
    }
</style>

@section('view-principal')
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
        <h1 class="text-center">Funcionários</h1>
    </div>

   

    <div id="div-form-funcionario-cadastro"></div>

    <div id="principal-funcionario">
        <form action="{{ route('funcionario-grid') }}">
            <div class="row">
                <div class="col-md-4">
                    <label for="" class="font-weight-bold">Nome:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-2">
                    <div>&nbsp;</div>
                    <button class="ui black button">Consultar</button>
                </div>
            </div>
        </form>
    </div>

    <div id="grid-funcionarios"></div>


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


            $('#principal-funcionario').submit(function() {
                $.ajax({
                    type: "POST",
                    url: $(this).attr("action"),
                    data: $(this).serialize(),
                    dataType: "json"
                }).done(function(data){
                    //MONTAR GRID
                    text = '';

                        text += '	<table class="table user-list">';
                        text += '   	<thead>';
                        text += '       	<tr>';
                        text += '           	<th width="40"><span></span></th>';
                        text += '            	<th><span>Morador</span></th>';
                        text += '            	<th><span>Apt/Bloco</span></th>';
                        text += '            	<th><span>Tipo</span></th>';
                        text += '            	<th>&nbsp;</th>';
                        text += '			</tr>';
                        text += '		</thead>';
                        text += '		<tbody>';
                        text += '             <tr>';
                        text += '               <td></td>';
                        text += '               <td></td>';
                        text += '               <td></td>';
                        text += '       </tbody>';

                    $('grid-funcionarios').html(text);

                    });

                    return false;
            });
        });
    </script>
@stop