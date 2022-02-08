@extends('adminlte::page')

@section('content')
<div class="card card-primary">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Filtro</h3>
    </div>
    <div class="card-body">
      <div class="card-tools">
        <div class="col-md-6" style="float:left;">
          <label for="data" class="form-label">Data </label>
        </div>
        <div class="col-md-6"  style="float:left;">
          <label for="colaborador" class="form-label">Colaborador </label>
        </div>
        <div class="col-md-6" style="display: inline-flex; float:left;">      
          <select id="dia" class="form-control col-md-4">
          </select>
          <select id="mes" class="form-control col-md-4">
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
          <select id="ano" class="form-control col-md-4">
          </select>
        </div>
        <div class="col-md-6"  style="float:left;">          
          <select id="colaborador" class="form-control">
          </select>
        </div>
        <div class="col-md-6" style="float:left;">
          <label for="funcao" class="form-label">Função </label>
        </div>
        <div class="col-md-6"  style="float:left;">
          <label for="conselho" class="form-label">Nº Conselho </label>
        </div>
        <div class="col-md-6"  style="float:left;">          
          <select id="funcao" class="form-control">
          </select>
        </div>
        <div class="col-md-6"  style="float:left;">          
          <input type="number" id="conselho" name="conselho" class="form-control">
        </div>
        <div class="col-md-6" style="float:left;">
          <label for="setor" class="form-label">Setor </label>
        </div>
        <div class="col-md-6"  style="float:left;">
          <label for="equipe" class="form-label">Equipe </label>
        </div>
        <div class="col-md-6"  style="float:left;">          
          <select id="setor" class="form-control">
          </select>
        </div>
        <div class="col-md-6"  style="float:left;">          
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
            <th>Mês/Ano</th>
            <th>Escala Entrada</th>
            <th>Escala Saída</th>
            <th>Presença</th>
            <th>Motivo</th>
            <th>Obs</th>
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
      MontaAno();
      MontaColaborador();
      montaEquipeEquipe();
      montaFuncao();
      montaSetor();
    });
    function MontaAno(){
      d = new Date()
      menor = d.getFullYear() - 5
      html = '';
      for(var i = menor; i < d.getFullYear() + 5; i++){
        html += '<option value="'+i+'">'+i+'</option>'
      }
      $('#ano').html(html);
      html2 = '';
      for(var i = 1; i < 32; i++){
        html2 += '<option value="'+i+'">'+i+'</option>'
      }
      $('#dia').html(html2);
    }
    function MontaColaborador() {
      var html = '';
      $.ajax({
        url: "/listarColaboradores",
        method: 'GET',
      }).done(function(result) {
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
        $.each(result, function(a, b) {
          html += '<option value="' + b.id + '">' + b.nome + '</option>';
        });
        $('#setor').html(html);
      });
    }
    async function MontaTabela(){
      var mes = $('#mes').val();
      var ano = $('#ano').val();
      $.ajax({
      url: "/listarEscala?mes="+mes+"&ano="+ano,
      method: 'GET',
      async: false
      }).done(function(result) {
        html = '';
        $.each(result, function(a,colaborador){
          html += '<tr>';
          html += '<td>' + colaborador.associadoNome + '</td>';
          html += '<td>' + mes + '/' + ano + '</td>';
          html += '<td>' + colaborador.entrada + '</td>';         
          html += '<td>' + colaborador.saida + '</td>';  
          if (colaborador.presenca == 1){
            html += '<td>Presença</td>'
          }else if(colaborador.presenca == 0){
            html += '<td>Falta</td>'
          }
          //html += '<td>' + colaborador.obs + '</td>';
          //html += '<td>' + colaborador.obs + '</td>';
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