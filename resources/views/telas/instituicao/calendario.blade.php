@extends('layouts.telas', ['title'=>'Skedoo - Calendário'], ['nometela' => 'Calendário'])

@section('meta')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('links-scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
@endsection

@section('voltar')
<x-button-back href="{{route('instituicao')}}" icon="uil uil-estate"/>
@endsection

@section('content')

<div class="modal fade" id="calendarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <input type="text" class="form-control" id="title">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" id="saveBtn" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<div class="container mt-5" style="max-width: 700px">
    <h2 class="h2 text-center mb-5 border-bottom pb-3">Calendário</h2>
    <div id='calendar'></div>
</div>

<script>
    $(document).ready(function() {
        var SITEURL = "{{ url('/') }}";
        var evento = @json($eventos);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            header: {
                left: 'prev, next today',
                center: 'title',
                right: 'month, agendaWeek, agendaDay'
            },
            events: evento,
            displayEventTime: true,
            editable: true,
            eventRender: function(event, element, view) {
                if(event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function(start_event, end_event, allDay) {
                $('#calendarioModal').modal('toggle');
                if(title) {
                    var start_event = $.fullCalendar.formatDate(start_event, "Y-MM-DD");
                    var end_event = $.fullCalendar.formatDate(end_event, "Y-MM-DD");

                    $.ajax({
                        url: SITEURL + "/instituicao/calendario",
                        data: {
                            title: title,
                            start_event: start_event,
                            end_event: end_event,
                            type: 'add'
                        },
                        type: "POST",
                        success: function(data) {
                            displayMessage("Event Created Successfully");

                            calendar.fullCalendar('renderEvent', {
                                id: data.id,
                                title: title,
                                start: start_event,
                                end: end_event,
                                allDay: allDay
                            }, true);
                            console.log(data);

                            calendar.fullCalendar('unselect');
                        },
                        error: function(error){
                            console.log(error)
                        }
                    });
                }
            },
            editable: true,
            eventDrop: function(event, delta) {
                var start_event = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var end_event = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                var title = event.title;
                var id = event.id;

                $.ajax({
                    url: SITEURL + '/instituicao/calendario',
                    data: {
                        title: title,
                        start: start_event,
                        end: end_event,
                        id: id,
                        type: 'edit',
                    },
                    type: "POST",
                    success: function(response) {
                        calendar.fullCalendar('refetchEvents')
                        displayMessage("Event updated");
                    }
                });
            },

            eventClick: function(event) {
                var eventDelete = confirm("Você tem certeza?");
                if(eventDelete) {
                    $.ajax({
                        type:"POST",
                        url: SITEURL + '/instituicao/calendario',
                        data: {
                            id: event.id,
                            type: 'delete'
                        },
                        success: function(response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Event removed");
                        }
                    })
                }
            }

        });
        
        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
        
    })
</script>

@endsection
