<!-- Form -->
<form id="form-apt" action="{{ route('apt-gravar') }}" method="POST">
    <input type="hidden" name="id_apartamento" value="{{ $obj->id_apartamento }}">
    <hr>
    <div class="row">
        <div class="ui input col-md-4">
            <label for="no_apartamento" class="font-weight-bold">Nome: *</label>
            <input type="text" id="no_apartamento" name="no_apartamento" value="{{ $obj->no_apartamento }}">
        </div>
        <div class="col-md-4">
            <label for="id_bloco" class="font-weight-bold">Bloco: *</label>
            <select name="id_bloco" id="id_bloco" class="custom-select">
                <option value="">Selecione</option>
                <?php foreach ($blocos as $bloco): ?>
                <?php $selecionado = ($bloco->id_bloco == $obj->id_bloco) ? 'selected' : '' ?>
                    <option value="<?php echo $bloco->id_bloco; ?>" <?php echo $selecionado; ?>><?php echo $bloco->no_bloco; ?></option>
                <?php endforeach; ?>
            </select>
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
     //FORMULÁRIO => salvar
     $('#form-apt').unbind('submit').submit(function(e){
            e.preventDefault();

            let apartamento = $('#no_apartamento').val();
            let bloco = $('#id_bloco').val();

            //VALIDAÇÃO => apartamento
            if (!apartamento) {
                return message('error', 'Apartamento não foi informado!');
                return false;
            }

            //VALIDAÇÃO => bloco
            if (!bloco) {
                return message('error', 'Bloco não foi informado!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#btn-option-back-apt').hide();
                    $('#btn-option-new-apt').show();
                    $('#form-apt').hide();
                    $('#grid-apt').show();
                    $('h1').html('Apartamentos');
                    $('#btn-consultar-apt').click();

                    //mensagem
                    return message('success', 'Cadastro efetuado com sucesso!');
                }
            });
        });
</script>