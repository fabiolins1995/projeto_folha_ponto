@extends('adminlte::page')

@section('content')
<div class="card card-primary">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Tabela Financeiro</h3>

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
            <th>Equipe</th>
            <th>Banco/Agencia/Conta</th>
            <th>Chave pix</th>
            <th>Mês Vigente</th>
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
      MontaTabela();
    });

    function MontaTabela(){
      $.ajax({
      url: "/listarColaboradores",
      method: 'GET',
    }).done(function(result) {
      $.each(result, function(a,colaborador){

      });
    });
    }
  </script>
  @endsection