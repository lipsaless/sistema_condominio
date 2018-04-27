<!-- Form -->
<form id="form-reserva">
    <h2 class="text-center">Cadastro de Reserva</h2>
    <hr>
    <div class="row">
        <div class="col-md-3">
            <label for="no_apartamento" class="font-weight-bold">Apartamento: *</label>
            <select class="form-control" id="no_apartamento" name="no_apartamento">
                <option></option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="no_morador" class="font-weight-bold">Morador: *</label>
            <input type="text" class="form-control" id="no_morador" name="no_morador">
        </div>
        <div class="col-md-5">
            <label for="no_morador" class="font-weight-bold">Espaço de reserva: *</label>
            <select name="" id="" class="form-control">
                <option value=""></option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="dt_reserva" class="font-weight-bold">Data da reserva: *</label>
            <input type="date" class="form-control" id="dt_reserva" name="dt_reserva">
        </div>
        <div class="col-md-12 my-4">
            <button id="btn-option-save" class="ui positive button" style=" float: right; right: 0;">
                <i class="fa fa-check"></i>
                <a id="salvar" href="" style="color: black !important; text-decoration: none !important;">Salvar</a>
            </button>
        </div>
    </div>
</form>

<script>
    $(document).ready(function() {
        /*Voltar*/
        $('#btn-option-back-reserva').unbind('click').click(function(e){
            e.preventDefault();
            $('#btn-option-back-reserva').hide();
            $('#btn-option-new-reserva').show();
            $('#form-reserva').hide();
            $('#principal-reserva').show();
            $('h1').show();
        });
    });
</script>