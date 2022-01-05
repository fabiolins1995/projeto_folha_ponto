@extends('adminlte::page')

@section('content')
<form method="post" action="/registrarHoraExtra" accept-charset="UTF-8">
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
      <label for="hora" class="form-label"> Hora Extra</label>
      <input type="text" id="hora" name="hora" class="form-control" />
    </div>
   <!-- <div class="mb-3">
      <label for="obs" class="form-label"> Observações</label>
      <input type="text" id="obs" name="obs" class="form-control" placeholder="">
    </div>-->
    <button type="submit" class="btn btn-primary">Registrar hora extra</button>
  </fieldset>
</form>
<script>

    window.addEventListener('load', function() {
      montaAssociado();
      $('#associado').on('change',function(){
        montaData();
      });
      $('#hora').appendDtpicker({
        locale: 'ho'
      });
    });
    function montaAssociado(){
        html = '';
        $.ajax({
        url: "/listarColaboradores",
        method: 'GET',
        async: false
        }).done(function(result) {
          html +='<option value="">Selecione</option>';
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
          html +='<option value="">Selecione</option>';
            $.each(result, function(a, b) {
                html += '<option value="' + b.id + '">' + b.horario_escala_entrada + '</option>';
            });
        });
        $('#data').html(html);
    }
</script>
@endsection