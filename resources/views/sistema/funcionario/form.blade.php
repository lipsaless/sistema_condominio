<?php 
    if ($obj->dt_nascimento_funcionario) {
        $dataNascimento = date('d/m/Y', strtotime($obj->dt_nascimento_funcionario));
    } else {
        $dataNascimento = '';
    }
?>

<!-- Form -->
<form id="form-funcionario" action="{{ route('funcionario-gravar') }}" method="POST">
    <input type="hidden" name="id_funcionario" value="{{ $obj->id_funcionario }}">
    <hr>
    <div class="row">
        <div class="col-md-5">
            <label for="no_funcionario" class="font-weight-bold">Nome do Funcionário: *</label>
            <input type="text" class="form-control" id="no_funcionario" name="no_funcionario" value="{{ $obj->no_funcionario }}">
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-3">
            <label for="sg_sexo_funcionario" class="font-weight-bold">Sexo: *</label>
            <select id="sg_sexo_funcionario" name="sg_sexo_funcionario" class="form-control">
                <?php foreach ($sexo as $value): ?>
                    <option value="{{ $obj->sg_sexo_funcionario }}"><?php echo $value; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="nu_rg_funcionario" class="font-weight-bold">RG:</label>
            <input type="text" class="form-control" id="nu_rg_funcionario" name="nu_rg_funcionario" value="{{ $obj->nu_rg_funcionario }}">
        </div>
        <div class="col-md-3">
            <label for="nu_cpf_funcionario" class="font-weight-bold">CPF:</label>
            <input type="text" class="form-control" id="nu_cpf_funcionario" name="nu_cpf_funcionario" value="{{ $obj->nu_cpf_funcionario }}">
        </div>
        <div class="col-md-3">
            <label for="dt_nascimento_funcionario" class="font-weight-bold">Data de Nascimento:</label>
            <input type="text" class="form-control" id="dt_nascimento_funcionario" name="dt_nascimento_funcionario" value="<?php echo $dataNascimento; ?>">
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-3">
            <label for="nu_telefone_funcionario" class="font-weight-bold">Telefone: </label>
            <input type="text" class="form-control" id="nu_telefone_funcionario" name="nu_telefone_funcionario" value="{{ $obj->nu_telefone_funcionario }}">
        </div>
        <div class="col-md-4">
            <label for="nu_celular_funcionario" class="font-weight-bold">Celular:</label>
            <input type="text" class="form-control" id="nu_celular_funcionario" name="nu_celular_funcionario" value="{{ $obj->nu_celular_funcionario }}">
        </div>
        <div class="col-md-5">
            <label for="ds_email_funcionario" class="font-weight-bold">E-mail:</label>
            <input type="text" class="form-control" id="ds_email_funcionario" name="ds_email_funcionario" value="{{ $obj->ds_email_funcionario }}">
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
    </div>
</form>

<script>
    $(document).ready(function() {
        /*Voltar*/
        $('#btn-option-back-funcionario').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back-funcionario').hide();
            $('#btn-option-new-funcionario').show();
            $('#form-funcionario').hide();
            $('#grid-funcionarios').show();
            $('h1').html('Funcionários');
        });

        //FORMULÁRIO => salvar
        $('#form-funcionario').unbind('submit').submit(function(e){
            e.preventDefault();

            let nomeFuncionario = $('#no_funcionario').val();
            let sexo = $('#sg_sexo_funcionario').val();
            let rg = $('#nu_rg_funcionario').val();

            //VALIDAÇÃO => apartamento
            if (!nomeFuncionario) {
                return message('error', 'Nome do funcionário não foi informado!');
                return false;
            }

            //VALIDAÇÃO => nome morador
            if (!sexo) {
                return message('error', 'Sexo não foi informadO!');
                return false;
            }

            //VALIDAÇÃO => tipo do morador
            if (!rg) {
                return message('error', 'RG não foi informado!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#btn-option-back-funcionario').hide();
                    $('#btn-option-new-funcionario').show();
                    $('#form-funcionario').hide();
                    $('#grid-funcionarios').show();
                    $('h1').html('Funcionarios');
                    $('#btn-consultar-funcionario').click();
                    //mensagem
                    if (!$('[name="id_funcionario"]').val()) {
                        return message('success', 'Cadastro efetuado com sucesso!');
                    } else {
                        return message('success', 'Funcionário editado com sucesso!');
                    }
                }
            });
        });

        /*Mask*/
        $('#nu_cpf_funcionario').mask('999.999.999-99');
        $('#nu_rg_funcionario').mask('9.999.999');
        $('#nu_telefone_funcionario').mask('(99)9999-9999');
        $('#nu_celular_funcionario').mask('(99)9.9999-9999');
        $("#dt_nascimento_funcionario").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
        });
    });
</script>