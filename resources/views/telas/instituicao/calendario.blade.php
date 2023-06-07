@extends('layouts.telas', ['title' => 'Skedoo - Calendário'], ['nometela' => 'Calendário'])

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/lang/pt-br.js"></script>
@endsection

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/logins/estilo_instituicao.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo_calendario.css') }}">
@endsection

@section('backgrounds')
<div class="background"></div>

@endsection

@section('voltar')
    <x-button-back href="{{ route('instituicao') }}" icon="uil uil-estate" />
@endsection

@section('nav-telas')
<div class="nav">
    <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>
    <div class="perfil-bg">
        <h3>
            Bem-vindo, {{ session('login')['nm_login'] }}
            <a href="{{ route('instituicao.perfil') }}">
                @if($login->img_perfil)
                    <img name="image" class="img-perfil" class="img-personalizado" src="{{ url('storage/' . $login->img_perfil) }}" alt="">
                @else
                    <img name="image" class="img-perfil" src="https://i.stack.imgur.com/Bzcs0.png" alt="">
                @endif
            </a>
        </h3>
    </div>
</div>
@endsection

@section('content')
    <div class="modal fade" id="calendarioModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Adicionar Evento</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" id="title" autocomplete="off">
                    <span id="titleError" class="text-danger"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <a href="{{ route('instituicao.calendario') }}"><button type="button" id="saveBtn" class="btn btn-primary">Salvar</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="calendarioDeleteModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 id="modal-title"></h5>
            </div>
            <div id="modal-body">
              <p></p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btnModalClose" data-bs-dismiss="modal">Close</button>
              <a href="{{ route('instituicao.calendario') }}"><button type="button" id="deleteBtn" class="btnModalDelete">Deletar evento</button></a>
            </div>
          </div>
        </div>
      </div>


    <div class="area-calendario">
        <div id='calendar'></div>
    </div>

    <script>
        $(document).ready(function() {
    var SITEURL = "{{ url('/') }}";
    var evento = @json($eventos);

    // Definir as traduções personalizadas para os botões
    var customTranslations = {
        ptBr: {
            prev: " < ",
            next: ' > ',
            today: 'Hoje',
        }
    };

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var calendar = $('#calendar').fullCalendar({
        locale: 'pt-br',
        editable: true,
        header: {
            left: 'prev, next today',
            center: 'title',
            right: ''
        },
        buttonIcons: false,
        buttonText: customTranslations.ptBr,
        events: evento,
        eventColor: '#76bcb5',
        displayEventTime: true,
        editable: true,
        columnFormat: 'ddd',
        eventRender: function(event, element, view) {
            if (event.allDay === 'true') {
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
                                    'start': response.start_event,
                                    'end': response.end_event
                                });
                                displayMessage("Evento criado! Atualize a página");
                            },
                            error: function(error) {
                                if (error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors
                                        .title);
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
                            displayMessage("Evento atualizado! Atualize a página");
                        },
                        error: function(error) {
                            console.log(error)
                        },
                    });
                },

                eventClick: function(event) {
                    $('#calendarioDeleteModal').modal('toggle');
                    var id = event.id;
                    var title = event.title;
                    var start = event.start.format('DD/MM/YYYY');
                    var end = event.end.format('DD/MM/YYYY');

                    $('#modal-title').text(title);
                    $('#modal-body').html('<strong>Data de início:</strong> ' + start + '<br><br> <strong>Data de término:</strong> ' + end);

                    $('#deleteBtn').click(function() {
                        $.ajax({
                            url: "{{ route('instituicao.calendario.delete', '') }}" + '/' + id,
                            type: "DELETE",
                            dataType: 'json',
                            success: function(response) {
                                $('#calendar').fullCalendar('removeEvents', response);
                                displayMessage("Evento Deletado! Atualize a página!");
                            },
                            error: function(error) {
                                console.log(error)
                            },
                        })

                        $('#calendarioDeleteModal').modal('hide');
                    });
                }
            });

            $("#calendarioModal").on("hidden.bs.modal", function() {
                $('#saveBtn').unbind();
            });

            function displayMessage(message) {
                toastr.success(message, 'Event');
            };

        })
    </script>
    <script src="{{asset ('js/configCalendario.js')}}"></script>
@endsection
