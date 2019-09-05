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

            <p class="card-title" style="margin-right:auto;margin-left:auto"> {{$item->name}} </p>

            <img src=" {{ asset('img/1.jpg')}} " style="width:200px; margin-bottom: 10px; margin-right:auto;margin-left:auto" alt="imagen labirinto">
            <br>
            <!--------------------Botao do Modal-------------------------->
            
                 <button type="button" class="btn btn-outline-cyan btn-sm fa fa-qrcode" data-toggle="modal" data-target="#md{{$item->id}}" data-whatever="{{$item->id}}" data-whatevernome="{{$item->name}}" style="margin-right:auto;margin-left:auto;width:80%"> Qr Code</button>

             <?php
                $id = $item->id;
                $pasta = $_SERVER['DOCUMENT_ROOT'] . '/sala/'.$id; 
                if(!is_dir($pasta)) die("<h2>O caminho $pasta não existe</h2>");
                $arquivos = glob("$pasta/{*.[pP][nN][gG]}", GLOB_BRACE);
                $i = 0;
                
                foreach($arquivos as $img){

                    $i++;
                }
                        
               ?>
           
 @if($i > 0)
    <div class="modal fade" id="md{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#2F4F4F;">
                <h5 class="modal-title"></h5>
                <h5 style="  font-size: 20px;color:#ffffff;" id="exampleModalScrollableTitle">Qr Code </h5>
            </div>
            <div class="modal-body">
                <?php
                $id = $item->id;
                $pasta = $_SERVER['DOCUMENT_ROOT'] . '/sala/'.$id; 
                if(!is_dir($pasta)) die("<h2>O caminho $pasta não existe</h2>");
                $arquivos = glob("$pasta/{*.[pP][nN][gG]}", GLOB_BRACE);
                $i = 0;
                ?>
                <h5> {{$item->name}} </h5>
                <div id="controlsmd{{$item->id}}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="margin-left:auto;margin-right:auto;display:block;padding-right:2%;padding-left:2%">
                        @foreach($arquivos as $img) 
                            <?php 
                                $b = explode('public/', $img,2);         
                            ?>
                            @if($i == 0)
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="{{ asset($b[1]) }}" alt="First slide">
                                <p> Qr Code: {{$i}} </p>
                            </div>
                            @endif
                            @if($i > 0)
                            <div class="carousel-item ">
                                <img class="d-block " src="{{ asset($b[1]) }}" alt="Second slide">
                                <p> Qr Code: {{$i}} </p>
                            </div>
                            @endif   
                            <?php 
                            $i++; 
                            ?>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#controlsmd{{$item->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#controlsmd{{$item->id}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@else
 <div class="modal fade" id="md{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#2F4F4F;">
                <h5 class="modal-title"></h5>
                <h5 style="  font-size: 20px;color:#ffffff;" id="exampleModalScrollableTitle">Qr Code </h5>
            </div>
            <div class="modal-body">
             <h5> {{$item->name}} </h5>
             <h4 style="color: red;"> Não existe QrCode para este labirinto, verifique se existem perguntas ou se as alterações do labirinto foram salvas.</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 @endif
</div>
</div>


        
<!-- Modal -------------------->

<!--- Fim Modal --->

       


    @else
    @foreach($sala_user as $sala)
    @if($item->id==$sala->sala_id)
    @if($user == $sala->user_id)


    
       <div class="col-md-3" style="padding-top:20px;">
        <div class="card ">

            <p class="card-title" style="margin-right:auto;margin-left:auto"> {{$item->name}} </p>

            <img src=" {{ asset('img/1.jpg')}} " style="width:200px; margin-bottom: 10px; margin-right:auto;margin-left:auto" alt="imagen labirinto">
            <br>
            <!----------------------Botao do Modal-------------------------->
            
                 <button type="button" class="btn btn-outline-cyan btn-sm fa fa-qrcode" data-toggle="modal" data-target="#md{{$item->id}}" data-whatever="{{$item->id}}" data-whatevernome="{{$item->name}}"> Qr Code</button>

             <?php
                $id = $item->id;
                $pasta = $_SERVER['DOCUMENT_ROOT'] . '/sala/'.$id; 
                if(!is_dir($pasta)) die("<h2>O caminho $pasta não existe</h2>");
                $arquivos = glob("$pasta/{*.[pP][nN][gG]}", GLOB_BRACE);
                $i = 0;
                
                foreach($arquivos as $img){

                    $i++;
                }
                        
               ?>
           
 @if($i > 0)
    <div class="modal fade" id="md{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#2F4F4F;">
                <h5 class="modal-title"></h5>
                <h5 style="  font-size: 20px;color:#ffffff;" id="exampleModalScrollableTitle">Qr Code </h5>
            </div>
            <div class="modal-body">
                <?php
                $id = $item->id;
                $pasta = $_SERVER['DOCUMENT_ROOT'] . '/sala/'.$id; 
                if(!is_dir($pasta)) die("<h2>O caminho $pasta não existe</h2>");
                $arquivos = glob("$pasta/{*.[pP][nN][gG]}", GLOB_BRACE);
                $i = 0;
                ?>
                <h5> {{$item->name}} </h5>
                <div id="controlsmd{{$item->id}}" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" style="margin-left:auto;margin-right:auto;display:block;padding-right:2%;padding-left:2%">
                        @foreach($arquivos as $img) 
                            <?php 
                                $b = explode('public/', $img,2);         
                            ?>
                            @if($i == 0)
                            <div class="carousel-item active">
                                <img class="d-block img-fluid" src="{{ asset($b[1]) }}" alt="First slide">
                                <p> Qr Code: {{$i}} </p>
                            </div>
                            @endif
                            @if($i > 0)
                            <div class="carousel-item ">
                                <img class="d-block " src="{{ asset($b[1]) }}" alt="Second slide">
                                <p> Qr Code: {{$i}} </p>
                            </div>
                            @endif   
                            <?php 
                            $i++; 
                            ?>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#controlsmd{{$item->id}}" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#controlsmd{{$item->id}}" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@else
 <div class="modal fade" id="md{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#2F4F4F;">
                <h5 class="modal-title"></h5>
                <h5 style="  font-size: 20px;color:#ffffff;" id="exampleModalScrollableTitle">Qr Code </h5>
            </div>
            <div class="modal-body">
             <h5> {{$item->name}} </h5>
             <h4 style="color: red;"> Não existe QrCode para este labirinto, verifique se existem perguntas ou se as alterações do labirinto foram salvas.</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
 @endif
</div>
</div>

<!--- Fim Modal --->





   
    @endif
    @endif

    @endforeach

    @endif
    @endforeach



@endsection
