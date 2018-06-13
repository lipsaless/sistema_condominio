
<!-- Form -->
<form id="form-morador-automovel" action="{{ route('morador-automovel-gravar') }}" method="POST">
    <input type="hidden" name="id_automovel" value="{{ $obj->id_automovel }}">
    <input type="hidden" id="id_apartamento" name="id_apartamento" value="{{ $obj->id_apartamento }}">
    <hr>
    <fieldset id="fieldset">
        <div class="row">
            <div class="col-md-4">
                <label for="no_apartamento" class="font-weight-bold">Apartamento: *</label>
                <input type="text" id="no_apartamento" class="form-control" value="{{ $obj->no_apartamento }}">
                <?php echo App\Helpers\Html::listaApt(); ?>
            </div>
            <div class="col-md-4">
                <label for="id_morador" class="font-weight-bold">Morador: *</label>
                <select name="id_morador" id="id_morador" class="custom-select">
                    <?php if (!empty($listaMoradores)): ?>
                    <?php foreach ($listaMoradores as $value): ?>
                    <?php $selecionado = ($value->id_morador == $obj->id_morador) ? 'selected' : '' ?>
                        <option value="<?php echo $value->id_morador; ?>" <?php echo $selecionado; ?>><?php echo $value->no_morador; ?></option>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </select>
            </div>
            <div class="col-md-4">
                <label for="no_modelo" class="font-weight-bold">Modelo do veículo: </label>
                <input type="text" class="form-control" id="no_modelo" name="no_modelo" value="{{ $obj->no_modelo }}">
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-4">
                <label for="no_marca" class="font-weight-bold">Marca do veículo: *</label>
                <input type="text" class="form-control" id="no_marca" name="no_marca" value="{{ $obj->no_marca }}">
            </div>
            <div class="col-md-4">
                <label for="nu_placa" class="font-weight-bold">Placa:</label>
                <input type="text" class="form-control" id="nu_placa" name="nu_placa" value="{{ $obj->nu_placa }}">
            </div>
            <div class="col-md-4">
                <label for="no_cor" class="font-weight-bold">Cor: </label>
                <input type="text" class="form-control" id="no_cor" name="no_cor" value="{{ $obj->no_cor }}">
            </div>
        </div>
        <div class="row"> 
            <div class="col-md-3 offset-md-4 my-5">
                <button id="btn-option-save" type="submit" class="ui positive fluid button" style=" float: right; right: 0;">
                    <i class="fa fa-check"></i>
                    Salvar
                </button>
            </div>
        </div>
    </fieldset>
</form>

<script>
    $(document).ready(function() {
        //Lista apt's
        carregarListaApt();

        /*Mask*/
        $('#nu_placa').inputmask("ZZZ-9999");
    });

    //FORMULÁRIO => salvar
        $('#form-morador-automovel').unbind('submit').submit(function(e){
            e.preventDefault();
            let apartamento = $('#no_apartamento').val();
            let nomeMorador = $('#id_morador').val();
            let nomeModelo = $('#no_modelo').val();
            let nuPlaca = $('#nu_placa').val();
            let noCor = $('#no_cor').val();

            //VALIDAÇÃO => apartamento
            if (!apartamento) {
                return message('error', 'Apartamento não foi informado!');
                return false;
            }

            //VALIDAÇÃO => morador
            if (!nomeMorador) {
                return message('error', 'Morador não foi informado!');
                return false;
            }

            //VALIDAÇÃO => modelo
            if (!nomeModelo) {
                return message('error', 'Modelo não foi informado!');
                return false;
            }

            //VALIDAÇÃO => placa
            if (!nuPlaca) {
                return message('error', 'Placa do automóvel não foi informada!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success' ) {

                        $('#form-morador-automovel').hide();
                        $('#btn-option-back-morador-automovel').hide();
                        $('#btn-option-new-automovel-form').show();
                        $('#grid-morador-automovel').show();
                        $('h1').html('Automóveis');
                        $('#btn-consultar-morador-automovel').click();

                        if (!$('[name="id_automovel"]').val()) {
                            return message('success', json.msg);
                        } else {
                            return message('success', 'Edição realizada com sucesso.');
                        }
                       
                    } else {
                        return message('error', json.msg);
                    }
                }
            });
        });
</script>