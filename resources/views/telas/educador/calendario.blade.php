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

@section('nav-telas')
<div class="nav">
    <img id="logo-skedoo" src="{{ asset('../img/Skedoo.png') }}" alt="">
    <h4 id="data-atual">{{ \Carbon\Carbon::now(new DateTimeZone('America/Sao_Paulo'))->format('d/m/Y') }}</h4>
    <div class="perfil-bg">
        <h3>
            Bem-vindo, {{ session('login')['nm_login'] }}
            <a href="{{ route('educador.perfil') }}">
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
<div class="area-calendario">
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
                right: '',
            },
            buttonText: {
                today: "Hoje",
            },
            eventColor: '#ecab54',
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
