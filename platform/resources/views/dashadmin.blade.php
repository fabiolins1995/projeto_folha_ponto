@extends('adminlte::page')

@section('content')
<div class="row">
  <div class="col-md-3">
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
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Adicionar escala</h3>
        </div>
        <div class="card-body">
          <!-- /btn-group -->
          <div class="input-group date">
            <input id="new-data" type="date" class="form-control" placeholder="Data">
            <div class="input-group date" id="timepicker" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#timepicker">
              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
              </div>
            </div>
          </div>
          <div class="input-group">
            <input id="new-data" type="text" class="form-control" placeholder="Equipe">
          </div>
          <div class="input-group">
            <input id="new-event" type="text" class="form-control" placeholder="Colaborador">
            <div class="input-group-append">
              <button id="add-new-event" type="button" class="btn btn-primary">+</button>
            </div>
            <!-- /btn-group -->
          </div>
          <!-- /input-group -->
        </div>
      </div>
    </div>
  </div>
  <!-- /.col -->
  <div class="col-md-9">
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

    <div class="card-tools">
      <div class="input-group input-group-sm" style="width: 150px;">
        <input type="text" name="table_search" class="form-control float-right" placeholder="Pesquisar">

        <div class="input-group-append">
          <button type="submit" class="btn btn-default">
            <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>Colaborador</th>
          <th>Local</th>
          <th>Equipe</th>
          <th>Data/Hora</th>
        </tr>
      </thead>
      <tbody id="tabelaHorario">
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<script>
  window.addEventListener('load', function() {
    ListaEquipes();
    TabelaHorario();
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
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        themeSystem: 'bootstrap',
        //Random default events
        events: MontaEventos(),
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
  })

  function ListaEquipes() {
    $.ajax({
      url: "/listarEquipes",
      method: 'GET',
    }).done(function(result) {
      html = '';
      $.each(result, function(a, b) {
        html += '<div class="external-event" style="background-color:' + b.cor + ';position:relative;color:white;">' + b.nome + '</div>';
      })
      $('#external-events').html(html);
    });
  }
  function TabelaHorario()
  {
    $.ajax({
      url: "/listarPontos",
      method: 'GET',
    }).done(function(result) {
    html = '';
      $.each(result, function(a,b){
        html += '<tr>';
        html += '<td>' + b.associadoNome +'</td>';
        html += '<td>' + b.localNome +'</td>';
        html += '<td>' + b.equipeNome +'</td>';
        html += '<td>' + b.horario_registro +'</td>';
        html += '</tr>';
      })
    $('#tabelaHorario').html(html);
    });
  }
  function MontaEventos()
  {
    var eventos=[];
    $.ajax({
      url: "/listarEscalas",
      method: 'GET',
    }).done(function(result) {
      $.each(result, function(a,b){
        console.log(b);
        var montagem = 
          {
            title:b.associadoNome,
            start: new Date(b.data_escala),
            bakcgroundColor: b.cor,
            borderColor: b.cor,
            allDay:false
          }
          eventos.push(montagem)
      })
    });
    console.log(eventos);
    return eventos;

/**
 * {
            title: 'All Day Event',
            start: new Date(y, m, 1),
            backgroundColor: '#f56954', //red
            borderColor: '#f56954', //red
            allDay: true
          },
 */ 
  }
</script>
@endsection