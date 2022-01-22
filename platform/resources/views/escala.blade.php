@extends('adminlte::page')

@section('content')
<div class="card card-primary">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tabela Escala</h3>

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
            <th>Mês/Ano</th>
            <th>Escala Entrada</th>
            <th>Escala Saída</th>
            <th></th>
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