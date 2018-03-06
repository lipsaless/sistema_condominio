<form id="form-morador">
    <h2 class="text-center">Cadastro de Morador</h2>
    <div class="row">
        <div class="col-md-3">
            <label for="no_apartamento" class="font-weight-bold">Apartamento:</label>
            <select class="form-control">
                <option></option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="no_morador" class="font-weight-bold">Nome do Morador:</label>
            <input type="text" class="form-control" id="no_morador">
        </div>
        <div class="col-md-3">
            <label for="no_morador_tipo" class="font-weight-bold">Tipo de Morador:</label>
            <select class="form-control">
                <option>Normal</option>
                <option>Proprietário</option>
                <option>Inquilino</option>
            </select>
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-2">
            <label for="sg_sexo_morador" class="font-weight-bold">Sexo:</label>
            <select class="form-control">
                <option>Masculino</option>
                <option>Feminino</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="nu_rg_morador" class="font-weight-bold">RG:</label>
            <input type="text" class="form-control" id="nu_rg_morador">
        </div>
        <div class="col-md-2">
            <label for="nu_cpf_morador" class="font-weight-bold">CPF:</label>
            <input type="text" class="form-control" id="nu_cpf_morador">
        </div>
        <div class="col-md-3">
            <label for="dt_nascimento_morador" class="font-weight-bold">Data de Nascimento:</label>
            <input type="text" class="form-control" id="dt_nascimento_morador">
        </div>
        <div class="col-md-10 my-5">
            <button id="btn-option-save" class="ui positive button" style=" float: right; right: 10;">
                <i class="fa fa-check"></i>
                <a id="salvar" style="color: black !important; text-decoration: none !important;">Salvar</a>
            </button>
        </div>
    </div>
    
</form>

<script>
    $(document).ready(function() {
        $('#nu_cpf_morador').mask('999.999.999-99');
        $('#nu_rg_morador').mask('9.999.999');
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