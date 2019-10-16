@extends('vendor.menu')
@section('content')
<div class="container">
    <div class="row justify-content-center">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Controle de Jogadores
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addAlunoModal">
                        Adicionar aluno 
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
                                        <a class="nav-link" onclick="(confirm('Você realmente deseja deletar o(a) aluno(a) \'{{$aluno->name}}\'? ')) ? window.location.href =  '{{ url('admin/deletar-aluno/'.$aluno->id.'/'.$id) }}' : window.location.reload(forcedReload);">
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
                    <button type="button" class="close bg-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                    <div class="modal-body">
                        <input type="hidden" name="sala_id" id="sala_id" value="{{$id}}">
                         <div class="form-group" style="margin-top:3.5%">
                            <label for="user_id" display="inline">Escolha o aluno a ser adicionado:</label>

                         <input id="search" name="search" type="text" class="fa fa-search" style="width: 60%; height: 40px ; border-radius: 5px;">

                         <table class="table container-fluid">
                                <thead >
                                    <tr>
                                        <th scope="col"> Id: </th>
                                        <th scope="col"> Nome: </th>
                                        <th scope="col"> Email: </th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                
                            <div class="tab-content" id="divtabela">
                            </div>

                            </table> 

                           

                        </div>
                    </div>

                      <div class="row justify-content-center">
                          <nav aria-label="...">
                            <ul class="pagination justify-content-center">
                              
                              
                            </ul>
                          </nav>
                        </div>

                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                        <button type="submit" class="btn btn-success">Adicionar aluno</button>


                    </div>
                
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

<!------------------------------------ Modal 2--------------------->



<!--
<div class="modal fade" id="grupomodal" role="dialog" aria-labelledby="Modal grupo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content " >
      <div class="modal-header" style="background-color:#2F4F4F;" >
        <h5 > Adicionar Grupo</h5>
        
      </div>

  <!--     <form method="POST" action="{{ url('/admin/grupo') }}">
         @csrf

      <div class="modal-body" >
        <h5> Digite o nome do grupo:</h5>
        <input name="group"placeholder="NOME GRUPO">
         
          <h5> Vincular Alunos ao Grupo </h5>
          <input name="alunosearch" id="alunosearch" value="" placeholder="NOME DO ALUNO"> 
          <button class="btn btn-sm bg-primary" onclick="buscaraluno()"> Buscar</button>


          
      
        </div>
        <div class="modal-footer">
          <a class="btn btn-outline-dark" data-dismiss="modal">Close</a>
          <button type="submit" class="btn btn-outline-success">Save changes</button>
        </div>
     <!-- </form> 
    </div>
  </div>
</div>
-->

@endsection