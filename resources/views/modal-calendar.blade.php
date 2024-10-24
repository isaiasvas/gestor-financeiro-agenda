<style>
    .modal {
        overflow: hidden;
        margin: auto;
    }


    .modal-header {
        height: 30px;
        padding: 20px;
        background-color: #f1f3f4;
        color: white;
    }

    .modal-header a {
        color: white;
        margin-top: -10px;
    }


    .modal-header .close {
        margin-top: -10px;
        color: #fff;
    }

    .modal-body {
        color: #888;
        padding: 5px 35px 20px;
    }

    .modal-body h3 {
        text-align: center;
    }

    .modal-body #title {
        color: #3c4043;
        font-size: 22px;
        border: 0;
        border-bottom: 1px solid grey;
        transition: all 1s;
    }

    .modal-body #title:focus {
        border-bottom: 2px solid blue;
    }
</style>

<div id="modalCalendar" class="modal fade" role="dialog" aria-labelledby="modalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content " style="max-width:fit-content">
            <div class="modal-header" style="padding: 5px!important; height: fit-content;">
                <h4 id="titleModal" style="padding-left: 5px!important;"> </h4>
                <a data-dismiss="modal" class="cancel" style="margin: 0px!important; align-items: flex-end" aria-hidden="true"><i class="fas fa-times mr-2 text-muted"></i></a>
            </div>
            <div class="modal-body">
                <div class="row">
                    <form id="formEvent">
                        <div class="form-group">
                            <input required type="text" class="form-control" id="title" name="title" placeholder="Adicionar Titulo">
                        </div>
                        <input type="text" name="id" id="id" hidden>
                        <!-- Start Date and Time -->
                        <div class="row" id="color">
                            <div class="col-auto form-group">
                                <button type="button" class="btn btn-block btn-light active" id="B3E1F7" value="#B3E1F7">Evento</button>
                            </div>
                            <div class="col-auto form-group">
                                <button type="button" class="btn btn-block btn-light" id="4285F4" value="#4285F4">Tarefa</button>
                            </div>
                            <div class="col-auto form-group">
                                <button type="button" class="btn btn-block btn-light" id="D81B60" value="#D81B60">Lembrete</button>
                            </div>
                        </div>
                        <div class="d-inline-flex">
                            <div class="form-group" style="margin-right:-10px; max-width:7em">
                                <input type="text" class="form-control" name="startDate" data-toggle="datepicker">
                            </div>
                            <div class="form-group ">
                                <select name="startTime" class="form-control">
                                    <option value="AllDay" hidden>--</option>
                                    @for($i=0; $i<=24; $i++) @if($i <=9 ) <option value="0{{$i}}:00" selected>
                                        0{{$i}}:00 </option>
                                        <option value="0{{$i}}:15"> 0{{$i}}:15</option>
                                        <option value="0{{$i}}:30"> 0{{$i}}:30</option>
                                        @else
                                        <option value="{{$i}}:00"> {{$i}}:00 </option>
                                        @if ($i != 24)
                                        <option value="{{$i}}:15"> {{$i}}:15</option>
                                        <option value="{{$i}}:30"> {{$i}}:30</option>
                                        @endif
                                        @endif
                                        @endfor
                                </select>
                            </div>
                            <div id="linesl" style="font-size:20px; margin-top:-4px;margin-left:0.8em">__</div>
                            <div class="form-group ">
                                <select name="endTime" class="form-control">
                                    <option value="AllDay" hidden>--</option>
                                    @for($i=0; $i<=24; $i++) @if($i <=9 ) <option value="0{{$i}}:00" selected>
                                        0{{$i}}:00 </option>
                                        <option value="0{{$i}}:15"> 0{{$i}}:15</option>
                                        <option value="0{{$i}}:30"> 0{{$i}}:30</option>
                                        @else
                                        <option value="{{$i}}:00"> {{$i}}:00 </option>
                                        @if ($i != 24)
                                        <option value="{{$i}}:15"> {{$i}}:15</option>
                                        <option value="{{$i}}:30"> {{$i}}:30</option>
                                        @endif
                                        @endif
                                        @endfor
                                </select>
                            </div>
                            <div class="form-group" style="margin-right:-10px; max-width:7em">
                                <input type="text" class="form-control" name="endDate" data-toggle="datepicker">
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="form-check">
                                <input class="form-check-input" id="diaInteiro" type="checkbox" checked>
                                <label class="form-check-label" for="diaInteiro">Dia inteiro</label>
                            </div>
                        </div>
                        <div class="form-group " style="max-width:fit-content">
                            <select name="recurrence" class="form-control" id="recurrence">
                                @foreach(App\Models\Event::RECURRENCE_RADIO as $key => $label)
                                <option value="{{ $key }}">{{ $label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição</label>
                            <textarea class="form-control" id="description" name="description" placeholder="Descrição"> </textarea>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-app bg-info cancel" data-dismiss="modal">Cancelar</button>
                <button id="delete" type="button" class="btn btn-app bg-gradient-danger deleteEvent">Deletar</button>
                <button id="loadpage" type="button" class="btn btn-app bg-gradient-success saveEvent">Salvar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

@push('js')
<script>
    $(function() {

        let ends = $("select[name='endTime'], input[name='endDate'], #linesl");
        $("#B3E1F7, #4285F4, #D81B60").on('click', function() {
            let startDate = moment($("#modalCalendar input[name='startDate']").datepicker('getDate', true),
                'DD/MM/YYYY').format('DD/MM/YYYY');
            let endDate = moment($("#modalCalendar input[name='endDate']").datepicker('getDate', true),
                'DD/MM/YYYY').format('DD/MM/YYYY');
            $("#B3E1F7, #4285F4, #D81B60").removeClass('active');
            $(this).addClass('active');


            if ($(this).val() == '#B3E1F7' && $("#diaInteiro").prop('checked')) {
                $("select[name='startTime']").val('00:00').fadeOut();
                $("select[name='endTime']").val('00:00').fadeOut();
                $("#modalCalendar input[name='endDate']").fadeIn();
                $("#linesl").fadeIn();
            } else if ($(this).val() == '#B3E1F7' && !$("#diaInteiro").prop('checked')) {
                $("select[name='startTime']").val('00:00').fadeIn();
                $("select[name='endTime']").val('00:00').fadeIn();
                $("#modalCalendar input[name='endDate']").fadeIn();
                $("#linesl").fadeIn();
            }
            if (($(this).val() == '#4285F4' || $(this).val() == '#D81B60') && $("#diaInteiro").prop(
                    'checked')) {
                $("select[name='startTime']").val('00:00').fadeOut();
                $("select[name='endTime']").val('00:00').fadeOut();
                $("#modalCalendar input[name='endDate']").fadeOut();
                $("#linesl").fadeOut();
            } else if (($(this).val() == '#4285F4' || $(this).val() == '#D81B60') && !$("#diaInteiro").prop(
                    'checked')) {
                $("select[name='startTime']").val('00:00').fadeIn();
                $("select[name='endTime']").val('00:00').fadeOut();
                $("#modalCalendar input[name='endDate']").fadeOut();
                $("#linesl").fadeOut();
            }
        });

        $('[data-toggle="datepicker"]').datepicker({
            autoHide: true,
            zIndex: 2048,
            format: 'dd/mm/yyyy',
            language: 'pt-BR',
        });

        $(".cancel").on('click', function() {
            $("#modalCalendar").modal('toggle')
        });


        $("#diaInteiro").change(function() {
            let startDate = moment($("#modalCalendar input[name='startDate']").datepicker('getDate', true),
                'DD/MM/YYYY').format('DD/MM/YYYY');
            let endDate = moment($("#modalCalendar input[name='endDate']").datepicker('getDate', true),
                'DD/MM/YYYY').format('DD/MM/YYYY');
            let activeMode = $("#B3E1F7.active, #4285F4.active, #D81B60.active").val();
            let allDay = $("#diaInteiro").prop('checked');

            if (activeMode == '#B3E1F7' && allDay) {
                $("select[name='startTime']").val('00:00').fadeOut();
                $("select[name='endTime']").val('00:00').fadeOut();
                
                $("#modalCalendar input[name='endDate']").fadeIn();
                if (startDate == endDate) {
                    $("#modalCalendar input[name='endDate']").datepicker('setDate', moment(endDate,
                        'DD/MM/YYYY').add(1, 'days').format('DD/MM/YYYY'));
                }
            } else if (activeMode == '#B3E1F7' && !allDay) {
                $("select[name='startTime']").val('00:00').fadeIn();
                $("select[name='endTime']").val('00:00').fadeIn();
                $("#modalCalendar input[name='endDate']").fadeIn();
                if (startDate == endDate) {
                    $("#modalCalendar input[name='endDate']").datepicker('setDate', moment(endDate,
                        'DD/MM/YYYY').add(1, 'days').format('DD/MM/YYYY'));
                }
                if (moment(endDate, 'DD/MM/YYYY').diff(moment(startDate, 'DD/MM/YYYY'), 'days') == 1) {
                    $("#modalCalendar input[name='endDate']").datepicker('setDate', moment(endDate,
                        'DD/MM/YYYY').subtract(1, 'days').format('DD/MM/YYYY'));
                }
            }

            if ((activeMode == '#4285F4' || activeMode == '#D81B60') && allDay) {
                $("select[name='startTime']").val('00:00').fadeOut();
                $("select[name='endTime']").val('00:00').fadeOut();
                
                $("#modalCalendar input[name='endDate']").datepicker('setDate', moment(startDate,
                    'DD/MM/YYYY').add(1, 'days').format('DD/MM/YYYY')).fadeOut();
            } else if ((activeMode == '#4285F4' || activeMode == '#D81B60') && !allDay) {
                $("#modalCalendar input[name='endDate']").datepicker('setDate', moment(startDate,
                    'DD/MM/YYYY').add(1, 'days').format('DD/MM/YYYY')).fadeOut();
                $("select[name='startTime']").val('00:00').fadeIn();
                $("select[name='endTime']").val('00:00').fadeOut();
                $("#linesl").fadeOut();
                if (startDate == endDate) {
                    $("#modalCalendar input[name='endDate']").datepicker('setDate', moment(endDate,
                        'DD/MM/YYYY').add(1, 'days').format('DD/MM/YYYY'));
                }
                if (moment(endDate, 'DD/MM/YYYY').diff(moment(startDate, 'DD/MM/YYYY'), 'days') == 1) {
                    $("#modalCalendar input[name='endDate']").datepicker('setDate', moment(endDate,
                        'DD/MM/YYYY').subtract(1, 'days').format('DD/MM/YYYY'));
                }
            }
        });
    })
</script>
@endpush