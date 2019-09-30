@extends('vendor.menu')
@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Controle de Jogadores
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addAlunoModal">
                        Adicionar aluno já cadastrado
                    </button>
                      <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addNovoAlunoModal">
                        Adicionar aluno não cadastrado
                    </button>
                      </h4>
                  <p class="card-category"></p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>
                          Nome
                        </th>
                        <th>
                          E-mail
                        </th>
                        <th>
                            Remover
                        </th>
                      </thead>
                      <tbody>
             
                            @foreach($data as $aluno)
                                <tr>
                                    <td>{{$aluno->name}}</td>
                                    <td>
                                      {{$aluno->email}}
                                    
                                    </td>
                                    <td>
                                        <a class="nav-link" href="{{ url('admin/deletar-aluno/'.$aluno->id.'/'.$id) }}">
                                          <i class="material-icons">clear</i>

                                        </a>
                                    </td>
                                </tr>
                            @endforeach
              
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="addAlunoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar aluno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/aluno') }}" method="POST" style="margin-left: 5%;margin-right:1%;margin-top:3%">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="sala_id" id="sala_id" value="{{$id}}">
                         <div class="form-group" style="margin-top:3.5%">
                            <label for="user_id" display="inline">Escolha o aluno a ser adicionado:</label>
                            <select placeholder="Escolha o aluno a ser adicionado..." class="chosen-select col" tabindex="2" display="inline" name="user_id" id="user_id" onchange="selecionado()">
                                <option value=""></option>
                                @foreach($alunos as $aluno)

                                    <option value="{{$aluno->id}}">{{$aluno->email}}</option>

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                        <button type="submit" class="btn btn-success">Adicionar aluno</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="addNovoAlunoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar aluno</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('/admin/new/email') }}" method="POST" style="margin-left: 5%;margin-right:1%;margin-top:3%">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="sala_id" id="sala_id" value="{{$id}}">
                        <div class="form-group" style="margin-top:3.5%">
                            <label for="email" display="inline">E-mail do aluno</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                        <button type="submit" class="btn btn-success">Enviar convite</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
