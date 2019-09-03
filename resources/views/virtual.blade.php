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
<div class="container-fluid row" style="padding-top: 10px; ">


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
            <button type="button" class="btn btn-outline-cyan btn-sm fa fa-qrcode" data-toggle="modal" data-target="#salaModal" data-whatever="{{$item->id}}" data-whatevernome="{{$item->name}}"> Qr Code</button>

        


        </div>
    </div>

        </div>
            


    @else
    @foreach($sala_user as $sala)
    @if($item->id==$sala->sala_id)
    @if($user == $sala->user_id)



    <div class="col-md-3" style="padding-top:20px;">
        <div class="card ">

            <p class="card-title"> {{$item->name}} </p>

            <img src=" {{ asset('img/1.jpg')}} " style="width:200px; margin-bottom: 10px; " alt="imagen labirinto">


            <a href="virtual/{{$item->id}}" class="btn btn-sm btn-outline-info fa fa-gamepad ">&ensp;Jogar</a>

            
            <button type="button" class="btn btn-outline-cyan btn-sm fa fa-qrcode" data-toggle="modal" data-target="#salaModal" data-whatever="{{$item->id}}" data-whatevernome="{{$item->name}}"> Qr Code</button>
        

        
</div>



<!-- 
    <?php
    $id=19;
    $pasta = $_SERVER['DOCUMENT_ROOT'] . '/sala/'.$id; 
if(!is_dir($pasta)) die("<h2>O caminho $pasta não existe</h2>");



$arquivos = glob("$pasta/{*.[pP][nN][gG]}", GLOB_BRACE);

$i = 0;
     
 foreach($arquivos as $img){
          
          $b = explode('public/', $img,2); ?>

     @if($i == 0)
         
    <div class="carousel-item active">
      <img src="{{ asset($b[1]) }}"class="d-block w-100" alt="...">
    </div>
    @endif

    @if($i > 0)
    <div class="carousel-item">
      <img  src="{{ asset($b[1]) }}" class="d-block w-100" alt="...">
    </div>
    @endif
    <?php
    $i ++;
     ?>

  </div>


<?php
    
      }
          ?>
      
        </div>

  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="fa fa-arrow-left" style="font-size: 20px; color:#000000;"aria-hidden="true"></span>
    <span class="sr-only"> Anterior </span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="fa fa-arrow-right" style="font-size: 20px; color:#000000;" aria-hidden="true"></span>
    <span class="sr-only"> Proximo  </span>

  </a>
      
</div> -->


   </div>      

    @endif
    @endif

    @endforeach

    @endif
    @endforeach



    <div class="modal fade" id="salaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content ">
                <div class="modal-header" style="background-color:#2F4F4F;">
                    <h5 class="modal-title"></h5>

                    <h5 style="  font-size: 20px;  margin-left:250px;  color:#ffffff;
        " id="exampleModalScrollableTitle">Qr Code </h5>

                </div>


                <div class="modal-body">

                    <h3 class="sala_name" align="center">Sala</h3>
                    <p style="padding-left: 170px;">{!! QrCode::size(250)->generate( 'http://127.0.0.1:8000/admin/virtual/1' ); !!}</p>
                    <input type="hidden" name="sala_id" id="sala_id" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>



    @endsection

    @section('script')
    
    
        @section('script')
    
<!--
    <script>
function carrega(){
    
}


</script>
-->
    @endsection
    
    
    @endsection
