@extends('sistema.sistema')

<style>
    #novo:hover {
        color: white;
    }
</style>

@section('view-principal')
    <h1 class="text-center">Reserva</h1>

    <div id="form-reserva-cadastro"></div>

    <div id="principal-reserva">
    
         <!--NOVO-->
        <div id="buttons">
            <div class="col-md-12 row">
                <button id="btn-option-back-reserva" data-module="" class="ui basic button btn-resp col-xs-12" style="display:none">
                    <i class="fa fa-reply"></i>
                    <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
                </button>
                <button id="btn-option-new-reserva" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('reserva-form') }}">
                    <i class="fa fa-plus"></i>
                    <a id="novo" href="" style="color: white !important; text-decoration: none !important;">Novo</a>
                </button>
            </div>
        </div>

        <form action="{{ route('reserva-grid') }}">
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
                    <label for="" class="font-weight-bold">Local de Reserva:</label>
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

    <div id="grid-reservas"></div>


    <script>
        $(document).ready(function(){

            $('#btn-option-new-reserva').click(function(e){
                e.preventDefault();
                $.ajax({
                    type: "GET",
                    url: $(this).attr("data-action"),
                    data: $(this).serialize(),
                    success: function(formHtml) {
                        $('#principal-reserva').hide();
                        $('#btn-option-new-reserva').css("display", "none");
                        $('#btn-option-back-reserva').css("display", "block");
                        $('#btn-option-save').css("display", "block");
                        $('h1').css("display", "none");
                        $('#form-reserva-cadastro').html(formHtml);
                    }
                });
            });


            $('#principal-reserva').submit(function() {
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

                    $('grid-reservas').html(text);

                    });

                    return false;
            });
        });
    </script>
@stop