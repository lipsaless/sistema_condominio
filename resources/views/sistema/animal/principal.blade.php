@extends('sistema.sistema')

@section('view-principal')

<!-- Title -->
<h1>animal</h1>

<!-- Form -->
<div id="div-form-morador-animal"></div>

<!-- Principal -->
<div id="principal-morador-animal">
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

    <!-- Consultar -->
    <form id="principal-morador-animal-consultar" action="{{ route('morador-animal-grid') }}" method="POST" style="display: none;">
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
                <button class="ui black button">Consultar</button>
            </div>
        </div>
    </form>
    <hr>
    <!-- Grid -->
    <div id="grid-moradores"></div>
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
                    $('#principal-morador-animal').hide();
                    $('#btn-option-new-animal-form').css("display", "none");
                    $('#btn-option-back-morador-animal').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').css("display", "none");
                    $('#div-form-morador-animal').html(formHtml);
                }
            });
            return false;
        });

        /*Consultar*/
        $('#principal-morador-animal').submit(function() {
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(data){
                
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

                /*Grid*/
                $('grid-morador-animal').html(text);

            });
            return false;
        });
    });
</script>
@stop