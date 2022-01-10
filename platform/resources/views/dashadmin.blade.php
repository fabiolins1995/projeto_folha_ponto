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
          <div class="input-group">
            <button onclick="addEscala();" style="width:100%;margin-bottom:10px;" type="button" class="btn btn-primary">Individual</button>
            <button onclick="addEscalaGrupo();" style="width:100%;margin-bottom:10px;" type="button" class="btn btn-primary">Semanal</button>
            <button onclick="addEscalaEquipe();" style="width:100%" type="button" class="btn btn-primary">Carga horária</button>
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
<!-- 
  *
  *
  * ESCALA INDIVIDUAL
  *
  *
  *
-->
<div id="modalAddEscala" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adicionar escala individual</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/addEscala" accept-charset="UTF-8">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nomeEquipe">Nome colaborador</label>
              <select name="nome" class="form-control" id="nomeModal"></select>
            </div>
            <div class="form-group">
              <label for="nomeEquipe">Local</label>
              <select name="local" class="form-control" id="localModal"></select>
            </div>
            <div class="form-group">
              <label for="nomeEquipe">Equipe</label>
              <select name="equipe" class="form-control" id="equipeModal"></select>
            </div>
            <div class="form-group">
              <label for="nomeEquipe">Data entrada</label>
              <input type="text" name="dataEntrada" class="form-control datetimepicker" id="dataEntradaModal" placeholder="Data entrada">
            </div>
            <div class="form-group">
              <label for="nomeEquipe">Data saída</label>
              <input type="text" name="dataSaida" class="form-control datetimepicker" id="dataSaidaModal" placeholder="Data saída">
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- 
  *
  *
  * ESCALA SEMANAL
  *
  *
  *
-->
<div id="modalAddEscalaGrupo" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adicionar escala semanal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/addEscalaGrupo" accept-charset="UTF-8">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nomeEquipe">Local</label>
              <select name="local" class="form-control" id="localModalGrupo"></select>
            </div>
            <div class="form-group">
              <label for="nomeEquipe">Equipe</label>
              <select name="equipe" class="form-control" id="equipeModalGrupo"></select>
            </div>
            <div class="form-group">
              <label for="nomeEquipe">Hora entrada</label>
              <input type="text" name="dataEntrada" class="form-control datetimepicker" id="dataEntradaModalGrupo" placeholder="Data entrada">
            </div>
            <div class="form-group">
              <label for="nomeEquipe">Hora saída</label>
              <input type="text" name="dataSaida" class="form-control datetimepicker" id="dataSaidaModalGrupo" placeholder="Data saída">
            </div>
            <div class="form-group">
              <label for="diasSemeana">Dias da semana</label>
              <div class="form-check">
                <input type="checkbox" name="seg" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Seg</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="ter" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Ter</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="qua" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Qua</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="qui" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Qui</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="sex" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Sex</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="sab" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Sab</label>
              </div>
              <div class="form-check">
                <input type="checkbox" name="dom" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Dom</label>
              </div>
              <div class="form-group">
                <label for="mesRef">Mês de referência</label>
                <select name="mesRef" class="form-control">
                  <option value="01">Janeiro</option>
                  <option value="02">Fevereiro</option>
                  <option value="03">Março</option>
                  <option value="04">Abril</option>
                  <option value="05">Maio</option>
                  <option value="06">Junho</option>
                  <option value="07">Julho</option>
                  <option value="08">Agosto</option>
                  <option value="09">Setembro</option>
                  <option value="10">Outubro</option>
                  <option value="11">Novembro</option>
                  <option value="12">Dezembro</option>
                </select>
              </div>
              <div class="form-group">
                <select id="ano" name="anoRef" class="form-control">
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- 
  *
  *
  * ESCALA CARGA HORÁRIA
  *
  *
  *
  -->
