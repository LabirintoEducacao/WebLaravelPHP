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
   
<p class="card-title" >  {{$item->name}} </p>

 <img src=" {{ asset('img/1.jpg')}} " style="width:200px; margin-bottom: 10px; " alt="imagen labirinto">

<a href="#" class="btn btn-sm btn-outline-info fa fa-gamepad ">&ensp;Jogar</a>



<!----------------------Botao do Modal-------------------------->
     
<button type="button" class="btn btn-primary btn-sm fa fa-qrcode" data-toggle="modal" data-target="#exampleModalScrollable"> Qr Code</button>

<!------------------- Modal --------------------------->

<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content " >
      <div class="modal-header" style="background-color:#2F4F4F;" >
        <h5 style="  font-size: 20px;  margin-left:250px;  color:#ffffff;
        "  id="exampleModalScrollableTitle">Qr Code </h5>

      </div>
      <div class="modal-body" >
      <p>Labirinto: {{$item->name }}</p>
      <p style="padding-left: 170px;" >{!! QrCode::size(250)->generate( 'labirinto Quimica' ); !!}</p>

    
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
    
      </div>
    </div>
  </div>
</div>


</div>
</div>







@endif
@endforeach


@endsection