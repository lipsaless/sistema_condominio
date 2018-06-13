
<form id="form-morador-animal" method="post" action="{{ route('morador-animal-gravar') }}">
    <input type="hidden" name="id_animal" value="{{ $obj->id_animal }}">
    <hr>
    <div class="row">
        <div class="ui input col-md-4">
            <label for="no_apartamento" class="font-weight-bold">Apartamento: *</label>
            <input type="text" id="no_apartamento" value="{{ $obj->no_apartamento }}">
            <?php echo App\Helpers\Html::listaApt(); ?>
        </div>
        <div class="ui input col-md-4">
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
        <div class="ui input col-md-4">
            <label for="id_animal_tipo" class="font-weight-bold">Tipo: *</label>
            <select class="form-control" name="id_animal_tipo" id="id_animal_tipo">
                <option value="">Selecione</option>
                <?php foreach ($tipos as $tipo): ?>
                <?php $selecionado = ($tipo->id_animal_tipo == $obj->id_animal_tipo) ? 'selected' : '' ?>
                    <option value="<?php echo $tipo->id_animal_tipo; ?>" <?php echo $selecionado; ?>><?php echo $tipo->no_animal_tipo; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>
    <div class="row my-3">
        <div class="ui input col-md-4">
            <label for="no_animal" class="font-weight-bold">Nome: *</label>
            <input type="text" id="no_animal" name="no_animal" value="{{ $obj->no_animal }}">
        </div>
        <div class="ui input col-md-4">
            <label for="no_raca" class="font-weight-bold">Raça:</label>
            <input type="text" id="no_raca" name="no_raca" value="{{ $obj->no_raca }}">
        </div>
        <div class="ui input col-md-4">
            <label for="no_apelido" class="font-weight-bold">Apelido: </label>
            <input type="text" id="no_apelido" name="no_apelido" value="{{ $obj->no_apelido }}">
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
    
</form>

<script>
    $(document).ready(function() {
         //Lista apt's
         carregarListaApt();
    });

    //FORMULÁRIO => salvar
    $('#form-morador-animal').unbind('submit').submit(function(e){
            e.preventDefault();
            let apartamento = $('#no_apartamento').val();
            let nomeMorador = $('#id_morador').val();
            let animalTipo = $('#id_animal_tipo').val();
            let nomeAnimal = $('#no_animal').val();
            let raca = $('#no_raca').val();

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
            if (!animalTipo) {
                return message('error', 'Tipo não foi informado!');
                return false;
            }

            //VALIDAÇÃO => placa
            if (!nomeAnimal) {
                return message('error', 'Nome do animal não foi informada!');
                return false;
            }

            //VALIDAÇÃO => placa
            if (!raca) {
                return message('error', 'Raça do animal não foi informada!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') {

                        $('#form-morador-animal').hide();
                        $('#btn-option-back-morador-animal').hide();
                        $('#btn-option-new-animal-form').show();
                        $('#grid-morador-animal').show();
                        $('h1').html('Animais');
                        $('#btn-consultar-morador-animal').click();

                        if (!$('[name="id_animal"]').val()) {
                            //mensagem
                            return message('success', json.msg);
                        } else {
                            //mensagem
                            return message('success', 'Edição realizada com sucesso.');
                        }
                    } else {
                        //mensagem
                        return message('success', json.msg);
                        return false;
                    }
                }
            });
        });
</script>