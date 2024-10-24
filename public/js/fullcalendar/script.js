$(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".saveEvent").on('click', function () {
        let id = $('#modalCalendar input[name="id"]').val();
        let title = $('#modalCalendar input[name="title"]').val();
        let description = $('#modalCalendar textarea[name="description"]').val();
        let recurrence = $('#modalCalendar select[name="recurrence"] option:selected').val();
        let startDate = $("#modalCalendar input[name='startDate']").datepicker('getDate', true);
        let startTime = $("#modalCalendar select[name='startTime'] option:selected").val();
        let endDate = $("#modalCalendar input[name='endDate']").datepicker('getDate', true);
        let endTime = $("#modalCalendar select[name='endTime'] option:selected").val();
        let color = $("#modalCalendar #color button.active").val();
        if ((color == '#4285F4' || color == '#D81B60') && $("#diaInteiro").prop('checked')) {
            endDate = moment(startDate, 'DD/MM/YYYY').add(1, 'days').format('DD/MM/YYYY');
            endTime = '00:00';
        } else if ((color == '#4285F4' || color == '#D81B60') && !$("#diaInteiro").prop('checked')) {
            endDate = startDate;
            endTime = moment(startTime, 'HH:mm').add(30, 'minutes').format('HH:mm');
        }

        let start = moment(startDate + ' ' + startTime, 'DD/MM/YYYY HH:mm').format('YYYY-MM-DD HH:mm:ss');
        let end = moment(endDate + ' ' + endTime, 'DD/MM/YYYY HH:mm').format('YYYY-MM-DD HH:mm:ss');

       
        let Event = {
            title: title,
            start: start,
            end: end,
            recurrence: recurrence,
            description: description,
            color: color,
        };

        let route;
        if (id == '') {
            route = routeEvents('routeEventStore');
            Event._method = 'POST';
        } else {
            route = routeEvents('routeEventUpdate');
            Event.id = id;
            Event._method = 'PUT';
        }

        sendEvent(route, Event);

    });

    $(".deleteEvent").on('click', function () {

        let id = $('#modalCalendar input[name="id"]').val();

        let Event = {
            _method: 'DELETE',
            id: id
        };

        let route = routeEvents('routeEventDelete')

        sendEvent(route, Event)

    });
});

function routeEvents(route) {
    return document.getElementById('calendar').dataset[route];
}

function sendEvent(route, data_) {
    $.ajax({
        url: route,
        data: data_,
        method: 'POST',
        dataType: 'json',
        success: function (json) {
            if (json.status) {
                objCalendar.refetchEvents();
                $("#modalCalendar").modal('hide');
                toastr.success(json.message, 'Sucesso', { timeOut: 2000 })
            }
        },
        error: function (json) {
            let responseJson = json.responseJSON.errors;
            loadErrors(responseJson);
        }
    });
};


function loadErrors(response) {


    let errors = '';

    for (let fields in response) {
        console.log(response[fields]);
        errors += `${response[fields]}</br>`;
    }


    toastr.error(errors, 'Erro', { timeOut: 5000 })
}

function resetForm(form) {
    $(form)[0].reset();
}