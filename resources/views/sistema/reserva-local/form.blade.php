<!-- Form -->
<form id="form-reserva-local" action="{{ route('reserva-local-gravar') }}" method="POST">
    <input type="hidden" name="id_reserva_local" value="{{ $obj->id_reserva_local }}">
    <hr>
    <div class="row">
        <div class="ui input col-md-3">
            <label for="no_reserva_local" class="font-weight-bold">Nome do local: *</label>
            <input type="text" id="no_reserva_local" name="no_reserva_local" value="{{ $obj->no_reserva_local }}">
        </div>
        <div class="ui input col-md-3">
            <label for="ref_reserva_local" class="font-weight-bold">Referência: *</label>
            <input type="text" id="ref_reserva_local" name="ref_reserva_local" value="{{ $obj->ref_reserva_local }}">
        </div>
        <div class="ui input col-md-3">
            <label for="vl_reserva_local" class="font-weight-bold">Valor do local: *</label>
            <input type="text" id="vl_reserva_local" name="vl_reserva_local" value="{{ $obj->vl_reserva_local }}">
        </div>
        <div class="ui input col-md-3">
            <label for="nu_convidados" class="font-weight-bold">Número de convidados: </label>
            <input type="text" id="nu_convidados" name="nu_convidados" value="{{ $obj->nu_convidados }}">
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
     $('#form-reserva-local').unbind('submit').submit(function(e){
            e.preventDefault();

            let nomeReserva = $('#no_reserva_local').val();
            let nomeReferencia = $('#ref_reserva_local').val();
            let valorReserva = $('#vl_reserva_local').val();
            let numeroConvidados = $('#nu_convidados').val();

            //VALIDAÇÃO => apartamento
            if (!nomeReserva) {
                return message('error', 'Nome do local não foi informado!');
                return false;
            }

            //VALIDAÇÃO => nome morador
            if (!nomeReferencia) {
                return message('error', 'Referencia não foi informada!');
                return false;
            }

            //VALIDAÇÃO => tipo do morador
            if (!valorReserva) {
                return message('error', 'Valor da reserva não foi informado!');
                return false;
            }

            //VALIDAÇÃO => data de nascimento
            if (!numeroConvidados) {
                return message('error', 'Número de convidados não foi informada!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function(json) {
                    if (json.type == 'success') {
                        $('#btn-option-back-reserva-local').hide();
                        $('#btn-option-new-reserva-local').show();
                        $(this).hide();
                        $('#form-reserva-local').hide();
                        $('#grid-reserva-local').show();
                        $('h1').html('Locais de Reserva');
                        $('#btn-consultar-reserva-local').click();
                        
                        if (!$('[name="id_reserva_local"]').val()) {
                            //mensagem
                            return message('success', json.msg);
                        } else {
                            //mensagem
                            return message('success', 'Edição realizada com sucesso.');
                        }
                    } else {
                        //mensagem
                        return message('success', json.msg);
                        return false;
                    }
                    
                }
            });
        });
</script>