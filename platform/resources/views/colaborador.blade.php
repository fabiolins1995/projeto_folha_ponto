@extends('adminlte::page')

@section('content')
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Registro colaborador</h3>
  </div>
  <form method="post" id="enviaColaborador" action="/salvarColaborador" accept-charset="UTF-8">
    @csrf
    <div class="card-body">
      <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" name="nome" class="form-control" placeholder="Nome">
      </div>
      <div class="form-group">
        <label for="telefone">Telefone</label>
        <input type="number" name="telefone" id="telefone" class="form-control" placeholder="Telefone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "13">
      </div>
      <div class="form-group">
        <label for="telefone">E-mail</label>
        <input type="email" name="email" id="email" class="form-control" placeholder="E-mail">
      </div>
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="number" name="cpf" id="cpf" class="form-control" placeholder="CPF" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11">
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
        <input type="text" name="numero_agencia" id="agencia" class="form-control" placeholder="Número da agência" maxlength = "10">
      </div>
      <div class="form-group">
        <label for="numero_conta">Conta</label>
        <input type="text" name="numero_conta" id="conta" class="form-control" placeholder="Número da conta" maxlength = "20">
      </div>
      <div class="form-group">
        <label for="tipo_de_conta">Tipo</label>
        <input type="text" name="tipo_de_conta" class="form-control" placeholder="Tipo da conta">
      </div>
      <div class="form-group">
        <label for="chave_pix">Chave Pix</label>
        <input type="text" name="chave_pix" class="form-control" placeholder="Chave Pix">
      </div>
      <div class="form-group">
        <label for="data_entrada">Data Entrada</label>
        <input type="text" name="data_entrada" class="form-control datetimepicker">
      </div>
      <div class="form-group">
        <label for="data_afastamento">Data Afastamento</label>
        <input type="text" name="data_afastamento" class="form-control datetimepicker">
      </div>
      <div class="form-group">
        <label for="motivo_afastamento">Motivo Afastamento</label>
        <input type="text" name="motivo_afastamento" class="form-control" placeholder="Motivo Afastamento">
      </div>
      <div class="form-group">
        <label for="conselho">Nº Conselho</label>
        <input type="number" name="conselho" id="conselho" class="form-control" placeholder="Nº Conselho">
      </div>
      <div class="form-group">
        <label for="uf_conselho">UF Conselho</label>
        <input type="text" name="uf_conselho" class="form-control" placeholder="UF Conselho">
      </div>
      <div class="form-group">
        <label for="data_emissao_conselho">Data Emissão Conselhor</label>
        <input type="text" name="data_emissao_conselho" class="form-control datetimepicker">
      </div>
      <div class="form-group">
        <label for="validade_conselho">Validade Conselho</label>
        <input type="text" name="validade_conselho" class="form-control datetimepicker">
      </div>
      <div class="form-group">
        <label for="titulo_eleitor">Título Eleitoral</label>
        <input type="number" name="titulo_eleitor" class="form-control" placeholder="Título Eleitoral">
      </div>
      <div class="form-group">
        <label for="zona_eleitor">Zona Eleitoral</label>
        <input type="number" name="zona_eleitor" class="form-control" placeholder="Zona Eleitoral">
      </div>
      <div class="form-group">
        <label for="secao_eleitor">Seção Eleitoral</label>
        <input type="numer" name="secao_eleitor" class="form-control" placeholder="Seção Eleitoral">
      </div>
      <div class="form-group">
        <label for="data_emissao_eleitor">Data Emissão Título Eleitoral</label>
        <input type="text" name="data_emissao_eleitor" class="form-control datetimepicker">
      </div>
      <div class="form-group">
        <label for="certificado_reservista">Certificado Reservista</label>
        <input type="text" name="certificado_reservista" class="form-control" placeholder="Certificado Reservista">
      </div>
      <div class="form-group">
        <label for="cnh">CNH</label>
        <input type="text" name="cnh" class="form-control" placeholder="CNH">
      </div>
      <div class="form-group">
        <label for="setor">Tamanho Uniform</label>
        <div class="input-group">
          <select class="form-control" name="tamanho_uniforme" placeholder="Tamanho Uniforme">
            <option value="">Selecione</option>
            <option value="PP">PP</option>
            <option value="P">P</option>
            <option value="M">M</option>
            <option value="G">G</option>
            <option value="GG">GG</option>
            <option value="XGG">XGG</option>
          </select>
        </div>
      </div>
      <div class="form-group">
        <label for="data_nascimento">Data Nascimentol</label>
        <input type="text" name="data_nascimento" id="data_nascimento" class="form-control datetimepicker">
      </div>
      <div class="form-group">
        <label for="idade">Idade</label>
        <input type="number" name="idade" class="form-control" placeholder="Idade">
      </div>
      <div class="form-group">
        <label for="naturalidade">Naturalidade</label>
        <input type="text" name="naturalidade" class="form-control" placeholder="Naturalidade">
      </div>
      <div class="form-group">
        <label for="nacionalidade">Nacionalidade</label>
        <input type="text" name="nacionalidade" class="form-control" placeholder="nacionalidade">
      </div>
      <div class="form-group">
        <label for="estado_civil">Estado Civil</label>
        <input type="text" name="estado_civil" class="form-control" placeholder="Estado Civil">
      </div>
      <div class="form-group">
        <label for="regime_casamento">Regime Casamento</label>
        <input type="text" name="regime_casamento" class="form-control" placeholder="Regime Casamento">
      </div>
      <div class="form-group">
        <label for="pai">Nome do Pai</label>
        <input type="text" name="pai" class="form-control" placeholder="Nome do Pai">
      </div>
      <div class="form-group">
        <label for="mae">Nome da Mãe</label>
        <input type="text" name="mae" class="form-control" placeholder="Nome da Mãe">
      </div>
      <div class="form-group">
        <label for="pis">PIS</label>
        <input type="text" name="pis" class="form-control" placeholder="PIS">
      </div>
      <div class="form-group">
        <label for="identidade">Nº Identidade</label>
        <input type="number" name="identidade" class="form-control" placeholder="N Identidade">
      </div>
      <div class="form-group">
        <label for="emissor_identidade">Orgão Emissor</label>
        <input type="text" name="emissor_identidade" class="form-control" placeholder="Orgão Emissor">
      </div>
      <div class="form-group">
        <label for="data_emissao">Data Emissão</label>
        <input type="text" name="data_emissao" class="form-control datetimepicker">
      </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
      <button type="button" class="btn btn-primary" onclick="checkInput()">Salvar</button>
    </div>
  </form>
