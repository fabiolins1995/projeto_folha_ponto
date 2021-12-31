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
                  <div id="external-events">
                    <div class="external-event bg-success ui-draggable ui-draggable-handle" style="position: relative;">Equipe 1</div>
                    <div class="external-event bg-warning ui-draggable ui-draggable-handle" style="position: relative;">Equipe 2</div>
                    <div class="external-event bg-info ui-draggable ui-draggable-handle" style="position: relative;">Equipe 3</div>
                    <div class="external-event bg-primary ui-draggable ui-draggable-handle" style="position: relative;">Equipe 4</div>
                    <div class="external-event bg-danger ui-draggable ui-draggable-handle" style="position: relative;">Equipe 5</div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Adicionar escala</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><i class="far fa-circle"></i></li> <p>Sem registro de ponto</p>
                      <li><i class="far fa-circle" style="color:green;"></i></li> <p>Ponto registrado</p>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-data" type="date" class="form-control" placeholder="Data">
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
                <div id="calendar" class="fc fc-media-screen fc-direction-ltr fc-theme-bootstrap">
                <div class="fc-header-toolbar fc-toolbar fc-toolbar-ltr">
                <div class="fc-toolbar-chunk">
                <div class="btn-group">
                <button class="fc-prev-button btn btn-primary" type="button" aria-label="prev">
                <span class="fa fa-chevron-left"></span>
                </button>
                <button class="fc-next-button btn btn-primary" type="button" aria-label="next">
                <span class="fa fa-chevron-right"></span>
                </button>
                </div>
                <button disabled="" class="fc-today-button btn btn-primary" type="button">Hoje</button>
                </div>
                <div class="fc-toolbar-chunk">
                <h2 class="fc-toolbar-title">Novembro 2021</h2></div>
                <div class="fc-toolbar-chunk"><div class="btn-group">
                <button class="fc-dayGridMonth-button btn btn-primary active" type="button">Mês</button>
                <button class="fc-timeGridWeek-button btn btn-primary" type="button">Semana</button>
                <button class="fc-timeGridDay-button btn btn-primary" type="button">Dia</button>
                </div>
                </div>
                </div>
                <div class="fc-view-harness fc-view-harness-active" style="height: 488.148px;">
                <div class="fc-daygrid fc-dayGridMonth-view fc-view">
                <table class="fc-scrollgrid table-bordered fc-scrollgrid-liquid">
                <thead>
                <tr class="fc-scrollgrid-section fc-scrollgrid-section-header "><td>
                <div class="fc-scroller-harness">
                <div class="fc-scroller" style="overflow: hidden;">
                <table class="fc-col-header " style="width: 100%;">
                <colgroup></colgroup>
                <tbody>
                <tr>
                <th class="fc-col-header-cell fc-day fc-day-sun">
                <div class="fc-scrollgrid-sync-inner">
                <a class="fc-col-header-cell-cushion ">Dom</a>
                </div>
                </th>
                <th class="fc-col-header-cell fc-day fc-day-mon">
                <div class="fc-scrollgrid-sync-inner">
                <a class="fc-col-header-cell-cushion ">Seg</a>
                </div>
                </th>
                <th class="fc-col-header-cell fc-day fc-day-tue">
                <div class="fc-scrollgrid-sync-inner">
                <a class="fc-col-header-cell-cushion ">Ter</a>
                </div>
                </th>
                <th class="fc-col-header-cell fc-day fc-day-wed">
                <div class="fc-scrollgrid-sync-inner">
                <a class="fc-col-header-cell-cushion ">Qua</a>
                </div>
                </th>
                <th class="fc-col-header-cell fc-day fc-day-thu">
                <div class="fc-scrollgrid-sync-inner">
                <a class="fc-col-header-cell-cushion ">Qui</a>
                </div>
                </th>
                <th class="fc-col-header-cell fc-day fc-day-fri">
                <div class="fc-scrollgrid-sync-inner">
                <a class="fc-col-header-cell-cushion ">Sex</a>
                </div>
                </th>
                <th class="fc-col-header-cell fc-day fc-day-sat">
                <div class="fc-scrollgrid-sync-inner">
                <a class="fc-col-header-cell-cushion ">Sab</a>
                </div>
                </th>
                </tr>
                </tbody>
                </table>
                </div>
                </div>
                </td>
                </tr>
                </thead>
                <tbody>
                <tr class="fc-scrollgrid-section fc-scrollgrid-section-body  fc-scrollgrid-section-liquid">
                <td>
                <div class="fc-scroller-harness fc-scroller-harness-liquid">
                <div class="fc-scroller fc-scroller-liquid-absolute" style="overflow: hidden auto;">
                <div class="fc-daygrid-body fc-daygrid-body-unbalanced " style="width: 100%;">
                <table class="fc-scrollgrid-sync-table" style="width: 100%; height: 456px;">
                <colgroup></colgroup>
                <tbody>
                <tr>
                <td class="fc-daygrid-day fc-day fc-day-sun fc-day-past fc-day-other" data-date="2021-10-31">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">31</a>
                </div>
                <div class="fc-daygrid-day-events">
                </div>
                <div class="fc-daygrid-day-bg">
                </div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2021-11-01">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">1</a>
                </div>
                <div class="fc-daygrid-day-events">
                <div class="fc-daygrid-event-harness">
                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-resizable fc-event-start fc-event-end fc-event-past" style="border-color: #007bff; background-color: #007bff;">
                <div class="fc-event-main">
                <div class="fc-event-main-frame">
                <div class="fc-event-title-container">
                <div class="fc-event-title fc-sticky"><i class="far fa-circle"></i>Fulano1</div>
                </div>
                </div>
                </div>
                <div class="fc-event-resizer fc-event-resizer-end">
                </div>
                </a>
                </div>
                </div>
                <div class="fc-daygrid-day-bg">
                </div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2021-11-02">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">2</a>
                </div>
                <div class="fc-daygrid-day-events"></div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2021-11-03">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">3</a>
                </div>
                <div class="fc-daygrid-day-events"></div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2021-11-04">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">4</a>
                </div>
                <div class="fc-daygrid-day-events"></div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2021-11-05">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">5</a>
                </div><div class="fc-daygrid-day-events"></div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2021-11-06">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">6</a>
                </div>
                <div class="fc-daygrid-day-events"></div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td>
                </tr>
                <tr>
                <td class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2021-11-07">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">7</a>
                </div>
                <div class="fc-daygrid-day-events">
                </div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2021-11-08">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">8</a>
                </div>
                <div class="fc-daygrid-day-events"></div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2021-11-09">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">9</a>
                </div>
                <div class="fc-daygrid-day-events"></div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2021-11-10"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">10</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2021-11-11"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">11</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2021-11-12"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">12</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2021-11-13"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">13</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td></tr><tr><td class="fc-daygrid-day fc-day fc-day-sun fc-day-past" data-date="2021-11-14"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">14</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-mon fc-day-past" data-date="2021-11-15"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">15</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-tue fc-day-past" data-date="2021-11-16"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">16</a>
                </div>
                <div class="fc-daygrid-day-events" style="padding-bottom: 25px;">
                <div class="fc-daygrid-event-harness fc-daygrid-event-harness-abs">
                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-start fc-event-end fc-event-past" style="border-color: #dc3545; background-color: #dc3545;">
                <div class="fc-event-main">
                <div class="fc-event-main-frame">
                <div class="fc-event-title-container">
                <div class="fc-event-title fc-sticky"><i class="far fa-circle"></i>Fulano 2</div>
                </div>
                </div>
                </div>
                </a>
                </div>
                </div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-wed fc-day-past" data-date="2021-11-17"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">17</a></div><div class="fc-daygrid-day-events" style="padding-bottom: 25px;"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-thu fc-day-past" data-date="2021-11-18"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">18</a></div><div class="fc-daygrid-day-events" style="padding-bottom: 25px;"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-fri fc-day-past" data-date="2021-11-19"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">19</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-sat fc-day-past" data-date="2021-11-20"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">20</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td></tr><tr><td class="fc-daygrid-day fc-day fc-day-sun fc-day-today " data-date="2021-11-21"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">21</a>
                </div>
                <div class="fc-daygrid-day-events">
                <div class="fc-daygrid-event-harness">
                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-start fc-event-end fc-event-past" style="border-color: #17a2b8; background-color: #17a2b8;">
                <div class="fc-event-main">
                <div class="fc-event-main-frame">
                <div class="fc-event-title-container">
                <div class="fc-event-title fc-sticky"><i class="far fa-circle"></i>Fulano 3</div>
                </div>
                </div>
                </div>
                </a>
                </div>
                <div class="fc-daygrid-event-harness">
                <a class="fc-daygrid-event fc-daygrid-block-event fc-h-event fc-event fc-event-draggable fc-event-start fc-event-end fc-event-past" style="border-color: #28a745; background-color: #28a745;">
                <div class="fc-event-main">
                <div class="fc-event-main-frame">
                <div class="fc-event-title-container">
                <div class="fc-event-title fc-sticky"><i class="far fa-circle"></i>Fulano 4</div>
                </div>
                </div>
                </div>
                </a>
                </div>
                </div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2021-11-22">
                <div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">22</a>
                </div>
                <div class="fc-daygrid-day-events">
                </div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td>
                <td class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2021-11-23"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">23</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-wed fc-day-future" data-date="2021-11-24"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">24</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-thu fc-day-future" data-date="2021-11-25"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">25</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-fri fc-day-future" data-date="2021-11-26"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">26</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-sat fc-day-future" data-date="2021-11-27"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">27</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td></tr><tr>
                <td class="fc-daygrid-day fc-day fc-day-sun fc-day-future" data-date="2021-11-28"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner">
                <div class="fc-daygrid-day-top">
                <a class="fc-daygrid-day-number">28</a>
                </div>
                <div class="fc-daygrid-day-events">
                </div>
                <div class="fc-daygrid-day-bg"></div>
                </div>
                </td><td class="fc-daygrid-day fc-day fc-day-mon fc-day-future" data-date="2021-11-29"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">29</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-tue fc-day-future" data-date="2021-11-30"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">30</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other" data-date="2021-12-01"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">1</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other" data-date="2021-12-02"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">2</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other" data-date="2021-12-03"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">3</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other" data-date="2021-12-04"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">4</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td></tr><tr><td class="fc-daygrid-day fc-day fc-day-sun fc-day-future fc-day-other" data-date="2021-12-05"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">5</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-mon fc-day-future fc-day-other" data-date="2021-12-06"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">6</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-tue fc-day-future fc-day-other" data-date="2021-12-07"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">7</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-wed fc-day-future fc-day-other" data-date="2021-12-08"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">8</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-thu fc-day-future fc-day-other" data-date="2021-12-09"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">9</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-fri fc-day-future fc-day-other" data-date="2021-12-10"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">10</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td><td class="fc-daygrid-day fc-day fc-day-sat fc-day-future fc-day-other" data-date="2021-12-11"><div class="fc-daygrid-day-frame fc-scrollgrid-sync-inner"><div class="fc-daygrid-day-top"><a class="fc-daygrid-day-number">11</a></div><div class="fc-daygrid-day-events"></div><div class="fc-daygrid-day-bg"></div></div></td></tr></tbody></table></div></div></div></td></tr></tbody></table></div></div></div>
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
                      <th>ID</th>
                      <th>Colaborador</th>
                      <th>Data</th>
                      <th>Horário entrada</th>
                      <th>Horário saída</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>Fulano 1</td>
                      <td>11-7-2014</td>
                      <td>8:03</td>
                      <td>11:40</td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Fulano 2</td>
                      <td>11-7-2014</td>
                      <td>8:15</td>
                      <td>-</td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Fulano 3</td>
                      <td>11-7-2014</td>
                      <td>10:00</td>
                      <td>13:15</td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Fulano 4</td>
                      <td>11-7-2014</td>
                      <td>11:00</td>
                      <td>-</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection