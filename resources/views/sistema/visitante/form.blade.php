<?php 
    if ($obj->dt_nascimento_funcionario) {
        $dataNascimento = date('d/m/Y', strtotime($obj->dt_nascimento_funcionario));
    } else {
        $dataNascimento = '';
    }
?>

<!-- Form -->
<form id="form-visitante" action="{{ route('visitante-gravar') }}" method="POST">
    <input type="hidden" name="id_visitante" value="{{ $obj->id_visitante }}">
    <hr>
    <div class="row">
        <div class="col-md-5">
            <label for="no_visitante" class="font-weight-bold">Nome do visitante: *</label>
            <input type="text" class="form-control" id="no_visitante" name="no_visitante" value="{{ $obj->no_visitante }}">
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
        <div class="col-md-3">
            <label for="nu_rg" class="font-weight-bold">RG: *</label>
            <input type="text" class="form-control" id="nu_rg" name="nu_rg" value="{{ $obj->nu_rg }}">
        </div>
        <div class="col-md-3">
            <label for="nu_cpf" class="font-weight-bold">CPF: </label>
            <input type="text" class="form-control" id="nu_cpf" name="nu_cpf" value="{{ $obj->nu_cpf }}">
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-4">
            <label for="nu_celular" class="font-weight-bold">Celular:</label>
            <input type="text" class="form-control" id="nu_celular" name="nu_celular" value="{{ $obj->nu_celular }}">
        </div>
        <div class="col-md-5">
            <label for="ds_email" class="font-weight-bold">E-mail:</label>
            <input type="text" class="form-control" id="ds_email" name="ds_email" value="{{ $obj->ds_email }}">
        </div>
        <div class="col-md-12 my-5">
            <button id="btn-option-save" type="submit" class="ui positive button" style=" float: right; right: 0;">
                <i class="fa fa-check"></i>
                Salvar
            </button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
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
                    if (!$('[name="id_funcionario"]').val()) {
                        return message('success', 'Cadastro efetuado com sucesso!');
                    } else {
                        return message('success', 'Funcionário editado com sucesso!');
                    }
                }
            });
        });
</script>