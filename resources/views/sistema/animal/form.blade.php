
<form id="form-morador-animal" method="post" action="{{ route('morador-animal-gravar') }}">
    <h2 class="text-center">Cadastro de Animais de Estimação</h2>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <label for="id_apartamento" class="font-weight-bold">Apartamento: *</label>
            <select class="form-control" name="id_apartamento" id="id_apartamento">
                <option value=""></option>
                <option value=""></option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="no_animal_tipo" class="font-weight-bold">Tipo: *</label>
            <select class="form-control" name="no_animal_tipo" id="no_animal_tipo">
                <?php foreach ($tipos as $tipo): ?>
                    <option value="<?php echo $tipo->id_animal_tipo; ?>"><?php echo $tipo->no_animal_tipo; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-3">
            <label for="no_modelo" class="font-weight-bold">Nome: *</label>
            <input type="text" class="form-control" id="no_modelo" name="no_modelo">
        </div>
    </div>
    <div class="row my-3">
        <div class="col-md-3">
            <label for="no_raça" class="font-weight-bold">Raça:</label>
            <input type="text" class="form-control" id="no_raça" name="no_raça">
        </div>
        <div class="col-md-3">
            <label for="no_apelido" class="font-weight-bold">Apelido: </label>
            <input type="text" class="form-control" id="no_apelido" name="no_apelido">
        </div>
        <div class="col-md-12 my-5">
            <button id="btn-option-save" class="ui positive button" style=" float: right; right: 0;">
                <i class="fa fa-check"></i>
                Salvar
            </button>
        </div>
    </div>
    
</form>

<script>
    $(document).ready(function() {
        $('#btn-option-back-morador-animal').click(function(e){
            e.preventDefault();
            $('#btn-option-back-morador-animal').hide();
            $('#btn-option-new-animal-form').show();
            $('#form-morador-animal').hide();
            $('#principal-morador-animal').show();
            $('h1').show();
        });
    });
</script>