@extends('vendor.page')

@section('content')
<!------------------------ Cabeçalho ------------------------>
<div class="container-fluid">


<!------------------------ Espaço das Salas  --------------------------->
  <form action="{{ url('admin/aluno') }}" method="POST" class="col-md-8">
    @csrf
    {{ csrf_field() }}
    <div>
      <input type="hidden" value="{{$id}}" name="sala_id">
<!--      <em>Escolha o aluno a ser adicionado</em>&emsp;-->
      <select data-placeholder="Escolha o aluno a ser adicionado..." class="chosen-select" tabindex="2" display="inline" name="user_id" onchange="selecionado()">
        <option value=""></option>
        @foreach($alunos as $aluno)
          @if($aluno->hasAnyRole('user'))
            <option value="{{$aluno->id}}">{{$aluno->email}}</option>
          @endif
        @endforeach
      </select>
      <button type="submit" class="btn btn-outline-success">Adicionar</button>
    </div>
  </form>
  <span class="col-md-1"></span>
  <button type="button" class="btn btn-outline-cyan col-md-3" data-toggle="modal" data-target="#alunoModal" display="inline">Aluno ainda não cadastrado</button>


  <div class="col-md-12" style="padding-top:20px;">
    <div class="card">
      <table>
        <tr>
          <th class="col-md-3">Nome</th>
          <th class="col-md-3">Email</th>
          <!-- <th class="col-md-3">Resposta</th> -->
          <th class="col-md-3"></th>
        </tr>

        @foreach($data as $item)
          @if($item->sala_id==$id)
            <tr>
              <td class="col-md-3">{{$item->name}}</td>
              <td class="col-md-3">{{$item->email}}</td>
              <td>
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


@endsection