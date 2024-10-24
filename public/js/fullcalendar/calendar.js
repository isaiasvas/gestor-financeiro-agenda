$(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
        ele.each(function () {

            // create an Event Object (https://fullcalendar.io/docs/event-object)
            // it doesn't need to have a start or end
            var eventObject = {
                title: $.trim($(this).text()) // use the element's text as the event title
            }

            // store the Event Object in the DOM element so we can get to it later
            $(this).data('eventObject', eventObject)

            // make the event draggable using jQuery UI

        })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendar.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function (eventEl) {
            return {
                title: eventEl.innerText,
                backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
                textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
            };
        }
    });

    var calendar = new Calendar(calendarEl, {
        headerToolbar: {
            left: 'prev,next today',
            center:'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        //Random default events
        contentHeight: 600,
        dayMaxEventRows: true,
        navLinks: true,
        editable: true,
        selectable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function (info) {
            // is the "remove after drop" checkbox checked?
            if (checkbox.checked) {
                // if so, remove the element from the "Draggable Events" list
                info.draggedEl.parentNode.removeChild(info.draggedEl);
            }
        },
        locale: 'pt-br',

        eventDrop: function (element) {
            
            let id = element.event.id;
            let start;
            let end;
        
            if(element.event.allDay){
                 start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
                 end = moment(element.event.start).add(1,'days').format('YYYY-MM-DD HH:mm:ss')
            }else if(!element.event.allDay && element.event.end == null) {
                start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
                 end = moment(element.event.start).add(30,'minutes').format('YYYY-MM-DD HH:mm:ss')
            }
            else{
                start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");
                end = moment(element.event.end).format('YYYY-MM-DD HH:mm:ss')
            }
            
            let newEvent = {
                _method: 'PUT',
                id: id,
                start: start,
                end: end,
            };
           
            sendEvent(routeEvents('routeEventUpdate'), newEvent);
        },
        eventClick: function (element) {
            $('#modalCalendar').modal('toggle')
            
            $("#modalCalendar button[id='delete']").css('display', 'block');

            resetForm('#formEvent');

            let id = element.event.id;
            $('#modalCalendar input[name="id"]').val(id);

            let title = element.event.title;
            $('#modalCalendar input[name="title"]').val(title);

            let description = element.event.extendedProps.description;
            $('#modalCalendar textarea[name="description"]').val(description);

            let recurrence = element.event.extendedProps.recurrence;
            $('#modalCalendar select[name="recurrence"]').val(recurrence);

            let startDate = moment(element.event.start).format('DD/MM/YYYY');
            $("#modalCalendar input[name='startDate']").datepicker('setDate', startDate);

            let startTime = moment(element.event.start).format('HH:mm');
            $("#modalCalendar select[name='startTime']").val(startTime);

            let endDate = moment(element.event.end).format('DD/MM/YYYY');
            $("#modalCalendar input[name='endDate']").datepicker('setDate', endDate);

            let endTime = moment(element.event.end).format('HH:mm');
            $("#modalCalendar select[name='endTime']").val(endTime);

            let allDay = element.event.allDay;
            allDay ? $("#diaInteiro").prop('checked', true) : $("#diaInteiro").prop('checked', false);

            let startEnd = $("select[name='startTime'], select[name='endTime']");
            $("#diaInteiro").prop('checked') ? startEnd.hide() : startEnd.show();
            
            let color = element.event.backgroundColor;
            $("#B3E1F7, #4285F4, #D81B60").removeClass('active')
            color == '#B3E1F7' ? $("#B3E1F7").addClass('active') : (color == '#4285F4'? $("#4285F4").addClass('active') :  $("#D81B60").addClass('active') )
        },
        eventResize: function (element) {
            let id = element.event.id;

            let start = moment(element.event.start).format("YYYY-MM-DD HH:mm:ss");

            let end = moment(element.event.end).format("YYYY-MM-DD HH:mm:ss");

            let title = element.event.title;

            let description = element.event.extendedProps.description;

            let newEvent = {
                _method: 'PUT',
                id: id,
                start: start,
                title: title,
                description: description,
                end: end,
            };

            sendEvent(routeEvents('routeEventUpdate'), newEvent);

        },
        select: function (element) {
            
            $('#modalCalendar').modal('toggle')

            $("#modalCalendar button[id='delete']").css('display', 'none');

            resetForm('#formEvent');

            let startDate = moment(element.start).format('DD/MM/YYYY');
            $("#modalCalendar input[name='startDate']").datepicker('setDate', startDate);

            let startTime = moment(element.start).format('HH:mm');
            $("#modalCalendar select[name='startTime']").val(startTime);

            let endDate = moment(element.end).format('DD/MM/YYYY');
            $("#modalCalendar input[name='endDate']").datepicker('setDate', endDate);

            let endTime = moment(element.end).format('HH:mm');
            $("#modalCalendar select[name='endTime']").val(endTime);

            let allDay = element.allDay;
            allDay ? $("#diaInteiro").prop('checked', true) : $("#diaInteiro").prop('checked', false);

            let startEnd = $("select[name='startTime'], select[name='endTime']");
            $("#diaInteiro").prop('checked') ? startEnd.hide() : startEnd.show();
           
            calendar.unselect();
        },
        events: routeEvents('routeLoadEvents')
    });
    objCalendar = calendar;
    calendar.render();
    // $('#calendar').fullCalendar()

   
})
