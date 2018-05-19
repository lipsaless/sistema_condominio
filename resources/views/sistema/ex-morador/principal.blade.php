@extends('sistema.sistema')

@section('view-principal')

<!-- Title -->
<h1 class="text-center">Ex - Moradores</h1>
    <!-- Principal -->
    <div id="principal-ex-morador">
        <!-- Form -->
        <form id="principal-ex-morador-consultar" action="{{ route('ex-morador-grid') }}" method="POST" style="display: none;">
            <div class="row">
                <div class="col-md-3">
                    <label for="no_apartamento" class="font-weight-bold">Apartamento:</label>
                    <select id="no_apartamento" class="custom-select">
                            <option value="">Selecione</option>
                        <?php foreach ($apartamentos as $apt): ?>
                            <option value="<?php echo $apt->id_apartamento; ?>"><?php echo $apt->no_apartamento; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="no_morador" class="font-weight-bold">Morador:</label>
                    <input type="text" id="no_morador" class="form-control" name="no_morador">
                </div>
                <div class="col-md-3">
                    <label for="no_bloco" class="font-weight-bold">Bloco:</label>
                    <select id="no_bloco" class="custom-select">
                        <option value="">Selecione</option>
                        <?php foreach ($blocos as $bloco): ?>
                            <option value="<?php echo $bloco->id_bloco; ?>"><?php echo $bloco->no_bloco; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <div>&nbsp;</div>
                    <button id="btn-consultar-ex-morador" type="submit" class="ui black button">Consultar</button>
                </div>
            </div>
        </form>
        <hr>
        <!-- Grid -->
        <div id="grid-ex-moradores"></div>
    </div>

<script>
    $(document).ready(function(){
        $(document).tooltip();

        //START AJAX E STOP AJAX
        ajax();

        /*Excluir*/
        $(document).on('click','.ex-morador-realocar',function(e){

            /*Message*/
            Command: toastr["success"]("Morador realocado!")
            toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-center",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }

            e.preventDefault();
            $.ajax({
                type: "GET",
                url: '{{ route("ex-morador-recuperar") }}' + '/' + $(this).attr("data-action"),
                data: $(this).serialize()
            }).done(function() {
                $('#btn-consultar-ex-morador').unbind('click').click();
            });
        });

        const titulo = document.querySelector('h1');
        typeWriter(titulo);

        /*Consultar*/
        $('#principal-ex-morador-consultar').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: "json"
            }).done(function(data){
                
                text = '';

                    text += '	<table id="info-ex-moradores" class="ui table">';
                    text += '   	<thead>';
                    text += '       	<tr>';
                    text += '            	<th><span><i class="fas fa-user"></i> Morador</span></th>';
                    text += '            	<th><span><i class="fas fa-building"></i> Apartamento/Bloco</span></th>';
                    text += '            	<th><span>Tipo</span></th>';
                    text += '            	<th>&nbsp;</th>';
                    text += '			</tr>';
                    text += '		</thead>';
                    text += '		<tbody>';

                        $.each(data, function(key, rs) {
                            text += '           <tr id="'+rs.id_morador+'">';
                            text += '               <td>'+ rs.no_morador+'</td>';
                            text += '               <td><a class="ui blue label">'+rs.no_apartamento+'</a></td>';
                            text += '               <td style="font-weight: bold;">'+rs.no_morador_tipo+'</td>';
                            text += '               <td style="text-align: center;">';
                            text += '                   <button id="ex-morador-dados" class="ui blue button ex-morador-dados" data-action="'+rs.id_morador+'" style="text-align: center;" data-html="Clique para editar"><i class="fas fa-search"></i>  Dados</button>';
                            text += '                   <button id="ex-morador-recuperar" class="ui red button ex-morador-realocar tooltip" data-action="'+rs.id_morador+'" title="Realocar morador" style="text-align: center;"><i class="fas fa-undo"></i></button>';
                            text += '               </td>';
                            text += '           </tr>'
                        });
                    
                    text += '       </tbody>';
                    text += '    </table>';

                /*Grid*/
                $('#grid-ex-moradores').html(text);

                /*Data-Table*/
                $('#info-ex-moradores').DataTable({
                    /*Tradução*/
                    "language": {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "_MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Nome ou Apartamento",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        }
                    }
                });

                /*Edit*/
                $('.ex-morador-dados').unbind('click').click(function(e){
                    $('.ui.modal').modal('show');
                });

                /*Excluir*/
                $('.ex-morador-recuperar').unbind('click').click(function(e){

                    /*Message*/
                    Command: toastr["success"]("Morador recuperado!")
                    toastr.options = {
                    "closeButton": true,
                    "debug": false,
                    "newestOnTop": false,
                    "progressBar": true,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                    }

                    e.preventDefault();
                    $.ajax({
                        type: "GET",
                        url: '{{ route("ex-morador-recuperar") }}' + '/' + $(this).attr("data-action"),
                        data: $(this).serialize()
                    }).done(function() {
                        $('#btn-consultar-ex-morador').unbind('click').click();
                    });
                });
            });
        });
        /*Submit consult*/
        $('#btn-consultar-ex-morador').unbind('click').click();
    });
</script>
@stop