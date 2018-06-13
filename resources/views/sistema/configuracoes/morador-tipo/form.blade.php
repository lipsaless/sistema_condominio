<!-- Form -->
<form id="form-morador-tipo" action="{{ route('morador-tipo-gravar') }}" method="POST">
    <input type="hidden" name="id_morador_tipo" value="{{ $obj->id_morador_tipo }}">
    <hr>
    <div class="row">
        <div class="ui input col-md-4">
            <label for="no_morador_tipo" class="font-weight-bold">Nome: *</label>
            <input type="text" id="no_morador_tipo" name="no_morador_tipo" value="{{ $obj->no_morador_tipo }}">
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
</form>

<script>
     //FORMULÁRIO => salvar
     $('#form-morador-tipo').unbind('submit').submit(function(e){
            e.preventDefault();

            let nomeMoradorTipo = $('#no_morador_tipo').val();

            //VALIDAÇÃO => nome do tipo de morador
            if (!nomeMoradorTipo) {
                return message('error', 'Nome do tipo de morador não foi informado!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') {
                        $('#btn-option-back-morador-tipo').hide();
                        $('#btn-option-new-morador-tipo').show();
                        $('#form-morador-tipo').hide();
                        $('#grid-morador-tipo').show();
                        $('h1').html('Tipos de moradores');
                        $('#btn-consultar-morador-tipo').click();

                        return message('success', json.msg);
                    } else {
                        return message('error', json.msg);
                        return false;
                    }
                }
            });
        });
</script>