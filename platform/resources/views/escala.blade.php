@extends('adminlte::page')

@section('content')
<div class="card card-primary">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Filtro</h3>
    </div>
    <div class="card-body">
      <div class="card-tools">
        <div class="form-group col-md-6" style="float:left;">
          <label for="data" class="form-label">Data inicial e final </label>
          <div style="display:inline-flex;">
            <input type="text" name="dataEntrada" class="form-control datetimepicker2" id="dataEntrada" placeholder="Data inicial" style="float:left;">
            <input type="text" name="dataSaida" class="form-control datetimepicker2" id="dataSaida" placeholder="Data final" style="float:right;">
          </div>
        </div>
        <div class="form-group col-md-6" style="float:left;">
          <label for="colaborador" class="form-label">Colaborador </label>
          <select id="colaborador" class="form-control">
          </select>
        </div>
        <div class="form-group col-md-6" style="float:left;">
          <label for="funcao" class="form-label">Função </label>
          <select id="funcao" class="form-control">
          </select>
        </div>
        <div class="form-group col-md-6" style="float:left;">
          <label for="conselho" class="form-label">Nº Conselho </label>
          <input type="number" id="conselho" name="conselho" class="form-control">
        </div>
        <div class="form-group col-md-6" style="float:left;">
          <label for="setor" class="form-label">Setor </label>
          <select id="setor" class="form-control">
          </select>
        </div>
        <div class="form-group col-md-6" style="float:left;">
          <label for="equipe" class="form-label">Equipe </label>
          <select id="equipe" class="form-control">
          </select>
        </div>
        <div class="col-md-12" style="float:left;margin-top:15px;">
          <button type="button" style="float:right;" onclick="MontaTabela()" class="btn btn-primary">
            Pesquisar <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card card-primary">
  <div class="card">
    <div class="card-header">
        <h3 class="card-title">Tabela Escala</h3>
    </div>
  <div class="card-body">
    <div class="card-body table-responsive p-0">
      <table class="table table-hover text-nowrap">
        <thead>
          <tr>
            <th>Colaborador</th>
            <th>Escala Entrada</th>
            <th>Escala Saída</th>
            <th>Presença</th>
            <th>Motivo</th>
            <th>Obs</th>
            <th></th>
          </tr>
        </thead>
        <tbody id="tabelaFinanceiro">
        </tbody>
      </table>
    </div>
  </div>
    <!-- /.card-body -->
</div>
  <script>
    window.addEventListener('load', function() {
      //MontaTabela();
      MontaColaborador();
      montaEquipeEquipe();
      montaFuncao();
      montaSetor();
      $(function() {
        $('.datetimepicker').appendDtpicker({
          locale: 'br'
        });
        $('.datetimepicker2').appendDtpicker({
          locale: 'br'
        });
      });
    });
    function MontaColaborador() {
      var html = '';
      $.ajax({
        url: "/listarColaboradores",
        method: 'GET',
      }).done(function(result) {
        html += '<option value="">Selecione</option>';
        $.each(result, function(a, b) {
          html += '<option value=' + b.id + '">' + b.nomeAssociado + '</option>';
        });
        $('#colaborador').html(html);
      });
    }
    function montaEquipeEquipe() {
      var html = "";
      $.ajax({
        url: "/listarEquipes",
        method: 'GET',
      }).done(function(result) {
        html += '<option value="">Selecione</option>';
        $.each(result, function(a, b) {
          html += '<option value="' + b.id + '">' + b.nome + '</option>';
        });
        $('#equipe').html(html);
      });
    } 
    function montaFuncao() {
      var html = "";
      $('#funcao').html(html);
      $.ajax({
        url: "/listarFuncoes",
        method: 'GET',
      }).done(function(result) {
        html += '<option value="">Selecione</option>';
        $.each(result, function(a, b) {
          html += '<option value="' + b.id + '">' + b.nome + '</option>';
        });
        $('#funcao').html(html);
      });
    }
    function montaSetor() {
      var html = "";
      $('#setor').html(html);

      $.ajax({
        url: "/listarSetores",
        method: 'GET',
      }).done(function(result) {
        html += '<option value="">Selecione</option>';
        $.each(result, function(a, b) {
          html += '<option value="' + b.id + '">' + b.nome + '</option>';
        });
        $('#setor').html(html);
      });
    }
    async function MontaTabela(){
      var dataInicial = $('#dataEntrada').val();
      var dataFinal = $('#dataSaida').val();
      var colaborador = $('#colaborador').val();
      var funcao = $('#funcao').val();
      var conselho = $('#conselho').val();
      var setor = $('#setor').val();
      var equipe = $('#equipe').val();
      $.ajax({
      url: "/listarEscala?dataInicial=" + dataInicial + "&dataFinal=" + dataFinal + "&colaborador=" + colaborador + "&funcao=" + funcao + "&conselho=" + conselho + "&setor=" + setor + "&equipe=" + equipe,
      method: 'GET',
      async: false
      }).done(function(result) {
        html = '';
        $.each(result, function(a,colaborador){
          html += '<tr>';
          html += '<td>' + colaborador.associadoNome + '</td>';
          html += '<td>' + colaborador.entrada + '</td>';
          html += '<td>' + colaborador.saida + '</td>';
          if (colaborador.presenca == 1){
            html += '<td>Presença</td>'
          }else /*if(colaborador.presenca == 0)*/{
            html += '<td>Falta</td>'
          }
          if (colaborador.motivo == 1){
            html += '<td>Atestado</td>';
            html += '<td>' + colaborador.observacao + '</td>';
          }else if(colaborador.motivo == 2){
            html += '<td>Permuta</td>';
            html += '<td>' + colaborador.observacao + '</td>';
          }else if(colaborador.motivo == 3){
            html += '<td>Psassagem de CH</td>';
            html += '<td>' + colaborador.observacao + '</td>';
          }else{
            html += '<td></td>';
            html += '<td></td>';
          }
          html += `<td><i style="cursor:pointer" onclick="TabelaDelete(${colaborador.escalaId})" class="far fa-trash-alt"></i></td>`;       
          html += '</tr>';
        });
        $('#tabelaFinanceiro').html(html);
      });
    }
    function TabelaDelete(id) {
    swal({
      title: "Deseja excluir a escala?",
      text: "Você irá excluir e não pode voltar atrás",
      icon: "warning",
      buttons: [
        'Não!',
        'Sim!'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        $.ajax({
          url: "/delEscala?id=" + id,
          method: 'GET',
        }).done(function(result) {
          if (result == false) {
            swal("Cancelado", "Erro na exclusão. Contate o administrador.", "error");
          } else {
            swal({
              title: 'Excluído!',
              text: 'Escala excluída com sucesso!',
              icon: 'success'
            });
            MontaTabela();
          }
        });
      } else {
        swal("Cancelado", "Não foi excluído a escala", "error");
      }
    });
  }
  </script>
  @endsection