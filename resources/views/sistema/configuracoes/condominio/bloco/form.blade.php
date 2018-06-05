<!-- Form -->
<form id="form-bloco" action="{{ route('bloco-gravar') }}" method="POST">
    <input type="hidden" name="id_bloco" value="{{ $obj->id_bloco }}">
    <input type="hidden" name="id_condominio" value="{{ $obj->id_condominio }}">
    <hr>
    <div class="row">
        <div class="ui input col-md-4">
            <label for="no_bloco" class="font-weight-bold">Nome: *</label>
            <input type="text" id="no_bloco" name="no_bloco" value="{{ $obj->no_bloco }}">
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
     $('#form-bloco').unbind('submit').submit(function(e){
            e.preventDefault();

            let bloco = $('#no_bloco').val();

            //VALIDAÇÃO => apartamento
            if (!bloco) {
                return message('error', 'Nome do bloco não foi informado!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#btn-option-back-bloco').hide();
                    $('#btn-option-new-bloco').show();
                    $('#form-bloco').hide();
                    $('#grid-bloco').show();
                    $('h1').html('Blocos');
                    $('#btn-consultar-bloco').click();

                    //mensagem
                    return message('success', 'Cadastro efetuado com sucesso!');
                }
            });
        });
</script>