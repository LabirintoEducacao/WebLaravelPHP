@extends('vendor.menu')
@section('content')
<div class="container">
    <div class="row justify-content-center">

      <input type="hidden" value="{{Auth::user()->id}}" id="user_id">
      <input type="hidden" value="{{$id}}" id="id_sala">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Controle de Jogadores
                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addAlunoModal">
                        Adicionar aluno 
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

                      
                  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                      <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#alunos" role="tab" aria-controls="pills-home" aria-selected="true">Alunos </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#grupos" role="tab" aria-controls="pills-profile" aria-selected="false" onclick="mostrargrupos()">Grupos</a>
                    </li>
                  </ul>

                    <button type="button" class="close bg-primary" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                    <div class="modal-body ">
                       <div class="row container">
                          <input type="hidden" name="sala_id" id="sala_id" value="{{$id}}">
                         <div class="form-group" style="margin-top:3.5%">
                            <label for="user_id" display="inline">Escolha o aluno a ser adicionado:</label>
                                   <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addNovoAlunoModal">
                        Enviar Convite
                                  </button>
                       </div>
                        </div>
                       
                       <div class="row container">

                        <h5> Pesqusiar: </h5>
                         <input id="search" name="search" type="text" class="fa fa-search" style="width: 60%; height: 40px ; border-radius: 5px;margin-left: 10px;">
                       </div>
                         <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="alunos" role="tabpanel" aria-labelledby="pills-home-tab">

                              <div class=" table-responsive " id="divtabelaaluno">
                         
                              </div>

                              <div class="row justify-content-center">
                          <nav aria-label="...">
                            <ul id ="teste" class="pagination justify-content-center">  
                               
                            </ul>
                          </nav>
                        </div>

                          </div>



                            <div class="tab-pane fade show active" id="grupos" role="tabpanel" aria-labelledby="pills-home-tab">

                              <div class=" table-responsive " id="divtabelagrupo">
                         
                              </div>
                              
                          </div>

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




<div class="modal fade" id="grupomodal" role="dialog" aria-labelledby="Modal grupo" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content " >
      <div class="modal-header" style="background-color:#2F4F4F;" >
        <h5 > Adicionar Grupo</h5>
        
      </div>

   <form method="POST" action="{{ url('/admin/grupo') }}">
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
     </form>  
    </div>
  </div>
</div>


@endsection


