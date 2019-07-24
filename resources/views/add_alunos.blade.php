@extends('adminlte::page')

@section('content')
<!------------------------ Cabeçalho ------------------------>
<div class="container-fluid">


<!------------------------ Espaço das Salas  --------------------------->
  <form action="{{ url('admin/aluno') }}" method="POST">
    @csrf
    {{ csrf_field() }}
    <div>
      <input type="hidden" value="{{$id}}" name="sala_id">
<!--      <em>Escolha o aluno a ser adicionado</em>&emsp;-->
      <select data-placeholder="Escolha o aluno a ser adicionado..." class="chosen-select" tabindex="2" display="inline" name="user_id" onchange="selecionado()">
        <option value=""></option>
        @foreach($alunos as $aluno)
          @if($aluno->hasAnyRole('user'))
            <option value="{{$aluno->id}}">{{$aluno->name}}</option>
          @endif
        @endforeach
      </select>
      <button type="submit" class="btn btn-outline-success">Adiconar</button>
    </div>
  </form>

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


@endsection