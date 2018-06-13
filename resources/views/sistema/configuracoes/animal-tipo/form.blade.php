<!-- Form -->
<form id="form-animal-tipo" action="{{ route('animal-tipo-gravar') }}" method="POST">
    <input type="hidden" name="id_animal_tipo" value="{{ $obj->id_animal_tipo }}">
    <hr>
    <div class="row">
        <div class="ui input col-md-4">
            <label for="no_animal_tipo" class="font-weight-bold">Nome: *</label>
            <input type="text" id="no_animal_tipo" name="no_animal_tipo" value="{{ $obj->no_animal_tipo }}">
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
     $('#form-animal-tipo').unbind('submit').submit(function(e){
            e.preventDefault();

            let nomeAnimalTipo = $('#no_animal_tipo').val();

            //VALIDAÇÃO => nome do tipo de morador
            if (!nomeAnimalTipo) {
                return message('error', 'Nome do tipo de animal não foi informado!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') {

                        $('#btn-option-back-animal-tipo').hide();
                        $('#btn-option-new-animal-tipo').show();
                        $('#form-animal-tipo').hide();
                        $('#grid-animal-tipo').show();
                        $('h1').html('Tipos de animais');
                        $('#btn-consultar-animal-tipo').click();
                        
                        if (!$('[name="id_animal_tipo"]').val()) {
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