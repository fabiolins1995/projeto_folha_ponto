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
          <label for="colaborador" class="form-label">Colaborador </label>
          <input type="text" id="colaborador" name="colaborador" class="form-control">
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
          <label for="cpf" class="form-label">CPF </label>
          <input type="number" id="cpf" name="cpf" class="form-control">
        </div>
        <div class="col-md-12" style="float:left;margin-top:15px;">
          <button type="button" style="float:right;" onclick="listarColaboradores()" class="btn btn-primary">
            Pesquisar <i class="fas fa-search"></i>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Tabela de colaboradores</h3>

    <div class="card-tools">
      <div class="input-group input-group-sm" style="width: 150px;">
      </div>
    </div>
  </div>
  <!-- /.card-header -->
  <div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap">
      <thead>
        <tr>
          <th>Nome</th>
          <th>CPF</th>
          <th>Função</th>
          <th>E-mail</th>
          <th>Telefone</th>
          <th>Nº Conselho</th>
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
          <input type="hidden" name="idModal" id="idModal" value="" />
          <div class="card-body">
            <div class="form-group">
              <label for="nome">Nome</label>
              <input type="text" name="nome" id="nomeModal" class="form-control" placeholder="Nome">
            </div>
            <div class="form-group">
              <label for="telefone">Telefone</label>
              <input type="number" name="telefone" id="telefoneModal" class="form-control" placeholder="Telefone" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "13">
            </div>
            <div class="form-group">
              <label for="telefone">E-mail</label>
              <input type="email" name="email" id="emailModal" class="form-control" placeholder="E-mail">
            </div>
            <div class="form-group">
              <label for="cpf">CPF</label>
              <input type="number" name="cpf" id="cpfModal" class="form-control" placeholder="CPF" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "11">
            </div>
            <div class="form-group">
              <label for="equipe">Equipe</label>
              <div class="input-group">
                <select class="form-control" name="equipe" id="equipeModal" placeholder="Equipe">
                  <option value=""></option>
                </select>
              </div>
            </div>
            <div class="form-group">
              <label for="local">Local</label>
              <div class="input-group">
                <select class="form-control" name="local" id="localModal" placeholder="Local">
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
                <select class="form-control" name="setor" id="setorModal" placeholder="Setor">
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
                <select class="form-control" name="funcao" id="funcaoModal" placeholder="Função">
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
                <select class="form-control" name="especialidade" id="especialidadeModal" placeholder="Especialidade">
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
                <select class="form-control" name="banco" id="bancoModal" placeholder="Banco">
                  <option value=""></option>
                </select>
                <div class="input-group-append">
                  <span class="input-group-text"><i class="fas fa-plus-square" onclick="addBanco();"></i></span>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label for="numero_agencia">Agência</label>
              <input type="text" name="numero_agencia" id="agenciaModal" class="form-control" placeholder="Número da agência" maxlength = "10">
            </div>
            <div class="form-group">
              <label for="numero_conta">Conta</label>
              <input type="text" name="numero_conta" id="contaModal" class="form-control" placeholder="Número da conta" maxlength = "20">
            </div>
            <div class="form-group">
              <label for="tipo_de_conta">Tipo</label>
              <input type="text" name="tipo_de_conta" id="tipoModal" class="form-control" placeholder="Tipo da conta">
            </div>
            <div class="form-group">
              <label for="chave_pix">Chave Pix</label>
              <input type="text" name="chave_pix" id="pixModal" class="form-control" placeholder="Chave Pix">
            </div>
            <div class="form-group">
              <label for="data_entrada">Data Entrada</label>
              <input type="text" name="data_entrada" id="entradaModal" class="form-control datetimepicker">
            </div>
            <div class="form-group">
              <label for="data_afastamento">Data Afastamento</label>
              <input type="text" name="data_afastamento" id="afastamentoModal" class="form-control datetimepicker">
            </div>
            <div class="form-group">
              <label for="motivo_afastamento">Motivo Afastamento</label>
              <input type="text" name="motivo_afastamento" id="motivoModal" class="form-control" placeholder="Motivo Afastamento">
            </div>
            <div class="form-group">
              <label for="conselho">Nº Conselho</label>
              <input type="number" name="conselho" id="conselhoModal" class="form-control" placeholder="Nº Conselho">
            </div>
            <div class="form-group">
              <label for="uf_conselho">UF Conselho</label>
              <input type="text" name="uf_conselho"  id="ufModal" class="form-control" placeholder="UF Conselho">
            </div>
            <div class="form-group">
              <label for="data_emissao_conselho">Data Emissão Conselhor</label>
              <input type="text" name="data_emissao_conselho" id="emissaoModal" class="form-control datetimepicker">
            </div>
            <div class="form-group">
              <label for="validade_conselho">Validade Conselho</label>
              <input type="text" name="validade_conselho" id="validadeModal" class="form-control datetimepicker">
            </div>
            <div class="form-group">
              <label for="titulo_eleitor">Título Eleitoral</label>
              <input type="number" name="titulo_eleitor" id="eleitorModal" class="form-control" placeholder="Título Eleitoral">
            </div>
            <div class="form-group">
              <label for="zona_eleitor">Zona Eleitoral</label>
              <input type="number" name="zona_eleitor" id="zonaModal" class="form-control" placeholder="Zona Eleitoral">
            </div>
            <div class="form-group">
              <label for="secao_eleitor">Seção Eleitoral</label>
              <input type="numer" name="secao_eleitor" id="secaoModal" class="form-control" placeholder="Seção Eleitoral">
            </div>
            <div class="form-group">
              <label for="data_emissao_eleitor">Data Emissão Título Eleitoral</label>
              <input type="text" name="data_emissao_eleitor" id="emissaoEleitorModal" class="form-control datetimepicker">
            </div>
            <div class="form-group">
              <label for="certificado_reservista">Certificado Reservista</label>
              <input type="text" name="certificado_reservista" id="reservistaModal" class="form-control" placeholder="Certificado Reservista">
            </div>
            <div class="form-group">
              <label for="cnh">CNH</label>
              <input type="text" name="cnh" id="cnhModal" class="form-control" placeholder="CNH">
            </div>
            <div class="form-group">
              <label for="setor">Tamanho Uniform</label>
              <div class="input-group">
                <select class="form-control" name="tamanho_uniforme" id="uniformeModal" placeholder="Tamanho Uniforme">
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
              <input type="text" name="data_nascimento" id="data_nascimentoModal" class="form-control datetimepicker">
            </div>
            <div class="form-group">
              <label for="idade">Idade</label>
              <input type="number" name="idade" id="idadeModal" class="form-control" placeholder="Idade">
            </div>
            <div class="form-group">
              <label for="naturalidade">Naturalidade</label>
              <input type="text" name="naturalidade" id="naturalidadeModal" class="form-control" placeholder="Naturalidade">
            </div>
            <div class="form-group">
              <label for="nacionalidade">Nacionalidade</label>
              <input type="text" name="nacionalidade" id="nacionalidadeModal" class="form-control" placeholder="nacionalidade">
            </div>
            <div class="form-group">
              <label for="estado_civil">Estado Civil</label>
              <input type="text" name="estado_civil" id="estadoCivilModal" class="form-control" placeholder="Estado Civil">
            </div>
            <div class="form-group">
              <label for="regime_casamento">Regime Casamento</label>
              <input type="text" name="regime_casamento" id="regimeModal" class="form-control" placeholder="Regime Casamento">
            </div>
            <div class="form-group">
              <label for="pai">Nome do Pai</label>
              <input type="text" name="pai" id="paiModal" class="form-control" placeholder="Nome do Pai">
            </div>
            <div class="form-group">
              <label for="mae">Nome da Mãe</label>
              <input type="text" name="mae" id="maeModal" class="form-control" placeholder="Nome da Mãe">
            </div>
            <div class="form-group">
              <label for="pis">PIS</label>
              <input type="text" name="pis" id="pisModal" class="form-control" placeholder="PIS">
            </div>
            <div class="form-group">
              <label for="identidade">Nº Identidade</label>
              <input type="number" name="identidade" id="identidadeModal" class="form-control" placeholder="N Identidade">
            </div>
            <div class="form-group">
              <label for="emissor_identidade">Orgão Emissor</label>
              <input type="text" name="emissor_identidade" id="emissorModal" class="form-control" placeholder="Orgão Emissor">
            </div>
            <div class="form-group">
              <label for="data_emissao">Data Emissão</label>
              <input type="text" name="data_emissao" id="dataEmissaoModal" class="form-control datetimepicker">
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
      $(function() {
        $('.datetimepicker').appendDtpicker({
          locale: 'br2'
        });
      });
      MontaColaborador();
      montaEquipeEquipe();
      montaFuncao();
      montaSetor();
      //listarColaboradores();
    });
    function listarColaboradores() {
      var html = '';
      $('#tabelaColaboradores').html(html);

      $.ajax({
        url: "/listarColaboradores?nome="+$('#colaborador').val()+"&funcao="+$('#funcao').val()+"&conselho="+$('#conselho').val()+"&cpf="+$('#cpf').val(),
        method: 'GET',
        async: false
      }).done(function(result) {
        $.each(result, function(a, b) {
          html += '<tr>';
          html += '<td>' + b.nomeAssociado + '</td>';
          html += '<td>' + b.cpf + '</td>';
          html += '<td>' + b.funcaoNome + '</td>';
          html += '<td>' + b.email + '</td>';
          html += '<td>' + b.telefone + '</td>';
          html += '<td>' + b.conselho + '</td>';

          html += `<td><i style="cursor:pointer" onclick="TabelaEdit(${b.id})" class="far fa-edit"></i> | <i style="cursor:pointer" onclick="TabelaDelete(${b.id})" class="far fa-trash-alt"></i></td>`;
          html += '</tr>';
        });
        $('#tabelaColaboradores').html(html);
      });
    }
    /**
     * Início funções de montagem do select
     */
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
      $('#idModal').val(id);
      $.ajax({
          url: "/listaColaborador?id=" + id,
          method: 'GET',
        }).done(function(result) {
          if (result == false) {
            swal("Error!", "Tente novamente, se persistir, contate o administrador", "error");
          }else{
            $.each(result, function (a, result){
              console.log(result)
              $("#idModal").val(result.id);
              $("#pixModal").val(result.chave_pix);
              $("#tipoModal").val(result.tipo_de_conta);
              $("#contaModal").val(result.numero_conta);
              $("#agenciaModal").val(result.numero_agencia);
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
              $('#entradaModal').val(result.data_entrada = "0000-00-00" ? null : result.data.entrada);
              $('#afastamentoModal').val(result.data_afastamento = "0000-00-00" ? null : result.data_afastamento);
              $('#motivoModal').val(result.motivo_afastamento);
              $('#conselhoModal').val(result.conselho);
              $('#ufModal').val(result.uf_conselho);
              $('#emissaoModal').val(result.data_emissao_conselho  = "0000-00-00" ? null : result.data_emissao_conselho);
              $('#validadeModal').val(result.validade_conselho  = "0000-00-00" ? null : result.validade_conselho);
              $('#eleitorModal').val(result.titulo_eleitor);
              $('#zonaModal').val(result.zona_eleitor);
              $('#secaoModal').val(result.secao_eleitor);
              $('#emissaoEleitorModal').val(result.data_emissao_eleitor  = "0000-00-00" ? null : result.data_emissao_eleitor);
              $('#reservistaModal').val(result.certificado_reservista);
              $('#cnhModal').val(result.cnh);
              $('#uniformeModal').val(result.tamanho_uniform);
              $('#data_nascimentoModal').val(result.data_nascimento  = "0000-00-00" ? null : result.data_nascimento);
              $('#idadeModal').val(result.idade);
              $('#naturalidadeModal').val(result.naturalidade);
              $('#nacionalidadeModal').val(result.nacionalidade);
              $('#estadoCivilModal').val(result.estado_civil);
              $('#regimeModal').val(result.regime_casamento);
              $('#paiModal').val(result.pai);
              $('#maeModal').val(result.mae);
              $('#pisModal').val(result.pis);
              $('#identidadeModal').val(result.identidade);
              $('#emissorModal').val(result.emissor_identidade  = "0000-00-00" ? null : result.emissor_identidade);
              $('#dataEmissaoModal').val(result.data_emissao  = "0000-00-00" ? null : result.data_emissao);
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