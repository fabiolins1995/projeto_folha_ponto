@extends('adminlte::page')

@section('content')
<div class="card card-primary">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tabela Financeiro</h3>

      <div class="card-tools">
        <div class="input-group input-group-sm" style="width: 200px;">
        <select id="mes" class="form-control">
            <option value="1">Janeiro</option>
            <option value="2">Fevereiro</option>
            <option value="3">Março</option>
            <option value="4">Abril</option>
            <option value="5">Maio</option>
            <option value="6">Junho</option>
            <option value="7">Julho</option>
            <option value="8">Agosto</option>
            <option value="9">Setembro</option>
            <option value="10">Outubro</option>
            <option value="11">Novembro</option>
            <option value="12">Dezembro</option>
          </select>
          <select id="ano" class="form-control">
          </select>

          <div class="input-group-append">
            <button type="button" onclick="MontaTabela()" class="btn btn-default">
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
            <th>Equipe</th>
            <th>Banco/Agencia/Conta</th>
            <th>Chave pix</th>
            <th>Mês/Ano</th>
            <th>Horas Escala</th>
            <th>Horas Registradas</th>
            <th>Horas Extras</th>
          </tr>
        </thead>
        <tbody id="tabelaFinanceiro">
        </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
  <script>
    window.addEventListener('load', function() {
      //MontaTabela();
      MontaAno();
    });
    function MontaAno(){
      d = new Date()
      menor = d.getFullYear() - 5
      html = '';
      for(var i = menor; i < d.getFullYear() + 5; i++){
        html += '<option value="'+i+'">'+i+'</option>'
      }
      $('#ano').html(html);
    }
    async function MontaTabela(){
      var mes = $('#mes').val();
      var ano = $('#ano').val();
      $.ajax({
      url: "/listarFinanceiro",
      method: 'GET',
      async: false
      }).done(function(result) {
        html = '';
        $.each(result, function(a,colaborador){
          html += '<tr>';
          html += '<td>' + colaborador.nomeAssociado + '</td>';
          html += '<td>' + colaborador.nomeEquipe + '</td>';
          html += '<td>' + colaborador.bancoAssociado + '/' + colaborador.agenciaAssociados + '/' + colaborador.contaAssociados + '</td>';
          html += '<td>' + colaborador.chaveAssociado + '</td>';
          html += '<td>' + mes + '/' + ano + '</td>';
          $.ajax({
            url: "/listarFinanceiroEscala?id="+colaborador.id+"&mes="+mes+"&ano="+ano,
            method: 'GET',
            async: false
          }).done(function(result) {
            $.each(result, function(a,b){
              html += '<td>' + b.Total + '</td>';
            });
          });
          $.ajax({
            url: "/listarFinanceiroHoras?id="+colaborador.id+"&mes="+mes+"&ano="+ano,
            method: 'GET',
            async: false
          }).done(function(result) {
            $.each(result, function(a,b){
              html += '<td>' + b.Total + '</td>';
            });
          }); 
          $.ajax({
            url: "/listarFinanceiroExtras?id="+colaborador.id+"&mes="+mes+"&ano="+ano,
            method: 'GET',
            async: false
          }).done(function(result) {
            $.each(result, function(a,b){
              html += '<td>' + b.Total + '</td>';
            });
          });           
          html += '</tr>';
        });
        $('#tabelaFinanceiro').html(html);
      });
    }
  </script>
  @endsection