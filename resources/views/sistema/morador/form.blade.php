<?php 
    if ($obj->dt_nascimento_morador) {
        $dataNascimento = date('d/m/Y', strtotime($obj->dt_nascimento_morador));
    } else {
        $dataNascimento = '';
    }
?>

<form id="form-morador" action="{{ route('morador-gravar') }}" method="POST">
    <input type="hidden" name="id_morador" value="{{ $obj->id_morador }}">
    <hr>
    <fieldset id="fieldset">
        <legend>Dados</legend>
        <div class="row">
            <div class="col-md-3">
                <label for="id_apartamento" class="font-weight-bold">Apartamento: *</label>
                <select class="form-control" id="id_apartamento" name="id_apartamento">
                        <option value="">Selecione</option>
                    <?php foreach ($apartamentos as $apt): ?>
                    <?php $selecionado = ($apt->id_apartamento == $obj->id_apartamento) ? 'selected' : '' ?>
                        <option value="<?php echo $apt->id_apartamento; ?>" <?php echo $selecionado; ?>><?php echo $apt->no_apartamento; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-5">
                <label for="no_morador" class="font-weight-bold">Nome do Morador: *</label>
                <input type="text" class="form-control" id="no_morador" name="no_morador" value="{{ $obj->no_morador }}">
            </div>
            <div class="col-md-4">
                <label for="id_morador_tipo" class="font-weight-bold">Tipo de Morador: *</label>
                <select class="form-control" id="id_morador_tipo" name="id_morador_tipo">
                        <option value="">Selecione</option>
                    <?php foreach($tipos as $value) :?>
                    <?php $selecionado = ($value->id_morador_tipo == $obj->id_morador_tipo) ? 'selected' : '' ?>
                        <option value="<?php echo $value->id_morador_tipo; ?>" <?php echo $selecionado; ?>><?php echo $value->no_morador_tipo; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-3">
                <label for="sg_sexo_morador" class="font-weight-bold">Sexo: *</label>
                <select id="sg_sexo_morador" name="sg_sexo_morador" class="form-control" value="">
                    <option value="">Selecione</option>
                    <?php foreach ($sexo as $value): ?>
                        <option value="{{ $obj->sg_sexo_morador }}"><?php echo $value; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-3">
                <label for="nu_rg_morador" class="font-weight-bold">RG:</label>
                <input type="text" class="form-control" id="nu_rg_morador" name="nu_rg_morador" value="{{ $obj->nu_rg_morador }}">
            </div>
            <div class="col-md-3">
                <label for="nu_cpf_morador" class="font-weight-bold">CPF: *</label>
                <input type="text" class="form-control" id="nu_cpf_morador" name="nu_cpf_morador" value="{{ $obj->nu_cpf_morador }}">
            </div>
            <div class="col-md-3">
                <label for="dt_nascimento_morador" class="font-weight-bold">Data de Nascimento:</label>
                <input type="text" class="form-control" id="dt_nascimento_morador" name="dt_nascimento_morador" value="<?php echo $dataNascimento; ?>">
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-3">
                <label for="nu_telefone_morador" class="font-weight-bold">Telefone: </label>
                <input type="text" class="form-control" id="nu_telefone_morador" name="nu_telefone_morador" value="{{ $obj->nu_telefone_morador }}">
            </div>
            <div class="col-md-4">
                <label for="nu_celular_morador" class="font-weight-bold">Celular:</label>
                <input type="text" class="form-control" id="nu_celular_morador" name="nu_celular_morador" value="{{ $obj->nu_celular_morador }}">
            </div>
            <div class="col-md-5">
                <label for="ds_email_morador" class="font-weight-bold">E-mail:</label>
                <input type="text" class="form-control" id="ds_email_morador" name="ds_email_morador" value="{{ $obj->ds_email_morador }}">
            </div>
            <div class="col-md-12 my-5">
                <button id="btn-option-save" type ="submit" class="ui positive button" style=" float: right; right: 0;">
                    <i class="fa fa-check"></i>
                    Salvar
                </button>
            </div>
        </div>
    </fieldset>
</form>

<script>
    $(document).ready(function() {
        $('#btn-option-back').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back').hide();
            $('#btn-option-new').show();
            $('#form-morador-cadastro').hide();
            $('#grid-moradores').show()
            $('#btn-morador-consulta').click();
            $('h1').html('Moradores');
        });
        
        //FORMULÁRIO => salvar
        $('#form-morador').submit(function(e){
            e.preventDefault();
            let apartamento = $('#id_apartamento').val();
            let nomeMorador = $('#no_morador').val();
            let tipoMorador = $('#id_morador_tipo').val();
            let sexo = $('#sg_sexo_morador').val();
            let cpf = $('#nu_cpf_morador').val();
            let dtNascimento = $('#dt_nascimento_morador').val();

            //VALIDAÇÃO => apartamento
            if (!apartamento) {
                return message('warning', 'Apartamento não foi informado!');
                return false;
            }

            //VALIDAÇÃO => nome morador
            if (!nomeMorador) {
                return message('warning', 'Nome do morador não foi informado!');
                return false;
            }

            //VALIDAÇÃO => tipo do morador
            if (!tipoMorador) {
                return message('warning', 'Tipo de morador não foi informado!');
                return false;
            }

            //VALIDAÇÃO => CPF
            if (!cpf) {
                return message('warning', 'CPF não foi informado!');
                return false;
            }

            //VALIDAÇÃO => data de nascimento
            if (!dtNascimento) {
                return message('warning', 'Data de nascimento não foi informada!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#btn-option-back').hide();
                    $('#btn-option-new').show();
                    $('#form-morador').hide();
                    $('#grid-moradores').show();
                    $('h1').html('Moradores');
                    $('#btn-consultar-morador').click();
                    //mensagem
                    if (!$('[name="id_morador"]').val()) {
                        return message('success', 'Cadastro efetuado com sucesso!');
                    } else {
                        return message('success', 'Morador editado com sucesso!');
                    }
                }
            });
        });

        //Mask
        $('#nu_cpf_morador').mask('999.999.999-99');
        $('#nu_rg_morador').mask('9.999.999');
        $('#nu_telefone_morador').mask('(99)9999-9999');
        $('#nu_celular_morador').mask('(99)9.9999-9999');
        $("#dt_nascimento_morador").mask('99/99/9999');
        $("#dt_nascimento_morador").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });
    });
</script>