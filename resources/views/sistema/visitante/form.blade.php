<!-- Form -->
<form id="form-visitante" action="{{ route('visitante-gravar') }}" method="POST">
    <input type="hidden" name="id_visitante" value="{{ $obj->id_visitante }}">
    <hr>
    <div class="row">
        <div class="ui input col-md-3">
            <label for="no_apartamento" class="font-weight-bold">Apartamento: *</label>
            <input type="text" id="no_apartamento" value="{{ $obj->no_apartamento }}">
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
        <div class="ui input col-md-5">
            <label for="no_visitante" class="font-weight-bold">Nome do visitante: *</label>
            <input type="text" id="no_visitante" name="no_visitante" value="{{ $obj->no_visitante }}">
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-3">
            <label for="id_visitante_tipo" class="font-weight-bold">Tipo: *</label>
            <select id="id_visitante_tipo" name="id_visitante_tipo" class="form-control">
                <option value=""> Selecione</option>
                <?php foreach ($visitanteTipo as $value): ?>
                    <option value="<?php echo $value->id_visitante_tipo; ?>"><?php echo $value->no_visitante_tipo; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="ui input col-md-3">
            <label for="nu_rg" class="font-weight-bold">RG: *</label>
            <input type="text" id="nu_rg" name="nu_rg" value="{{ $obj->nu_rg }}">
        </div>
        <div class="ui input col-md-3">
            <label for="nu_cpf" class="font-weight-bold">CPF: </label>
            <input type="text" id="nu_cpf" name="nu_cpf" value="{{ $obj->nu_cpf }}">
        </div>
    </div>
    <div class="row my-3">
        <div class="ui input col-md-4">
            <label for="nu_telefone" class="font-weight-bold">Celular:</label>
            <input type="text" id="nu_telefone" name="nu_telefone" value="{{ $obj->nu_telefone }}">
        </div>
        <div class="ui input col-md-4">
            <label for="nu_celular" class="font-weight-bold">Celular:</label>
            <input type="text" id="nu_celular" name="nu_celular" value="{{ $obj->nu_celular }}">
        </div>
        <div class="ui input col-md-5">
            <label for="ds_email" class="font-weight-bold">E-mail:</label>
            <input type="text" id="ds_email" name="ds_email" value="{{ $obj->ds_email }}">
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

        /*Voltar*/
        $('#btn-option-back-visitante').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back-visitante').hide();
            $('#btn-option-new-visitante').show();
            $('#form-visitante').hide();
            $('#grid-visitantes').show();
            $('h1').html('Visitantes');
        });

        //Mask
        $('#nu_cpf').mask('999.999.999-99');
        $('#nu_rg').mask('9.999.999');
        $('#nu_celular').mask('(99)9.9999-9999');
    });

     //FORMULÁRIO => salvar
     $('#form-visitante').unbind('submit').submit(function(e){
            e.preventDefault();

            let apartamento = $('#no_apartamento').val();
            let nomeMorador = $('#id_morador').val();
            let tipoVisitante = $('#id_visitante_tipo').val();
            let nomeVisitante = $('#no_visitante').val();
            let rg = $('#nu_rg').val();

            //VALIDAÇÃO => apartamento
            if (!apartamento) {
                return message('error', 'Apartamento não foi informado!');
                return false;
            }

            //VALIDAÇÃO => nome morador
            if (!nomeMorador) {
                return message('error', 'Morador não foi informado!');
                return false;
            }

            //VALIDAÇÃO => tipo do morador
            if (!nomeVisitante) {
                return message('error', 'Nome do visitante não foi informado!');
                return false;
            }

            //VALIDAÇÃO => tipo do morador
            if (!tipoVisitante) {
                return message('error', 'Tipo do visitante não foi informado!');
                return false;
            }

            //VALIDAÇÃO => data de nascimento
            if (!rg) {
                return message('error', 'RG não foi informada!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#btn-option-back-visitante').hide();
                    $('#btn-option-new-visitante').show();
                    $('#form-visitante').hide();
                    $('#grid-visitantes').show();
                    $('h1').html('Visitantes');
                    $('#btn-consultar-visitante').click();

                    //mensagem
                    return message('success', 'Cadastro efetuado com sucesso!');
                }
            });
        });
</script>