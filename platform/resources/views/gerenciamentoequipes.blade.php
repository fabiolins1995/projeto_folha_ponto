@extends('adminlte::page')

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Registro de equipe</h3>
  </div>
  <form method="post" action="/salvarEquipe" accept-charset="UTF-8">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="exampleInputEmail1">Nome da equipe</label>
        <input type="text" name="nomeEquipe" class="form-control" id="exampleInputEmail1" placeholder="Nome da equipe">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Cor da equipe</label>
        <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
          <input type="text" id="corEquipe" name="corEquipe" class="form-control" data-original-title="" title="">
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-square" id="corQuadrado" style="color:#0c406e"></i></span>
          </div>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </form>
</div>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tabela de equipes</h3>

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
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>ID</th>
          <th>Equipe</th>
          <th>Cor</th>
          <th></th>
        </tr>
      </thead>
      <tbody class="tabelaEquipes">
        <!-- tabela das equipes -->
      </tbody>
    </table>
  </div>
</div>
<div id="modalEditarEquipe" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar equipe</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/editarEquipe" accept-charset="UTF-8">
          @csrf
          <input type="hidden" id="equipeId" name="idEquipe">
          <div class="card-body">
            <div class="form-group">
              <label for="nomeEquipe">Nome da equipe</label>
              <input type="text" name="nomeEquipe" class="form-control" id="nomeModal" placeholder="Nome da equipe">
            </div>
            <div class="form-group">
              <label for="corEquipe">Cor da equipe</label>
              <div class="input-group my-colorpicker2 colorpicker-element" data-colorpicker-id="2">
                <input type="text" id="corEquipeModal" name="corEquipe" class="form-control" data-original-title="" title="">
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-square" id="corQuadradoModal" style="color: #0c406e"></i></span>
                </div>
              </div>
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
  window.addEventListener('load', function() {
    MontarTabela();
    $('.my-colorpicker2').colorpicker();

    $('#corEquipe').on('change',function(){
      $('#corQuadrado').css('color', $('#corEquipe').val());
    }); 
    
    $('#corEquipeModal').on('change',function(){
      $('#corQuadradoModal').css('color', $('#corEquipe').val());
    });
  })

  function MontarTabela() {
    $.ajax({
      url: "/listarEquipes",
      method: 'GET',
    }).done(function(result) {
      var html = '';
      $('.tabelaEquipes').html(html);
      $.each(result, function(a, b) {
        html += '<tr>';
        html += '<td>' + b.id + '</td>';
        html += '<td>' + b.nome + '</td>';
        html += '<td><i class="fas fa-square" style="color: ' + b.cor + '"></i></td>';
        html += `<td><i style="cursor:pointer" onclick="TabelaEdit(${b.id})" class="far fa-edit"></i> | <i style="cursor:pointer" onclick="TabelaDelete(${b.id})" class="far fa-trash-alt"></i></td>`;
        html += '</tr>';
      })
      $('.tabelaEquipes').html(html);
    });
  }

  function TabelaDelete(id) {
    swal({
      title: "Deseja excluir a equipe?",
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
          url: "/deletarEquipe?id=" + id,
          method: 'GET',
        }).done(function(result) {
          if (result == false) {
            swal("Cancelado", "Erro na exclusão. Contate o administrador.", "error");
          } else {
            swal({
              title: 'Excluído!',
              text: 'Equipe excluída com sucesso!',
              icon: 'success'
            });
            MontarTabela();
          }
        });
      } else {
        swal("Cancelado", "Não foi excluído a equipe", "error");
      }
    });
  }

  function TabelaEdit(id) {
    $('#modalEditarEquipe').modal('show');
    $('#equipeId').val(id);
    $.ajax({
          url: "/listaEquipe?id=" + id,
          method: 'GET',
        }).done(function(result) {
          if (result == false) {
            swal("Error!", "Tente novamente, se persistir, contate o administrador", "error");
          }else{
            $.each(result, function (a, result){
              $('#nomeModal').val(result.nome)
              $('#corQuadrado').css('color', result.cor);
              $('#corQuadradoModal').css('color', result.cor);
            });            
          }
        });
  }
</script>
@endsection