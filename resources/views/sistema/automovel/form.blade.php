<!-- Form -->
<form id="form-morador-automovel" action="{{ route('morador-automovel-gravar') }}" method="POST">
    <hr>
    <fieldset id="fieldset">
        <div class="row">
            <div class="col-md-3">
                <label for="no_apartamento" class="font-weight-bold">Apartamento: *</label>
                <input type="text" id="no_apartamento" class="form-control" value="">
                <?php echo App\Helpers\Html::listaApt(); ?>
            </div>
            <div class="col-md-4">
                <label for="id_morador" class="font-weight-bold">Morador: *</label>
                <select name="id_morador" id="id_morador" class="custom-select" value=""></select>
            </div>
            <div class="col-md-4">
                <label for="no_automovel" class="font-weight-bold">Nome do veículo: *</label>
                <input type="text" class="form-control" id="no_automovel" name="no_automovel" value="{{ $obj->no_automovel }}">
            </div>
        </div>
        <div class="row my-3">
            <div class="col-md-3">
                <label for="no_modelo" class="font-weight-bold">Modelo do veículo: *</label>
                <input type="text" class="form-control" id="no_modelo" name="no_modelo" value="{{ $obj->no_modelo }}">
            </div>
            <div class="col-md-3">
                <label for="nu_placa" class="font-weight-bold">Placa:</label>
                <input type="text" class="form-control" id="nu_placa" name="nu_placa" value="{{ $obj->nu_placa }}">
            </div>
            <div class="col-md-3">
                <label for="no_cor" class="font-weight-bold">Cor: *</label>
                <input type="text" class="form-control" id="no_cor" name="no_cor" value="{{ $obj->no_cor }}">
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
        //Lista apt's
        carregarListaApt();

        /*Mask*/
        $('#nu_placa').mask({mask: 'AAA-9999'});

        //FORMULÁRIO => salvar
        $('#form-morador-automovel').submit(function(e){
            e.preventDefault();
            let apartamento = $('#id_apartamento').val();
            let nomeMorador = $('#id_morador').val();
            let nomeAutomovel = $('#no_automovel').val();
            let nomeModelo = $('#no_modelo').val();
            let nuPlaca = $('#nu_placa').val();
            let noCor = $('#no_cor').val();

            //VALIDAÇÃO => apartamento
            if (!apartamento) {
                return message('warning', 'Apartamento não foi informado!');
                return false;
            }

            //VALIDAÇÃO => nome morador
            if (!nomeMorador) {
                return message('warning', 'Morador não foi informado!');
                return false;
            }

            //VALIDAÇÃO => tipo do morador
            if (!nomeAutomovel) {
                return message('warning', 'Nome do automóvel não foi informado!');
                return false;
            }

            //VALIDAÇÃO => CPF
            if (!nomeModelo) {
                return message('warning', 'Modelo do carro não foi informado!');
                return false;
            }

            //VALIDAÇÃO => data de nascimento
            if (!nuPlaca) {
                return message('warning', 'Placa do automóvel não foi informada!');
                return false;
            }

            if (!noCor) {
                return message('warning', 'Cor não foi informada!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#form-morador-automovel').hide();
                    $('#btn-option-back-morador-automovel').hide();
                    $('#btn-option-new-morador-automovel').show();
                    $('#grid-morador-automovel').show();
                    $('h1').html('Automóveis');
                    $('#btn-consultar-morador-automovel').click();

                     //mensagem
                     return message('success', 'Cadastro efetuado com sucesso!');
                }
            });
        });
    });
</script>