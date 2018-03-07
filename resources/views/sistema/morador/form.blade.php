<form id="form-morador" action="{{ route('morador-gravar') }}">
    {{csrf_field()}}
    <h2 class="text-center">Cadastro de Morador</h2>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <label for="no_apartamento" class="font-weight-bold">Apartamento: *</label>
            <select class="form-control" id="no_apartamento" name="no_apartamento">
                <option></option>
            </select>
        </div>
        <div class="col-md-5">
            <label for="no_morador" class="font-weight-bold">Nome do Morador: *</label>
            <input type="text" class="form-control" id="no_morador" name="no_morador">
        </div>
        <div class="col-md-4">
            <label for="no_morador_tipo" class="font-weight-bold">Tipo de Morador: *</label>
            <select class="form-control" id="no_morador_tipo" name="no_morador_tipo">
                <option>Normal</option>
                <option>Proprietário</option>
                <option>Inquilino</option>
            </select>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-3">
            <label for="sg_sexo_morador" class="font-weight-bold">Sexo: *</label>
            <select id="sg_sexo_morador" name="sg_sexo_morador" class="form-control">
                <option>Masculino</option>
                <option>Feminino</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="nu_rg_morador" class="font-weight-bold">RG:</label>
            <input type="text" class="form-control" id="nu_rg_morador" name="nu_rg_morador">
        </div>
        <div class="col-md-3">
            <label for="nu_cpf_morador" class="font-weight-bold">CPF: *</label>
            <input type="text" class="form-control" id="nu_cpf_morador" name="nu_cpf_morador">
        </div>
        <div class="col-md-3">
            <label for="dt_nascimento_morador" class="font-weight-bold">Data de Nascimento:</label>
            <input type="text" class="form-control" id="dt_nascimento_morador" name="dt_nascimento_morador">
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-3">
            <label for="nu_telefone_morador" class="font-weight-bold">Telefone: </label>
            <input type="text" class="form-control" id="nu_telefone_morador" name="nu_telefone_morador">
        </div>
        <div class="col-md-4">
            <label for="nu_celular_morador" class="font-weight-bold">Celular:</label>
            <input type="text" class="form-control" id="nu_celular_morador" name="nu_celular_morador">
        </div>
        <div class="col-md-5">
            <label for="ds_email_morador" class="font-weight-bold">E-mail:</label>
            <input type="text" class="form-control" id="ds_email_morador" name="ds_email_morador">
        </div>
        <div class="col-md-12 my-5">
            <button id="btn-option-save" class="ui positive button" style=" float: right; right: 0;">
                <i class="fa fa-check"></i>
                <a id="salvar" href="" style="color: black !important; text-decoration: none !important;">Salvar</a>
            </button>
        </div>
    </div>
    
</form>

<script>
    $(document).ready(function() {
        $('#nu_cpf_morador').mask('999.999.999-99');
        $('#nu_rg_morador').mask('9.999.999');
        $('#nu_telefone_morador').mask('(99)9999-9999');
        $('#nu_celular_morador').mask('(99)9.9999-9999');
        $("#dt_nascimento_morador").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
        });
    });
</script>