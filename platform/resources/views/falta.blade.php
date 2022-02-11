@extends('adminlte::page')

@section('content')
<form method="post" action="/registrarFalta" accept-charset="UTF-8">
  <fieldset>
    <div class="mb-3">
      <label for="associado" class="form-label"> Colaborador</label>
      <select id="associado" name="associado" class="form-control"></select>
    </div>
    <div class="mb-3">
      <label for="data" class="form-label"> Data</label>
      <select id="data" name="data" class="form-control"></select>
    </div>
    <div class="mb-3">
      <label for="motivo" class="form-label"> Motivo da falta</label>
      <select id="motivo" name="motivo" class="form-control">
        <option value="">Selecione</option>
        <option value="1">Atestado</option>
        <option value="2">Permuta</option>
        <option value="3">Passagem de CH</option>
      </select>
    </div>
    <div class="mb-3">
      <label for="obs" class="form-label"> Observações</label>
      <input type="text" id="obs" name="obs" class="form-control" placeholder="">
    </div>
    <button type="submit" class="btn btn-primary">Registrar falta</button>
  </fieldset>
</form>
<script>
    window.addEventListener('load', function() {
      montaAssociado();
      $('#associado').on('change',function(){
        montaData();
      });
    });
    function montaAssociado(){
        html = '';
        $.ajax({
        url: "/listarColaboradores",
        method: 'GET',
        async: false
        }).done(function(result) {
          html += '<option value="">Selecione</option>'
            $.each(result, function(a, b) {
                html += '<option value="' + b.id + '">' + b.nomeAssociado + '</option>';
            });
        });
        $('#associado').html(html);
    }
    function montaData(){
        html = '';
        $.ajax({
        url: "/listarDatas?id="+$('#associado').val(),
        method: 'GET',
        async: false
        }).done(function(result) {
          html += '<option value="">Selecione</option>'
            $.each(result, function(a, b) {
                html += '<option value="' + b.id + '">' + b.horario_escala_entrada + '</option>';
            });
        });
        $('#data').html(html);
    }
</script>
@endsection