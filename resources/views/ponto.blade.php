@extends('adminlte::page')

@section('content')
<form>
  <fieldset>
    <div class="mb-3">
      <label for="TextInput" class="form-label"> Data e hora</label>
      <input type="text" id="TextInput" class="form-control" placeholder=" 21/11/2021 17:00" disabled>
    </div>
    <div class="mb-3">
      <label for="TextInput" class="form-label"> Observações</label>
      <input type="text" id="TextInput" class="form-control" placeholder="">
    </div>
    <button type="submit" class="btn btn-primary">Registrar ponto</button>
  </fieldset>
</form>
@endsection