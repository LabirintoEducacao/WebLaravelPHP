@extends('vendor.menu')

@section('content')
<!------------------------ Cabeçalho ------------------------>
<div class="container-fluid">


<!------------------------ Espaço das Salas  --------------------------->
    <div style="margin-top:2%;">
  <form action="{{ url('admin/aluno') }}" method="POST" style="float:left;">
    @csrf
    {{ csrf_field() }}
    <div class="row">
      <input type="hidden" value="{{$id}}" name="sala_id" class="col">
<!--      <em>Escolha o aluno a ser adicionado</em>&emsp;-->
      <select data-placeholder="Escolha o aluno a ser adicionado..." class="chosen-select col" tabindex="2" display="inline" name="user_id" onchange="selecionado()">
        <option value=""></option>
        @foreach($alunos as $aluno)
          @if($aluno->hasAnyRole('user'))
            <option value="{{$aluno->id}}">{{$aluno->email}}</option>
          @endif
        @endforeach
      </select>
      &nbsp;<button type="submit" class="btn btn-outline-success" class="col">Adicionar</button>
    </div>
  </form>&emsp;&nbsp;
  <button type="button" class="btn btn-outline-cyan" data-toggle="modal" data-target="#alunoModal">Aluno ainda não cadastrado</button>



<!--botao modal-->


  <button class="btn btn-md bg-primary" data-toggle="modal" data-target="#grupomodal"> Cadastrar Grupos</button>



</div>

  <div class="col-md-12" style="padding-top:20px;">
    <div class="card">
      <table class="row">
        <tr>
          <th class="col">Nome</th>
          <th class="col">Email</th>
          <!-- <th class="col-md-3">Resposta</th> -->
          <th class="col"></th>
        </tr>

        @foreach($data as $item)
          @if($item->sala_id==$id)
            <tr>
              <td class="col">{{$item->name}}</td>
              <td class="col">{{$item->email}}</td>
              <td class="col">
                <a href="{{ url('admin/deletar-aluno/'.$item->id.'/'.$id) }}" class="btn btn-outline-danger fa fa-trash"></a>
              </td>
            </tr>
          @endif
        @endforeach

        
      </table>
    </div>
  </div>

</div>




<div class="modal fade" id="alunoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content " >
      <div class="modal-header" style="background-color:#2F4F4F;" >
        <h5 class="modal-title"></h5>
        <h5 style="  font-size: 20px;  margin-left:250px;  color:#ffffff;
        "  id="exampleModalScrollableTitle">Cadastrar Aluno</h5>

      </div>
      <form method="POST" action="{{ url('/admin/new/email') }}">
        <input type="hidden" value="{{$id}}" name="sala_id">
        <div class="modal-body" >
          @csrf
          <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail') }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          
          
      
        </div>
        <div class="modal-footer">
          <a class="btn btn-outline-dark" data-dismiss="modal">Close</a>
          <button type="submit" class="btn btn-outline-success">Save changes</button>
        </div>
      </form>
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

  <!--     <form method="POST" action="{{ url('/admin/grupo') }}"> -->
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
     <!--  </form> -->
    </div>
  </div>
</div>


@endsection