<div id="modalAddEscalaEquipe" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Adicionar escala pro carga horária</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/addEscalaEquipe" accept-charset="UTF-8">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nomeEquipe">Local</label>
              <select name="local" class="form-control" id="localModalEquipe"></select>
            </div>
            <div class="form-group">
              <label for="nomeEquipe">Equipe</label>
              <select name="equipe" class="form-control" id="equipeModalEquipe"></select>
            </div>
            <div class="form-group">
              <label for="nomeEquipe">Data/Hora entrada</label>
              <input type="text" name="dataEntrada" class="form-control datetimepicker2" id="dataEntradaModalEquipe" placeholder="Data entrada">
            </div>
            <div class="form-group">
              <label for="nomeEquipe">Hora saída</label>
              <input type="text" name="dataSaida" class="form-control datetimepicker" id="dataSaidaModalEquipe" placeholder="Data saída">
            </div>
            <div class="form-group">
              <button onclick="addCarga();" style="width:100%;" type="button" class="btn btn-primary">Adicionar</button>
            </div>
            <div class="form-group">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>Data/Hora entrada</th>
                    <th>Hora saída</th>
                  </tr>
                </thead>
                <tbody id="adicionarCargaHoraria">

                </tbody>
              </table>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  var elementoTabela = '';
  var elementosEvent = [];
  window.addEventListener('load', function() {
    ListaEquipes();
    MontaColaborador();
    MontaLocal();
    MontaEventos();
    MontaAno();
    $(function() {
      $('.datetimepicker').appendDtpicker({
        locale: 'ho'
      });
      $('.datetimepicker2').appendDtpicker({
        locale: 'br'
      });
    });
  })

  function addCarga() {
    htmlCarga='';
    var entrada = $('#dataEntradaModalEquipe').val();
    var saida = $('#dataSaidaModalEquipe').val();
    htmlCarga += '<tr>';
    htmlCarga += '<td><input name="dataEntradaTabela[]" value="' + entrada + '" readonly /></td><td><input name="dataSaidaTabela[]" value="' + saida + '" readonly /></td>';
    htmlCarga += '</tr>';
    elementoTabela = elementoTabela + htmlCarga;
    $('#adicionarCargaHoraria').html(elementoTabela)
  }

  function MontaAno() {
    d = new Date()
    html = '';
    for (var i = d.getFullYear(); i < d.getFullYear() + 5; i++) {
      html += '<option value="' + i + '">' + i + '</option>'
    }
    $('#ano').html(html);
  }

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
        if (count < 6) {
          html2 += '<option value="' + b.id + '">' + b.nome + '</option>';
          count++;
        }
      });
      $('#equipe').html(html2);
      $('#external-events').html(html);
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

  function addEscalaGrupo() {
    $('#modalAddEscalaGrupo').modal('show');
    montaEquipeGrupo();
    montaLocalGrupo();
  }

  function addEscalaEquipe() {
    elementoTabela = '';
    $('#adicionarCargaHoraria').html('');
    $('#modalAddEscalaEquipe').modal('show');
    montaEquipeEquipe();
    montaLocalEquipe();
  }

  function addEscala() {
    $('#modalAddEscala').modal('show');
    montaEquipe();
    montaLocal();
    montaColaborador();
  }

  function montaEquipeEquipe() {
    var html = "";
    $.ajax({
      url: "/listarEquipes",
      method: 'GET',
    }).done(function(result) {
      $.each(result, function(a, b) {
        html += '<option value="' + b.id + '">' + b.nome + '</option>';
      });
      $('#equipeModalEquipe').html(html);
    });
  }

  function montaLocalEquipe() {
    var html = "";
    var data = "";
    $.get('/listarLocais', data, function(result) {
      $.each(result, function(a, b) {
        html += '<option value="' + b.id + '">' + b.nome + '</option>';
      });
      $('#localModalEquipe').html(html);
    });
  }

  function montaEquipeGrupo() {
    var html = "";
    $.ajax({
      url: "/listarEquipes",
      method: 'GET',
    }).done(function(result) {
      $.each(result, function(a, b) {
        html += '<option value="' + b.id + '">' + b.nome + '</option>';
      });
      $('#equipeModalGrupo').html(html);
    });
  }

  function montaLocalGrupo() {
    var html = "";
    var data = "";
    $.get('/listarLocais', data, function(result) {
      $.each(result, function(a, b) {
        html += '<option value="' + b.id + '">' + b.nome + '</option>';
      });
      $('#localModalGrupo').html(html);
    });
  }

  function montaEquipe() {
    var html = "";
    $.ajax({
      url: "/listarEquipes",
      method: 'GET',
    }).done(function(result) {
      $.each(result, function(a, b) {
        html += '<option value="' + b.id + '">' + b.nome + '</option>';
      });
      $('#equipeModal').html(html);
    });
  }

  function montaLocal() {
    var html = "";
    var data = "";
    $.get('/listarLocais', data, function(result) {
      $.each(result, function(a, b) {
        html += '<option value="' + b.id + '">' + b.nome + '</option>';
      });
      $('#localModal').html(html);
    });
  }

  function montaColaborador() {
    var html = "";
    $.ajax({
      url: "/listarColaboradores",
      method: 'GET',
    }).done(function(result) {
      $.each(result, function(a, b) {
        html += '<option value="' + b.id + '">' + b.nomeAssociado + '</option>';
      });
      $('#nomeModal').html(html);
    });
  }

  function MontaEventos() {
    $.ajax({
      url: "/listarEscalas",
      method: 'GET',
    }).done(function(result) {
      $.each(result, function(a, b) {
        //console.log(b);
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