</div>

  <script>
    window.addEventListener('load', function() {
      
      $(function() {
        $('.datetimepicker').appendDtpicker({
          locale: 'br2'
        });
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
     * Função verifica campos obrigatórios
     */
    function checkInput() {
      $check = true;
      $cpf = $('#cpf').val();
      $conselho = $('#conselho').val();
      $funcao = $('#funcao').val();
      $email = $('#email').val();
      $telefone = $('#telefone').val();
      $banco = $('#banco').val();
      $agencia = $('#agencia').val();
      $conta = $('#conta').val();

      if ($cpf == '' || $conselho == '' || $funcao == '' || $email == '' || $telefone == '' || $banco == '' || $agencia == '' || $conta == ''){
        $check = false;
        checkCampos()
      } else if ($check == true) {
        $('#enviaColaborador').submit();
      }
    }
    function checkCampos() {
      $('.retypeWord').remove();
      $('.retype').css({"border": "1px solid lightgrey"})

      $cpf = $('#cpf').val();
      $conselho = $('#conselho').val();
      $funcao = $('#funcao').val();
      $email = $('#email').val();
      $telefone = $('#telefone').val();
      $banco = $('#banco').val();
      $agencia = $('#agencia').val();
      $conta = $('#conta').val();

      $div = '<span style="color:red;" class="retypeWord">Favor preencher este campo</span>';

      alert('Favor preencher os campos indicados em vermelho')
        if ($cpf == '') {
          $('#cpf').before($div).css({"border": "1px solid red"}).addClass('retype');
        }
        if ($conselho == '') {
          $('#conselho').before($div).css({"border": "1px solid red"}).addClass('retype');
        }
        if ($funcao == '') {
          $('#funcao').before($div).css({"border": "1px solid red"}).addClass('retype');
        }
        if ($email == '') {
          $('#email').before($div).css({"border": "1px solid red"}).addClass('retype');
        }
        if ($telefone == '') {
          $('#telefone').before($div).css({"border": "1px solid red"}).addClass('retype');
        }
        if ($banco == '') {
          $('#banco').before($div).css({"border": "1px solid red"}).addClass('retype');
        }
        if ($agencia == '') {
          $('#agencia').before($div).css({"border": "1px solid red"}).addClass('retype');
        }
        if ($conta == '') {
          $('#conta').before($div).css({"border": "1px solid red"}).addClass('retype');
        }
        $('.retype').on('keypress', function (e) {
          if(e.target.className != "form-control"){
            e.target.className = "form-control";
            $(e.target).css({"border": "1px solid lightgrey"})
            e.target.previousSibling.remove();
          }
        })

    }
    /**
     * Função monta tabela
     */
    function listarColaboradores() {
      var html = '';
      $('#tabelaColaboradores').html(html);

      $.ajax({
        url: "/listarColaboradores",
        method: 'GET',
        async: false
      }).done(function(result) {
        $.each(result, function(a, b) {
          html += '<tr>';
          html += '<td>' + b.nomeAssociado + '</td>';
          html += '<td>' + b.localNome + '</td>';
          html += '<td>' + b.setorNome + '</td>';
          html += '<td>' + b.funcaoNome + '</td>';
          html += '<td>' + b.especialidadeNome + '</td>';
          $.ajax({
            url: 'pegaTotalHorasColaborador?id=' + b.id,
            async: false
          }).done(function(data){
            $.each(data, function(c, d) {
              html += '<td>'+ d.Total + '</td>';
            });                        
          })
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
              $("#idModal").val(result.id);
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
    function searchTable(){
      var html = '';
      $('#tabelaColaboradores').html(html);
      $.ajax({
        url: "/listarColaboradoresPorNome?nome=" + $('#table_search').val(),
        method: 'GET',
        async: false
      }).done(function(result) {
        $.each(result, function(a, b) {
          html += '<tr>';
          html += '<td>' + b.nomeAssociado + '</td>';
          html += '<td>' + b.localNome + '</td>';
          html += '<td>' + b.setorNome + '</td>';
          html += '<td>' + b.funcaoNome + '</td>';
          html += '<td>' + b.especialidadeNome + '</td>';
          $.ajax({
            url: 'pegaTotalHorasColaborador?id=' + b.id,
            async: false
          }).done(function(data){
            $.each(data, function(c, d) {
              html += '<td>'+ d.Total + '</td>';
            });                        
          })
          html += `<td><i style="cursor:pointer" onclick="TabelaEdit(${b.id})" class="far fa-edit"></i> | <i style="cursor:pointer" onclick="TabelaDelete(${b.id})" class="far fa-trash-alt"></i></td>`;
          html += '</tr>';
        });
        $('#tabelaColaboradores').html(html);
      });
    }
  </script>
  @endsection