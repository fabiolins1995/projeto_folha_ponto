@extends('adminlte::page')

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Registro colaborador</h3>
  </div>
  <form method="post" action="/salvarColaborador" accept-charset="UTF-8">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" placeholder="Nome">
      </div>
      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="text" name="telefone" id="telefone" class="form-control" placeholder="Telefone" maxlength="11">
      </div>
      <div class="form-group">
        <label for="telefone">E-mail</label>
        <input type="email" name="email" class="form-control" placeholder="E-mail">
      </div>
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" class="form-control" placeholder="CPF" maxlength="11">
      </div>
      <div class="form-group">
        <label for="equipe">Equipe</label>
        <div class="input-group">
          <select class="form-control" name="equipe" id="equipe" placeholder="Equipe">
            <option value=""></option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="local">Local</label>
        <div class="input-group">
          <select class="form-control" name="local" id="local" placeholder="Local">
            <option value=""></option>
          </select>
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-plus-square" onclick="addLocal();"></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="setor">Setor</label>
        <div class="input-group">
          <select class="form-control" name="setor" id="setor" placeholder="Setor">
            <option value=""></option>
          </select>
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-plus-square" onclick="addSetor();"></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="funcao">Função</label>
        <div class="input-group">
          <select class="form-control" name="funcao" id="funcao" placeholder="Função">
            <option value=""></option>
          </select>
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-plus-square" onclick="addFuncao();"></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="especialidade">Especialidade</label>
        <div class="input-group">
          <select class="form-control" name="especialidade" id="especialidade" placeholder="Especialidade">
            <option value=""></option>
          </select>
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-plus-square" onclick="addEspecialidade();"></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="especialidade">Banco</label>
        <div class="input-group">
          <select class="form-control" name="banco" id="banco" placeholder="Banco">
            <option value=""></option>
          </select>
          <div class="input-group-append">
            <span class="input-group-text"><i class="fas fa-plus-square" onclick="addBanco();"></i></span>
          </div>
        </div>
      </div>
      <div class="form-group">
        <label for="numero_agencia">Agência</label>
        <input type="text" name="numero_agencia" class="form-control" placeholder="Número da agência">
      </div>
      <div class="form-group">
        <label for="numero_conta">Conta</label>
        <input type="text" name="numero_conta" class="form-control" placeholder="Número da conta">
      </div>
      <div class="form-group">
        <label for="tipo_de_conta">Tipo</label>
        <input type="text" name="tipo_de_conta" class="form-control" placeholder="Tipo da conta">
      </div>
      <div class="form-group">
        <label for="chave_pix">Chave Pix</label>
        <input type="text" name="chave_pix" class="form-control" placeholder="Chave Pix">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
  </form>
