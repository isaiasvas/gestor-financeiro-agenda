@extends('layouts.app')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper bg-white">
    <!-- Content Header (Page header) -->
    <section class="content">

        <div class="sticky-top mb-0" style="display:none">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Eventos</h4>
                </div>
                <div class="card-body">
                    <div id="external-events">
                        <div class="checkbox">
                            <label for="drop-remove">
                                <input type="checkbox" id="drop-remove">
                                Remover ao inserir
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- THE CALENDAR -->
        <div style="" id="calendar" data-route-load-events="{{ route ('routeLoadEvents')}}" data-route-event-delete="{{route('routeEventDelete')}}" data-route-event-store="{{ route('routeEventStore') }}" data-route-event-update="{{ route('routeEventUpdate') }}"></div>

    </section>
</div>
@include('modal-calendar')
@endsection

@push('js')
<script>

</script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/tooltip.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar/main.js') }}"></script>
<script src="{{ asset('js/fullcalendar/locales-all.min.js') }}"></script>
<script>
    let objCalendar;
</script>
<script src="{{ asset('js/fullcalendar/script.js') }}"></script>
<script src="{{ asset('js/fullcalendar/calendar.js') }}"></script>
<script src="{{ asset('js/fullcalendar/rrule.min.js') }}"></script>
<script src="{{ asset('js/fullcalendar/rrule-tz.min.js') }}"></script>
@endpush