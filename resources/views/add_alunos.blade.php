@extends('vendor.menu')
@section('content')
<div class="container">
  <div class="row justify-content-center">
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
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#alunos" role="tab" aria-controls="pills-home" aria-selected="true">Alunos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#grupos" role="tab" aria-controls="pills-profile" aria-selected="false">Grupos</a>
            </li>
            
          </ul>

          

          <button type="button" class="close " data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
         <div class="row">
          <input type="hidden" id="user_id" value="{{Auth::user()->id}}">
          <input type="hidden" name="sala_id" id="sala_id" value="{{$id}}">
          <div class="form-group" style="margin-top:3.5%">
            <div class="container">
              <label for="user_id" display="inline">Escolha o aluno a ser adicionado:</label>
              <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#addNovoAlunoModal">
                Enviar Convite
              </button>
                
            </div>
          </div>
        </div>

        <div class="row container">
          <h5> Pesqusiar: </h5>
          <input id="search" name="search" type="text" class="fa fa-search" style="width: 60%; height: 40px ; border-radius: 5px;">
        </div>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="alunos" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="tab-content" id="divtabela">

            </div>
            <div class="row justify-content-center">
              <nav aria-label="Paginação">
                <ul class="pagination justify-content-center">  

                </ul>
              </nav>
            </div>
          </div>
          <div class="tab-pane fade " id="grupos" role="tabpanel" aria-labelledby="nav-home-tab">
            
           <div class="tab-content" id="divtabelagrupo">

           


           

           </div>
         </div>
      
     <div class="modal-footer">
      <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
      <button type="submit" class="btn btn-success" data-dismiss="modal">salvar</button>


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



@endsection
