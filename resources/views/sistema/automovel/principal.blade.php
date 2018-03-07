@extends('sistema.sistema')

@section('view-principal')
<div id="buttons">
    <div class="col-md-12 row">
        <button id="btn-option-back-morador-automovel" data-module="" data-action="{{ route('morador-automovel-principal') }}" class="ui basic button btn-resp col-xs-12" style="display:none">
            <i class="fa fa-reply"></i>
            <a id="voltar" href="" style="color: black !important; text-decoration: none !important;">Voltar</a>
        </button>
        <button id="btn-option-new-automovel-form" data-module="" class="ui blue button btn-resp col-xs-12" title="Novo" data-action="{{ route('morador-automovel-form') }}">
            <i class="fa fa-plus"></i>
            <a id="novo" href="" style="color: white !important; text-decoration: none !important;">Novo</a>
        </button>
    </div>
    <h1 class="text-center">Automovel</h1>
</div>

<div id="div-form-morador-automovel"></div>

<div id="principal-morador-automovel">
    <form action="{{ route('morador-automovel-grid') }}">
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
                <label for="" class="font-weight-bold">Bloco:</label>
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

<script>
    $(document).ready(function(){
        $('#btn-option-new-automovel-form').click(function(e){
            e.preventDefault();
            $.ajax({
                type: "GET",
                url: $(this).attr("data-action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#principal-morador-automovel').hide();
                    $('#btn-option-new-automovel-form').css("display", "none");
                    $('#btn-option-back-morador-automovel').css("display", "block");
                    $('#btn-option-save').css("display", "block");
                    $('h1').css("display", "none");
                    $('#div-form-morador-automovel').html(formHtml);
                }
            });
        });


        $('#principal-morador-automovel').submit(function() {
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

                $('grid-morador-automovel').html(text);

                });

                return false;
        });
    });
</script>
@stop