@extends('adminlte::page')

@section('content')
<div class="row">
  <div class="col-md-3" style="display:none;">
    <div class="sticky-top mb-3">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Equipes</h4>
        </div>
        <div class="card-body">
          <!-- the events -->
          <div id="external-events"></div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      
    </div>
  </div>
  <!-- /.col -->
  <div class="col-md-12">
    <div class="card card-primary">
      <div class="card-body p-0">
        <!-- THE CALENDAR -->
        <div id="calendar"></div>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tabela de Horários</h3>

    
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>Colaborador</th>
          <th>Local</th>
          <th>Equipe</th>
          <th>Data/Hora Entrada</th>
          <th>Data/Hora Saída</th>
          <!-- <th>Total Falta</th> -->
        </tr>
      </thead>
      <tbody id="tabelaHorario">

      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<script>
  var elementosEvent = [];
  window.addEventListener('load', function() {
    TabelaHorario();
    MontaEventos();
  });
  function TabelaHorario() {
    $.ajax({
      url: "/listaEscala",
      method: 'GET',
      async: false
    }).done(function(result) {
      html = '';
      $.each(result, function(a, b) {
        html += '<tr>';
        html += '<td>' + b.associadoNome + '</td>';
        html += '<td>' + b.localNome + '</td>';
        html += '<td>' + b.equipeNome + '</td>';
        html += '<td>' + b.entrada + '</td>';
        html += '<td>' + b.saida + '</td>';
        /*if (b.presenca == 1){
          html += '<td>Presença</td>'
        }else if(b.presenca == 0){
          html += '<td>Falta</td>'
        }*/
        html += '</tr>';
      })
      $('#tabelaHorario').html(html);
    });
  }
  function MontaEventos() {
    $.ajax({
      url: "/listaEscala",
      method: 'GET',
    }).done(function(result) {
      $.each(result, function(a, b) {
        console.log(b);
        var montagem = {
          title: b.associadoNome,
          start: new Date(b.entrada),
          end: new Date(b.saida),
          bakcgroundColor: b.cor,
          borderColor: b.cor,
          allDay: false
        }
        elementosEvent.push(montagem)
      })
      MontaCalendario();
    });
  }

  function MontaCalendario() {
    console.warn(elementosEvent);
    $(function() {

      /* initialize the external events
       -----------------------------------------------------------------*/
      function ini_events(ele) {
        ele.each(function() {

          // create an Event Object (https://fullcalendar.io/docs/event-object)
          // it doesn't need to have a start or end
          var eventObject = {
            title: $.trim($(this).text()) // use the element's text as the event title
          }

          // store the Event Object in the DOM element so we can get to it later
          $(this).data('eventObject', eventObject)

          // make the event draggable using jQuery UI
          $(this).draggable({
            zIndex: 1070,
            revert: true, // will cause the event to go back to its
            revertDuration: 0 //  original position after the drag
          })

        })
      }

      ini_events($('#external-events div.external-event'))

      /* initialize the calendar
       -----------------------------------------------------------------*/
      //Date for the calendar events (dummy data)
      var date = new Date()
      var d = date.getDate(),
        m = date.getMonth(),
        y = date.getFullYear()

      var Calendar = FullCalendar.Calendar;
      var Draggable = FullCalendar.Draggable;

      var containerEl = document.getElementById('external-events');
      var checkbox = document.getElementById('drop-remove');
      var calendarEl = document.getElementById('calendar');

      // initialize the external events
      // -----------------------------------------------------------------

      new Draggable(containerEl, {
        itemSelector: '.external-event',
        eventData: function(eventEl) {
          return {
            title: eventEl.innerText,
            backgroundColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            borderColor: window.getComputedStyle(eventEl, null).getPropertyValue('background-color'),
            textColor: window.getComputedStyle(eventEl, null).getPropertyValue('color'),
          };
        }
      });


      var calendar = new Calendar(calendarEl, {
        locale: 'pt-br',
        buttonText: {
          month: 'mês', 
          day: 'dia', 
          week: 'semana',
          today: 'hoje',
        },
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        //Random default events
        events: elementosEvent,
        editable: true,
        droppable: true, // this allows things to be dropped onto the calendar !!!
        drop: function(info) {
          // is the "remove after drop" checkbox checked?
          if (checkbox.checked) {
            // if so, remove the element from the "Draggable Events" list
            info.draggedEl.parentNode.removeChild(info.draggedEl);
          }
        }
      });


      console.warn(calendar.events);
      calendar.render();
      // $('#calendar').fullCalendar()

      /* ADDING EVENTS */
      var currColor = '#3c8dbc' //Red by default
      // Color chooser button
      $('#color-chooser > li > a').click(function(e) {
        e.preventDefault()
        // Save color
        currColor = $(this).css('color')
        // Add color effect to button
        $('#add-new-event').css({
          'background-color': currColor,
          'border-color': currColor
        })
      })
      $('#add-new-event').click(function(e) {
        e.preventDefault()
        // Get value and make sure it is not null
        var val = $('#new-event').val()
        if (val.length == 0) {
          return
        }

        // Create events
        var event = $('<div />')
        event.css({
          'background-color': currColor,
          'border-color': currColor,
          'color': '#fff'
        }).addClass('external-event')
        event.text(val)
        $('#external-events').prepend(event)

        // Add draggable funtionality
        ini_events(event)

        // Remove event from text input
        $('#new-event').val('')
      })
    })
  }
</script>
@endsection