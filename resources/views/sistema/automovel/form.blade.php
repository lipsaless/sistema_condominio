<!-- Title -->
<h2 class="text-center">Cadastro de Automóvel</h2>

<!-- Form -->
<form id="form-morador-automovel">
    <hr>
    <div class="row">
        <div class="col-md-3">
            <label for="no_apartamento" class="font-weight-bold">Apartamento: *</label>
            <select class="custom-select">
                    <option value="">Selecione</option>
                <?php foreach ($apartamentos as $apt): ?>
                    <option value="<?php echo $apt->id_apartamento; ?>"><?php echo $apt->no_apartamento; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-5">
            <label for="no_morador" class="font-weight-bold">Morador: *</label>
            <input type="text" class="form-control" id="no_morador" name="no_morador">
        </div>
        <div class="col-md-4">
            <label for="no_automovel" class="font-weight-bold">Nome do veículo: *</label>
            <input type="text" class="form-control" id="no_automovel" name="no_automovel">
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-3">
            <label for="no_modelo" class="font-weight-bold">Modelo do veículo: *</label>
            <input type="text" class="form-control" id="no_modelo" name="no_modelo">
        </div>
        <div class="col-md-3">
            <label for="nu_placa" class="font-weight-bold">Placa:</label>
            <input type="text" class="form-control" id="nu_placa" name="nu_placa">
        </div>
        <div class="col-md-3">
            <label for="no_cor" class="font-weight-bold">Cor: *</label>
            <input type="text" class="form-control" id="no_cor" name="no_cor">
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
        const titulo = document.querySelector('h1');
        typeWriter(titulo);

        /*Mask*/
        $('#nu_placa').mask({mask: 'AAA-9999'})

        /*Voltar*/
        $('#btn-option-back-morador-automovel').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back-morador-automovel').hide();
            $('#btn-option-new-automovel-form').show();
            $('#form-morador-automovel').hide();
            $('#principal-morador-automovel').show();
            $('h1').show();
        });
    });
</script>