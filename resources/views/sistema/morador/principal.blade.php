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
            <button id="btn-option-back" data-module="" class="ui basic button btn-resp col-xs-12" style="display:none">
                <i class="fa fa-reply"></i>
                <a id="voltar" href="{{ route('morador-principal') }}" style="color: black !important; text-decoration: none !important;">Voltar</a>
            </button>
            <button id="btn-option-new" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('morador-form') }}">
                <i class="fa fa-plus"></i>
                <a id="novo" href="{{ route('morador-form') }}" style="color: white !important; text-decoration: none !important;">Novo</a>
            </button>
        </div>
    </div>


    <div id="form-morador-cadastro"></div>

    <div id="principal-morador">
        <form action="{{ route('morador-grid') }}">
            <div class="row">
                <div class="col-md-3">
                    <label for="no_apartamento">Apartamento:</label>
                    <input type="text" name="no_apartamento" id="apartamento" class="form-control">
                </div>
                <div class="col-md-4">
                    <label for="">Morador:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="">Bloco:</label>
                    <select class="custom-select">
                        <option value="">Select</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <div>&nbsp;</div>
                    <button class="ui black button">Consultar</button>
                </div>
            </div>
        </form>
    </div>

    <div id="grid-moradores"></div>


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
                        $('#form-morador-cadastro').html(formHtml);
                    }
                });
            });


            $('#principal-morador').submit(function() {
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

                    $('grid-moradores').html(text);

                    });

                    return false;
            });
        });
    </script>
@stop