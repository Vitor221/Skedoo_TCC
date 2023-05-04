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
<link rel="stylesheet" href="{{ asset('css/estilo_desenvolvimento.css') }}">
@endsection

@section('voltar')
<x-button-back href="{{route('instituicao')}}" icon="uil uil-estate"/>
@endsection

@section('content')

<div class="container mt-5" style="max-width: 700px">
    <h2 class="h2 text-center mb-5 border-bottom pb-3">Laravel FullCalender CRUD Events Example</h2>
    <div id='calendar'></div>
</div>

<script>
    $(document).ready(function() {
        var SITEURL = "{{ url('/') }}"

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: SITEURL + "/instituicao/calendario",
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
                var title = prompt('Event Title:');
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

            eventDrop: function(event, delta) {
                var start_event = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var end_event = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                
                $.ajax({
                    url: SITEURL + '/instituicao/calendario',
                    data: {
                        title: event.title,
                        start: start_event,
                        end: end_event,
                        type: 'edit'
                    },
                    type: "POST",
                    success: function(response) {
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
