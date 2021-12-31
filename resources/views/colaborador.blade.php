@extends('adminlte::page')

@section('content')
<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registro colaborador</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nome</label>
                    <input type="text" name="nomeColaborador" class="form-control" id="exampleInputEmail1" placeholder="Nome">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Endereço</label>
                    <input type="text" name="enderecoColaborador" class="form-control" id="exampleInputEmail1" placeholder="Endereço">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Equipe</label>
                    <select class="form-control" name="equipeColaborador" id="exampleInputEmail1" placeholder="Equipe">
                    <option value=""></option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Função</label>
                    <select class="form-control" name="funcaoColaborador" id="exampleInputEmail1" placeholder="Função">
                    <option value=""></option>
                    </select>
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
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Colaborador</th>
                      <th>Endereço</th>
                      <th>Equipe</th>
                      <th>Função</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>183</td>
                      <td>Fulano 1</td>
                      <td>End 1</td>
                      <td>Equipe 1</td>
                      <td>Função 1</td>
                      <td><i class="far fa-edit"></i> | <i class="far fa-trash-alt"></i></td>
                    </tr>
                    <tr>
                      <td>219</td>
                      <td>Fulano 2</td>
                      <td>End 2</td>
                      <td>Equipe 2</td>
                      <td>Função 2</td>
                      <td><i class="far fa-edit"></i> | <i class="far fa-trash-alt"></i></td>
                    </tr>
                    <tr>
                      <td>657</td>
                      <td>Fulano 3</td>
                      <td>End 3</td>
                      <td>Equipe 3</td>
                      <td>Função 3</td>
                      <td><i class="far fa-edit"></i> | <i class="far fa-trash-alt"></i></td>
                    </tr>
                    <tr>
                      <td>175</td>
                      <td>Fulano 4</td>
                      <td>End 4</td>
                      <td>Equipe 4</td>
                      <td>Função 4</td>
                      <td><i class="far fa-edit"></i> | <i class="far fa-trash-alt"></i></td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
@endsection