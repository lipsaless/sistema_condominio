<!-- Form -->
<form id="form-visitante-tipo" action="{{ route('visitante-tipo-gravar') }}" method="POST">
    <input type="hidden" name="id_visitante_tipo" value="{{ $obj->id_visitante_tipo }}">
    <hr>
    <div class="row">
        <div class="ui input col-md-4">
            <label for="no_visitante_tipo" class="font-weight-bold">Nome: *</label>
            <input type="text" id="no_visitante_tipo" name="no_visitante_tipo" value="{{ $obj->no_visitante_tipo }}">
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
     $('#form-visitante-tipo').unbind('submit').submit(function(e){
            e.preventDefault();

            let nomeVisitanteTipo = $('#no_visitante_tipo').val();

            //VALIDAÇÃO => nome do tipo de morador
            if (!nomeVisitanteTipo) {
                return message('error', 'Nome do tipo de visitante não foi informado!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') {

                        $('#btn-option-back-visitante-tipo').hide();
                        $('#btn-option-new-visitante-tipo').show();
                        $('#form-visitante-tipo').hide();
                        $('#grid-visitante-tipo').show();
                        $('h1').html('Tipos de visitantes');
                        $('#btn-consultar-visitante-tipo').click();
                        
                        if (!$('[name="id_visitante_tipo"]').val()) {
                            return message('success', json.msg);
                        } else {
                            return message('success', 'Edição realizada com sucesso.');
                        }
                        
                    } else {
                        return message('error', json.msg);
                        return false;
                    }
                }
            });
        });
</script>