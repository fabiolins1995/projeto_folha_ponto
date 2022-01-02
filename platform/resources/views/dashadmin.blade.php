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
            <input id="new-data" type="date" class="form-control" id="escalaData" placeholder="Data">
            <div class="input-group date" id="timepicker" data-target-input="nearest">
              <input type="text" class="form-control datetimepicker-input" data-target="#timepicker" id="escalaHora">
              <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                <div class="input-group-text"><i class="far fa-clock"></i></div>
              </div>
            </div>
          </div>
          <div class="input-group">
            <select class="form-control" name="equipe" id="equipe" placeholder="Equipe">
              <option value=""></option>
            </select>
          </div>
          <div class="input-group">
            <select class="form-control" name="local" id="local" placeholder="Local">
              <option value=""></option>
            </select>
          </div>
          <div class="input-group">
            <select class="form-control" name="colaborador" id="colaborador" placeholder="colaborador">
              <option value=""></option>
            </select>
            <div class="input-group-append">
              <button onclick="addEscala();" type="button" class="btn btn-primary">+</button>
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
  var elementosEvent = [];
  window.addEventListener('load', function() {
    ListaEquipes();
    TabelaHorario();
    MontaColaborador();
    MontaLocal();
    MontaEventos();
  })

  function ListaEquipes() {
    $.ajax({
      url: "/listarEquipes",
      method: 'GET',
    }).done(function(result) {
      count = 0;
      html2 = '';
      html = '';
      $.each(result, function(a, b) {
        html += '<div class="external-event" style="background-color:' + b.cor + ';position:relative;color:white;">' + b.nome + '</div>';
        if(count < 6){
          html2 += '<option value="' + b.id + '">' + b.nome + '</option>';
          count++;
        }        
      });
      $('#equipe').html(html2);
      $('#external-events').html(html);
    });
  }

  function TabelaHorario() {
    $.ajax({
      url: "/listarPontos",
      method: 'GET',
    }).done(function(result) {
      html = '';
      $.each(result, function(a, b) {
        html += '<tr>';
        html += '<td>' + b.associadoNome + '</td>';
        html += '<td>' + b.localNome + '</td>';
        html += '<td>' + b.equipeNome + '</td>';
        html += '<td>' + b.horario_registro + '</td>';
        html += '</tr>';
      })
      $('#tabelaHorario').html(html);
    });
  }

  function MontaLocal() {
    var html = '';
    $.ajax({
      url: "/listarLocais",
      method: 'GET',
    }).done(function(result) {
      $.each(result, function(a, b) {
        html += '<option value=' + b.id + '">' + b.nome + '</option>';
      });
      $('#local').html(html);
    });
  }

  function MontaColaborador() {
    var html = '';
    $.ajax({
      url: "/listarColaboradores",
      method: 'GET',
    }).done(function(result) {
      $.each(result, function(a, b) {
        html += '<option value=' + b.id + '">' + b.nome + '</option>';
      });
      $('#colaborador').html(html);
    });
  }

  function addEscala() {
    $.ajax({
      url: "/addEscala?equipe=" + $('#equipe').val() + "&colaborador=" + $('#colaborador').val() + "&datetime=" + $('#escalaData').val() + "&local=" + $('#local').val(),
      method: 'GET',
    }).done(function(result) {});
  }

  function MontaEventos() {
    $.ajax({
      url: "/listarEscalas",
      method: 'GET',
    }).done(function(result) {
      $.each(result, function(a, b) {
        console.log(b);
        var montagem = {
          title: b.associadoNome,
          start: new Date(b.data_escala),
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