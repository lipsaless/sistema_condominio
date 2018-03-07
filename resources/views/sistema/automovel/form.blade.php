<form id="form-morador">
    <h2 class="text-center">Cadastro de Automóvel</h2>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <label for="no_apartamento" class="font-weight-bold">Apartamento: *</label>
            <select class="form-control">
                <option></option>
            </select>
        </div>
        <div class="col-md-5">
            <label for="no_automovel" class="font-weight-bold">Nome do veículo: *</label>
            <input type="text" class="form-control" id="no_morador">
        </div>
        <div class="col-md-4">
            <label for="no_modelo" class="font-weight-bold">Modelo do veículo: *</label>
            <input type="text" class="form-control" id="">
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-3">
            <label for="sg_sexo_morador" class="font-weight-bold">Sexo: *</label>
            <select class="form-control">
                <option>Masculino</option>
                <option>Feminino</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="nu_rg_morador" class="font-weight-bold">RG:</label>
            <input type="text" class="form-control" id="nu_rg_morador">
        </div>
        <div class="col-md-3">
            <label for="nu_cpf_morador" class="font-weight-bold">CPF: *</label>
            <input type="text" class="form-control" id="nu_cpf_morador">
        </div>
        <div class="col-md-3">
            <label for="dt_nascimento_morador" class="font-weight-bold">Data de Nascimento:</label>
            <input type="text" class="form-control" id="dt_nascimento_morador">
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