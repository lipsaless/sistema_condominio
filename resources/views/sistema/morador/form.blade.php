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
            <div class="ui input col-md-3">
                <label for="no_apartamento" class="font-weight-bold">Apartamento: *</label>
                <input type="text" id="no_apartamento" value="{{ $obj->no_apartamento }}">
                <?php echo App\Helpers\Html::listaApt($obj->id_apartamento); ?>
            </div>
            <div class="col-md-4">
                <label for="id_morador" class="font-weight-bold">Morador: *</label>
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
                <select id="sg_sexo_morador" name="sg_sexo_morador" class="form-control">
                        <option value="">Selecione</option>
                    <?php foreach ($sexo as $key => $value): ?>
                    <?php $selecionado = ($key == $obj->sg_sexo_morador) ? 'selected' : '' ?>
                        <option value="<?php echo $key; ?>" <?php echo $selecionado; ?>><?php echo $value; ?></option>
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

        $('#btn-option-back').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back').hide();
            $('#btn-option-new').show();
            $('#form-morador-cadastro').hide();
            $('#grid-moradores').show()
            $('#btn-morador-consulta').click();
            $('h1').html('Moradores');
        });
        
        $('#no_apartamento').keyup(function() {
            if (!$('#no_apartamento').val()) {
                $('[name="id_apartamento"]').val('');
            }
        })

        //FORMULÁRIO => salvar
        $('#form-morador').unbind('submit').submit(function(e){
            e.preventDefault();

            let apartamento = $('#no_apartamento').val();
            let nomeMorador = $('#no_morador').val();
            let tipoMorador = $('#id_morador_tipo').val();
            let sexo = $('#sg_sexo_morador').val();
            let cpf = $('#nu_cpf_morador').val();
            let dtNascimento = $('#dt_nascimento_morador').val();

            //VALIDAÇÃO => apartamento
            if (!apartamento) {
                return message('error', 'Apartamento não foi informado!');
                return false;
            }

            //VALIDAÇÃO => nome morador
            if (!nomeMorador) {
                return message('error', 'Nome do morador não foi informado!');
                return false;
            }

            //VALIDAÇÃO => tipo do morador
            if (!tipoMorador) {
                return message('error', 'Tipo de morador não foi informado!');
                return false;
            }

            //VALIDAÇÃO => CPF
            if (!cpf) {
                return message('error', 'CPF não foi informado!');
                return false;
            }

            //VALIDAÇÃO => data de nascimento
            if (!dtNascimento) {
                return message('error', 'Data de nascimento não foi informada!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') {

                        $('#btn-option-back').hide();
                        $('#btn-option-new').show();
                        $('#form-morador').hide();
                        $('#grid-moradores').show();
                        $('h1').html('Moradores');
                        $('#btn-consultar-morador').click();
                        
                        if (!$('[name="id_morador"]').val()) { //Se não tiver dados no formulário
                            return message('success', json.msg);
                        } else { //Se tiver
                            return message('success', 'Edição realizada com sucesso.');
                        }
                    } else { //Caso dê erro na edição ou cadastro
                        return message('error', json.msg);
                        return false;
                    }
                }
            });
        });

        //Mask
        $('#nu_cpf_morador').mask('999.999.999-99');
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