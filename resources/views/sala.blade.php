@extends('adminlte::page')

@section('content')
<!------------------------ Cabeçalho ------------------------>
<div class="container-fluid" style="border-bottom: solid; ">
    <div class="row">
        <div class="col-md-8 ">
            <h1> Controle de Salas </h1>
        </div>
        <div class="col-md-2" style="padding-top: 30px; ">
        <a class="btn btn-outline-success fa fa-plus" href="{{ url('admin/adicionar-sala') }}" style="text-decoration: none;">Adicionar sala</a>    
        </div>
        
    </div>
</div>
<!------------------------ Espaço das Salas  --------------------------->
<div class="container-fluid" style="padding-top: 10px; ">
   
   
<!------- Estrutura de repetição (CARD)------------------->
   @foreach($data as $item)

   <?php $user = Auth::user()->id; 
         $prof = $item->prof_id; ?>


@if($user == $prof)

   <?php $id= $item->id ?>

    <div class="col-md-3" style="padding-top:20px;">
  <div class="card ">
   
<p class="card-title" >{{$item->name}} </p>

 <img src=" {{ asset('img/1.jpg')}} " style="width:200px; margin-bottom: 10px; " alt="imagen labirinto">
    <br>
     <a href="{{ url('admin/editar-sala') }}" class="btn btn-sm btn-outline-info fa fa-pencil-square-o ">&ensp;Editar</a>

      <a href="{{ url('admin/deletar-sala/'.$item->id)}}" class="btn btn-sm btn-outline-danger fa fa-pencil-square-o ">&ensp;Deletar</a> 
</div>
</div>

@endif
@endforeach


@endsection