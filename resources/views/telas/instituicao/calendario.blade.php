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
        <span id="titleError" class="text-danger"></span>
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
            select: function(start, end, allDay) {
                $('#calendarioModal').modal('toggle');

                $('#saveBtn').click(function() {
                    var title = $('#title').val();
                    var start_event = moment(start).format('YYYY-MM-DD');
                    var end_event = moment(end).format('YYYY-MM-DD');

                    $.ajax({
                        url: "{{ route('instituicao.calendario.store') }}",
                        type: "POST",
                        dataType: 'json',
                        data: {
                            title,
                            start_event,
                            end_event
                        },
                        success: function(response) {
                            $('#calendarioModal').modal('hide');
                            $('#calendar').fullCalendar('renderEvent', {
                                'title': response.title,
                                'start' : response.start_event,
                                'end'   : response.end_event
                            });
                            displayMessage("Evento criado!");
                        },
                        error: function(error) {
                            if(error.responseJSON.errors) {
                                $('#titleError').html(error.responseJSON.errors.title);
                            }
                        }
                    })
                });
            },

            editable: true,

            eventDrop: function(event) {
                var id = event.id;
                var start_event = moment(event.start).format('YYYY-MM-DD');
                var end_event = moment(event.end).format('YYYY-MM-DD');

                $.ajax({
                    url: "{{ route('instituicao.calendario.update', '') }}" + '/' + id,
                    type: "PATCH",
                    dataType: 'json',
                    data: {
                        start_event,
                        end_event
                    },
                    success: function(response) {
                        displayMessage("Evento atualizado!");
                    },
                    error: function(error)
                    {
                        console.log(error)
                    },
                });
            },

            eventClick: function(event) {
                var id = event.id;

                if(confirm('Are you sure want to remove it?')) {
                    $.ajax({
                        url: "{{ route('instituicao.calendario.delete', '') }}" + '/' + id,
                        type: "DELETE",
                        dataType: 'json',
                        success: function(response) 
                        {
                            $('#calendar').fullCalendar('removeEvents', response);
                            displayMessage("Evento Deletado!");
                        },
                        error: function(error)
                        {
                            console.log(error)
                        },
                    });
                }
            }
            

        });
        
        function displayMessage(message) {
            toastr.success(message, 'Event');
        }
        
    })
</script>

@endsection
