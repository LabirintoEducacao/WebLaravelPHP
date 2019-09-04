@extends('vendor.page')

@section('content')

<!------------------------ Cabeçalho ------------------------>
<div class="container-fluid" style="border-bottom: solid; ">
    <div class="row">
        <div class="col-md-8 ">
            <h1>Jogos</h1>
</div>
</div>
</div>


<!------------------------ Espaço das Salas  --------------------------->

<div class="container-fluid" style="padding-top: 10px; ">


    <!------- Estrutura de repetição (CARD)------------------->
    @foreach($data as $item)

    <?php $user = Auth::user()->id;?>
    @if($item->public==1)
    <div class="col-md-3" style="padding-top:20px;">
        <div class="card ">

            <p class="card-title"> {{$item->name}} </p>

            <img src=" {{ asset('img/1.jpg')}} " style="width:200px; margin-bottom: 10px; " alt="imagen labirinto">
            <br><br>

            <a href="virtual/{{$item->id}}" class="btn btn-sm btn-outline-info fa fa-gamepad ">&ensp;Jogar</a>


            <!----------------------Botao do Modal-------------------------->
             <button type="button" class="btn btn-outline-cyan btn-sm fa fa-qrcode" data-toggle="modal" data-target="#md{{$item->id}}" data-whatever="{{$item->id}}" data-whatevernome="{{$item->name}}"> Qr Code</button>

    
</div>
</div>


        
<!-- Modal -------------------->


    <div class="modal fade" id="md{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content ">
                <div class="modal-header" style="background-color:#2F4F4F;">
                    <h5 class="modal-title"></h5>

                    <h5 style="  font-size: 20px;color:#ffffff;
        " id="exampleModalScrollableTitle">Qr Code </h5>

                </div>
<div class="container row">

    <div class="col-1"> 
        <a class="carousel-control-prev" href="#controlsmd{{$item->id}}" role="button" data-slide="prev" style=" padding-left:30px; font-size: 20px;" >
        <span class="fa fa-arrow-circle-left" style="color:#000000; " aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
    </div>



  <div class="modal-body col-10">

                 
    <?php
    $id = $item->id;

    $pasta = $_SERVER['DOCUMENT_ROOT'] . '/sala/'.$id; 
if(!is_dir($pasta)) die("<h2>O caminho $pasta não existe</h2>");

$arquivos = glob("$pasta/{*.[pP][nN][gG]}", GLOB_BRACE);

$i = 0;
     
?>


<div id="controlsmd{{$item->id}}" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

<h5> {{$item->name}} </h5>

 @foreach($arquivos as $img) 

<?php 
          $b = explode('public/', $img,2);
          
?>

 @if($i == 0)
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset($b[1]) }}" alt="First slide" width="40%">
      <p> Qr Code: {{$i}} </p>
    </div>
   
@endif
   

@if($i > 0)

    <div class="carousel-item ">
      <img class="d-block w-100" src="{{ asset($b[1]) }}" alt="Second slide">
      <p> Qr Code: {{$i}} </p>
    </div>


 @endif   



<?php 
$i++; 
?>
@endforeach



</div>

  
</div>
</div>

<div class="col-1"> 
    <a class="carousel-control-next" href="#controlsmd{{$item->id}}" role="button" data-slide="next" style=" padding-right:20px; font-size: 20px;">
    <span class="fa fa-arrow-circle-right"  style="color:#000000;" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>

            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>

<!--- Fim Modal --->

       


    @else
    @foreach($sala_user as $sala)
    @if($item->id==$sala->sala_id)
    @if($user == $sala->user_id)



    <div class="col-md-3" style="padding-top:20px;">
        <div class="card">

            <p class="card-title"> {{$item->name}} </p>

            <img src=" {{ asset('img/1.jpg')}} " style="width:200px; margin-bottom: 10px; " alt="imagen labirinto">


            <a href="virtual/{{$item->id}}" class="btn btn-sm btn-outline-info fa fa-gamepad ">&ensp;Jogar</a>

            
            <button type="button" class="btn btn-outline-cyan btn-sm fa fa-qrcode" data-toggle="modal" data-target="#md{{$item->id}}" data-whatever="{{$item->id}}" data-whatevernome="{{$item->name}}"> Qr Code</button>


  
</div>
</div>


 <!-- Modal -------------------->


    <div class="modal fade" id="md{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content ">
                <div class="modal-header" style="background-color:#2F4F4F;">
                    <h5 class="modal-title"></h5>

                    <h5 style="  font-size: 20px;color:#ffffff;
        " id="exampleModalScrollableTitle">Qr Code </h5>

                </div>
<div class="container row">

    <div class="col-1"> 
        <a class="carousel-control-prev" href="#controlsmd{{$item->id}}" role="button" data-slide="prev" style=" padding-left:30px; font-size: 20px;" >
        <span class="fa fa-arrow-circle-left" style="color:#000000; " aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
    </div>



  <div class="modal-body col-10">

                 
    <?php
    $id = $item->id;

    $pasta = $_SERVER['DOCUMENT_ROOT'] . '/sala/'.$id; 
if(!is_dir($pasta)) die("<h2>O caminho $pasta não existe</h2>");

$arquivos = glob("$pasta/{*.[pP][nN][gG]}", GLOB_BRACE);

$i = 0;
     
?>


<div id="controlsmd{{$item->id}}" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">

<h5> {{$item->name}} </h5>

 @foreach($arquivos as $img) 

<?php 
          $b = explode('public/', $img,2);
          
?>

 @if($i == 0)
    <div class="carousel-item active">
      <img class="d-block w-100" src="{{ asset($b[1]) }}" alt="First slide">
      <p> Qr Code: {{$i}} </p>
    </div>
   
@endif
   

@if($i > 0)

    <div class="carousel-item ">
      <img class="d-block w-100" src="{{ asset($b[1]) }}" alt="Second slide">
      <p> Qr Code: {{$i}} </p>
    </div>


 @endif   



<?php 
$i++; 
?>
@endforeach



</div>

  
</div>
</div>

<div class="col-1"> 
    <a class="carousel-control-next" href="#controlsmd{{$item->id}}" role="button" data-slide="next" >
    <span class="fa fa-arrow-circle-right"  style="color:#000000;" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

</div>

<div class="modal-footer">
 <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

</div>
</div>
</div>
</div>







<!--- Fim Modal --->





   
    @endif
    @endif

    @endforeach

    @endif
    @endforeach



@endsection
