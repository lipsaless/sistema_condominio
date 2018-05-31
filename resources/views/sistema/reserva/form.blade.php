<?php 
    if ($obj->dt_reserva) {
        $dataReserva = date('d/m/Y', strtotime($obj->dt_reserva));
    } else {
        $dataReserva = '';
    }
?>

<!-- Form -->
<form id="form-reserva" action="{{ route('reserva-gravar') }}" method="POST">
    <h2 class="text-center">Cadastro de Reserva</h2>
    <hr>
    <div class="row">
        <div class="ui input col-md-3">
            <label for="no_apartamento" class="font-weight-bold">Apartamento: *</label>
            <input type="text" id="no_apartamento" value="{{ $obj->no_apartamento }}">
            <?php echo App\Helpers\Html::listaApt(); ?>
        </div>
        <div class="ui input col-md-3">
            <label for="id_morador" class="font-weight-bold">Morador: *</label>
            <select name="id_morador" id="id_morador" class="form-control">
                <?php if (!empty($listaMoradores)): ?>
                <?php foreach ($listaMoradores as $value): ?>
                <option value="">Selecione</option>
                <?php $selecionado = ($value->id_morador == $obj->id_morador) ? 'selected' : '' ?>
                    <option value="<?php echo $value->id_morador; ?>" <?php echo $selecionado; ?>><?php echo $value->no_morador; ?></option>
                <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </div>
        <div class="ui input col-md-3">
            <label for="no_morador" class="font-weight-bold">Local de reserva: *</label>
            <select name="id_reserva_local" id="id_reserva_local" class="form-control">
                <option value="">Selecione</option>
                <?php foreach ($locaisDeReserva as $local): ?>
                <option value="<?php echo $local->id_reserva_local; ?>"><?php echo $local->no_reserva_local; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="ui input col-md-3">
            <label for="dt_reserva" class="font-weight-bold">Data da reserva: *</label>
            <input type="text" id="dt_reserva" name="dt_reserva">
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
    $(document).ready(function() {
         //Lista apt's
         carregarListaApt();

        //Mask
        $("#dt_reserva").mask('99/99/9999');
         $("#dt_reserva").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
            dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
            dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
            monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
            monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
            nextText: 'Próximo',
            prevText: 'Anterior'
        });
    });

     //FORMULÁRIO => salvar
     $('#form-reserva').unbind('submit').submit(function(e){
            e.preventDefault();

            let apartamento = $('#no_apartamento').val();
            let nomeMorador = $('#id_morador').val();
            let espacoReserva = $('#id_reserva_local').val();
            let dtReserva = $('#dt_reserva').val();

            //VALIDAÇÃO => apartamento
            if (!apartamento) {
                return message('error', 'Apartamento não foi informado!');
                return false;
            }

            //VALIDAÇÃO => nome morador
            if (!nomeMorador) {
                return message('error', 'Morador não foi informado!');
                return false;
            }

            //VALIDAÇÃO => tipo do morador
            if (!espacoReserva) {
                return message('error', 'Espaço de reserva não foi informado!');
                return false;
            }

            //VALIDAÇÃO => data de nascimento
            if (!dtReserva) {
                return message('error', 'Data da reserva não foi informada!');
                return false;
            }

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                success: function(formHtml) {
                    $('#form-reserva').hide();
                    $('#btn-option-back-reserva').hide();
                    $('#btn-option-new-reserva').show();
                    $('#form-visitante').hide();
                    $('#grid-reservas').show();
                    $('h1').html('Reservas');
                    $('#btn-consultar-reserva').click();

                    //mensagem
                    return message('success', 'Cadastro efetuado com sucesso!');
                }
            });
        });
</script>