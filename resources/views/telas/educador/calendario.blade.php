@extends('layouts.telas', ['title'=>'Skedoo - Calendário'], ['nometela' => 'Calendário'])

@section('links-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/pt-br.js"></script>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_educador.css') }}">
<link rel="stylesheet" href="{{ asset('css/estilo_calendario.css') }}">
@endsection

@section('voltar')
<x-button-back href="{{route('educador')}}" icon="uil uil-estate"/>
@endsection

@section('content')
<div class="container mt-5" style="max-width: 700px">
    <h2 class="h2 text-center mb-5 border-bottom pb-3">Calendário</h2>
    <div id="calendar"></div>
</div>

<script>
    $(document).ready(function() {
        var evento = @json($eventos);
        
        var calendar = $('#calendar').fullCalendar({
            locale: 'pt-br',
            editable: false,
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay',
            },
            events: evento,
            editable: false,
            eventRender: function(event, element,view) {
                if(event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
        });
    })
</script>
@endsection