</div>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tabela de colaboradores</h3>

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
          <th>Nome</th>
          <th>Local</th>
          <th>Setor</th>
          <th>Função</th>
          <th>Especialidade</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="tabelaColaboradores">
      </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<div id="modalEditarColaborador" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Editar Colaborador</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" action="/editarColaborador" accept-charset="UTF-8">
          @csrf
          <div class="card-body">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" name="nome" id="nomeModal" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="text" name="telefone" id="telefoneModal" class="form-control" placeholder="Telefone" maxlength="11">
            </div>
            <div class="form-group">
              <label for="email">E-mail</label>
              <input type="email" name="email" id="emailModal" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
              <label for="cpf">CPF/Registro</label>
              <input type="text" name="cpf" id="cpf" class="form-control cpf" placeholder="CPF/Registro" maxlength="11">
            </div>
            <div class="form-group">
              <label for="equipe">Equipe</label>
              <div class="input-group">
                <select class="form-control" name="equipe"  id="equipeModal" placeholder="Equipe">
                  <option value=""></option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="local">Local</label>
              <div class="input-group">
                <select class="form-control" name="local"  id="localModal" placeholder="Local">
                  <option value=""></option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="setor">Setor</label>
              <div class="input-group">
                <select class="form-control" name="setor"  id="setorModal" placeholder="Setor">
                  <option value=""></option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="funcao">Função</label>
              <div class="input-group">
                <select class="form-control" name="funcao"  id="funcaoModal" placeholder="Função">
                  <option value=""></option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="especialidade">Especialidade</label>
              <div class="input-group">
                <select class="form-control" name="especialidade"  id="especialidadeModal" placeholder="Especialidade">
                  <option value=""></option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="especialidade">Banco</label>
              <div class="input-group">
                <select class="form-control" name="banco"  id="bancoModal" placeholder="Banco">
                  <option value=""></option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="numero_agencia">Agência</label>
              <input type="text" name="numero_agencia" id="numero_agenciaModal" class="form-control" placeholder="Número da agência">
            </div>
            <div class="form-group">
              <label for="numero_conta">Conta</label>
              <input type="text" name="numero_conta" id="numero_contaModal" class="form-control" placeholder="Número da conta">
            </div>
            <div class="form-group">
              <label for="tipo_de_conta">Tipo</label>
              <input type="text" name="tipo_de_conta" id="tipo_de_contaModal" class="form-control" placeholder="Tipo da conta">
            </div>
            <div class="form-group">
              <label for="chave_pix">Chave Pix</label>
              <input type="text" name="chave_pix" id="chave_pixModal" class="form-control" placeholder="Chave Pix">
            </div>
          </div>
          <!-- /.card-body -->

          <div class="card-footer">
            <button type="submit" class="btn btn-primary">Salvar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script>
    window.addEventListener('load', function() {
      
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });

      montaEquipe();
      montaLocal();
      montaSetor();
      montaFuncao();
      montaEspecialidade();
      montaBanco();
      listarColaboradores();
    });
    /**
     * Função monta tabela
     */
    function listarColaboradores() {
      var html = '';
      $('#tabelaColaboradores').html(html);

      $.ajax({
        url: "/listarColaboradores",
        method: 'GET',
      }).done(function(result) {
        $.each(result, function(a, b) {
          html += '<tr>';
          html += '<td>' + b.nomeAssociado + '</td>';
          html += '<td>' + b.localNome + '</td>';
          html += '<td>' + b.setorNome + '</td>';
          html += '<td>' + b.funcaoNome + '</td>';
          html += '<td>' + b.especialidadeNome + '</td>';
          html += `<td><i style="cursor:pointer" onclick="TabelaEdit(${b.id})" class="far fa-edit"></i> | <i style="cursor:pointer" onclick="TabelaDelete(${b.id})" class="far fa-trash-alt"></i></td>`;
          html += '</tr>';
        });
        $('#tabelaColaboradores').html(html);
      });
    }
    /**
     * Início funções de montagem do select
     */
    function montaEquipe() {
      var html = "";
      $('#equipe').html(html);

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

    function montaLocal() {
      var html = "";
      var data = "";
      $('#local').html(html);
      $.get('/listarLocais', data, function(result) {
        $.each(result, function(a, b) {
          html += '<option value="' + b.id + '">' + b.nome + '</option>';
        });
        $('#local').html(html);
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

    function montaEspecialidade() {
      var html = "";
      $('#especialidade').html(html);

      $.ajax({
        url: "/listarEspecialidades",
        method: 'GET',
      }).done(function(result) {
        $.each(result, function(a, b) {
          html += '<option value="' + b.id + '">' + b.nome + '</option>';
        });
        $('#especialidade').html(html);
      });
    }

    function montaBanco() {
      var html = "";
      $('#banco').html(html);

      $.ajax({
        url: "/listarBancos",
        method: 'GET',
      }).done(function(result) {
        $.each(result, function(a, b) {
          html += '<option value="' + b.cod + '">' + b.cod + '-' + b.nome + '</option>';
        });
        $('#banco').html(html);
      });
    }
    /**
     * Fim funções de montagem do select
     */
    /**
     * Início funções de adicionar
     */
    function addEquipe() {
      Swal.fire({
        title: "Adicionar uma equipe",
        text: "Digite o nome da nova equipe",
        input: "text",
        showCancelButton: true,
      }).then((result) => {
        var inputValue = result.value;
        if (inputValue === null) return false;

        if (inputValue === "") {
          swal.showInputError("O campo não pode ser vazio");
          return false
        }

        $.ajax({
          url: "/salvarEquipe?nomeEquipe=" + inputValue,
          method: 'POST',
        }).done(function(result) {
          if (result == true) {
            swal("Pronto!", "Adicionado nova equipe: " + inputValue, "success");
            montarEquipe();
          }
        });

      });
    }

    function addLocal() {
      Swal.fire({
        title: "Adicionar um local",
        text: "Digite o nome do novo local",
        input: "text",
        showCancelButton: true,
      }).then((result) => {
        var inputValue = result.value;
        if (inputValue === null) return false;

        if (inputValue === "") {
          swal.showInputError("O campo não pode ser vazio");
          return false
        }
        $.ajax({
          url: "/cadastraLocal?nome=" + inputValue,
          method: 'POST',
        }).done(function(result) {
          if (result == true) {
            swal("Pronto!", "Adicionado novo local: " + inputValue, "success");
            montaLocal();
          }
        });
      });
    }

    function addSetor() {
      Swal.fire({
        title: "Adicionar um setor",
        text: "Digite o nome do novo setor",
        input: "text",
        showCancelButton: true,
      }).then((result) => {
        var inputValue = result.value;
        if (inputValue === null) return false;

        if (inputValue === "") {
          swal.showInputError("O campo não pode ser vazio");
          return false
        }
        $.ajax({
          url: "/cadastraSetor?nome=" + inputValue,
          method: 'POST',
        }).done(function(result) {
          if (result == true) {
            swal("Pronto!", "Adicionado novo setor: " + inputValue, "success");
            montaSetor();
          }
        });
      });
    }

    function addFuncao() {
      Swal.fire({
        title: "Adicionar uma função",
        text: "Digite o nome da nova função",
        input: "text",
        showCancelButton: true,
      }).then((result) => {
        var inputValue = result.value;
        if (inputValue === null) return false;

        if (inputValue === "") {
          swal.showInputError("O campo não pode ser vazio");
          return false
        }
        $.ajax({
          url: "/cadastraFuncao?nome=" + inputValue,
          method: 'POST',
        }).done(function(result) {
          if (result == true) {
            swal("Pronto!", "Adicionado nova função: " + inputValue, "success");
            montaFuncao();
          }
        });
      });
    }

    function addEspecialidade() {
      Swal.fire({
        title: "Adicionar uma especialidade",
        text: "Digite o nome da nova especialidade",
        input: "text",
        showCancelButton: true,
      }).then((result) => {
        var inputValue = result.value;
        if (inputValue === null) return false;

        if (inputValue === "") {
          swal.showInputError("O campo não pode ser vazio");
          return false
        }
        $.ajax({
          url: "/cadastraEspecialidade?nome=" + inputValue,
          method: 'POST',
        }).done(function(result) {
          if (result == true) {
            swal("Pronto!", "Adicionado nova especialidade: " + inputValue, "success");
            montaEspecialidade();
          }
        });
      });
    }

    function addBanco() {
      Swal.fire({
        title: "Adicionar um banco",
        text: "Digite o nome do novo banco",
        input: "text",
        showCancelButton: true,
      }).then((result) => {
        var inputValue = result.value;
        if (inputValue === null) return false;

        if (inputValue === "") {
          swal.showInputError("O campo não pode ser vazio");
          return false
        }
        $.ajax({
          url: "/cadastraBanco?nome=" + inputValue,
          method: 'POST',
        }).done(function(result) {
          if (result == true) {
            swal("Pronto!", "Adicionado novo banco: " + inputValue, "success");
            montaBanco();
          }
        });
      });
    }
    /**
     * Fim funções de adicionar
     */
    function TabelaDelete(id) {
      swal({
        title: "Deseja excluir o colaborador?",
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
            url: "/deletarColaborador?id=" + id,
            method: 'GET',
          }).done(function(result) {
            if (result == false) {
              swal("Cancelado", "Erro na exclusão. Contate o administrador.", "error");
            } else {
              swal({
                title: 'Excluído!',
                text: 'Colaborador excluído com sucesso!',
                icon: 'success'
              });
              listarColaboradores();
            }
          });
        } else {
          swal("Cancelado", "Não foi excluído o colaborador", "error");
        }
      });
    }

    function TabelaEdit(id) {
      $('#modalEditarColaborador').modal('show');
      $('#colaboradorId').val(id);
      $.ajax({
          url: "/listaColaborador?id=" + id,
          method: 'GET',
        }).done(function(result) {
          if (result == false) {
            swal("Error!", "Tente novamente, se persistir, contate o administrador", "error");
          }else{
            $.each(result, function (a, result){
              $("#chave_pixModal").val(result.chave_pix);
              $("#tipo_de_contaModal").val(result.tipo_de_conta);
              $("#numero_contaModal").val(result.numero_conta);
              $("#numero_agenciaModal").val(result.numero_agencia);
              $("#bancoModal").val(montaBancoModal(result.banco));
              $("#especialidadeModal").val(montaEspecialidadeModal(result.especialidade));
              $("#funcaoModal").val(montaFuncaoModal(result.funcao));
              $("#setorModal").val(montaSetorModal(result.setor));
              $("#localModal").val(montaLocalModal(result.local));
              $("#equipeModal").val(montaEquipeModal(result.equipe));
              $("#cpfModal").val(result.cpf);
              $("#emailModal").val(result.email);
              $("#telefoneModal").val(result.telefone);
              $("#nomeModal").val(result.nome);
            });            
          }
        });
    }
    function montaEquipeModal(id) {
      var html = "";
      $('#equipeModal').html(html);

      $.ajax({
        url: "/listarEquipes",
        method: 'GET',
      }).done(function(result) {
        $.each(result, function(a, b) {
          if(b.id == id){
            html += '<option value="' + b.id + '" selected>' + b.nome + '</option>';
          }else{
            html += '<option value="' + b.id + '">' + b.nome + '</option>';
          }
        });
        $('#equipeModal').html(html);
      });
    }

    function montaLocalModal(id) {
      var html = "";
      var data = "";
      $('#localModal').html(html);
      $.get('/listarLocais', data, function(result) {
        $.each(result, function(a, b) {
          if(b.id == id){
            html += '<option value="' + b.id + '" selected>' + b.nome + '</option>';
          }else{
            html += '<option value="' + b.id + '">' + b.nome + '</option>';
          }
        });
        $('#localModal').html(html);
      });
    }

    function montaSetorModal(id) {
      var html = "";
      $('#setorModal').html(html);

      $.ajax({
        url: "/listarSetores",
        method: 'GET',
      }).done(function(result) {
        $.each(result, function(a, b) {
          if(b.id == id){
            html += '<option value="' + b.id + '" selected>' + b.nome + '</option>';
          }else{
            html += '<option value="' + b.id + '">' + b.nome + '</option>';
          }
        });
        $('#setorModal').html(html);
      });
    }

    function montaFuncaoModal(id) {
      var html = "";
      $('#funcaoModal').html(html);

      $.ajax({
        url: "/listarFuncoes",
        method: 'GET',
      }).done(function(result) {
        $.each(result, function(a, b) {
          if(b.id == id){
            html += '<option value="' + b.id + '" selected>' + b.nome + '</option>';
          }else{
            html += '<option value="' + b.id + '">' + b.nome + '</option>';
          }
        });
        $('#funcaoModal').html(html);
      });
    }

    function montaEspecialidadeModal(id) {
      var html = "";
      $('#especialidadeModal').html(html);

      $.ajax({
        url: "/listarEspecialidades",
        method: 'GET',
      }).done(function(result) {
        $.each(result, function(a, b) {
          if(b.id == id){
            html += '<option value="' + b.id + '" selected>' + b.nome + '</option>';
          }else{
            html += '<option value="' + b.id + '">' + b.nome + '</option>';
          }
        });
        $('#especialidadeModal').html(html);
      });
    }

    function montaBancoModal(id) {
      var html = "";
      $('#bancoModal').html(html);

      $.ajax({
        url: "/listarBancos",
        method: 'GET',
      }).done(function(result) {
        $.each(result, function(a, b) {
          if(b.id == id){
            html += '<option value="' + b.cod + '" selected>' + b.cod + '-' + b.nome + '</option>';
          }else{
            html += '<option value="' + b.cod + '">' + b.cod + '-' + b.nome + '</option>';
          }
        });
        $('#bancoModal').html(html);
      });
    }
  </script>
  @endsection