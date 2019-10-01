@extends('vendor.menu')

@section('content')





<!------------------------ Espaço das Salas  --------------------------->
 
<?php $user = Auth::user()->id;
$flag =0;
?>

<?php $linha = 0; $flag = 0; $flag_sala =0; $flag_salap =0;
?>
 -->

<!-- @if($salapr>0)
  <div class="container-fluid " style=" margin-top:20px; padding-top: 10px; padding-top: 10px; background-color:#ffffff; border-radius: 20px; display:block">
@else
<div class="container-fluid " style=" margin-top:20px; padding-top: 10px; padding-top: 10px; background-color:#ffffff; border-radius: 20px;display:none">
@endif
 -->


<div class="container">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header card-header-tabs card-header-primary ">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            
                                        <h4 class="nav-tabs-title col-md-3">
                                            Espaço Virtual
                                         </h4>
                                  <ul class="nav nav-tabs" data-tabs="tabs" style="float:right;">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#todos" data-toggle="tab">
                                        <!--                            <i class="material-icons">bug_report</i>-->
                                        Todas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#privado" data-toggle="tab">
                                        <!--                            <i class="material-icons">code</i>-->
                                        Privado
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                  <li class="nav-item">
                                    <a class="nav-link" href="#publicas" data-toggle="tab">
                                        <!--                            <i class="material-icons">code</i>-->
                                        Públicas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                        
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active table-responsive" id="todos">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Tempo
                                    </th>
                                    <th>
                                        Tematica
                                    </th>
                                    <th>
                                        Publica
                                    </th>
                                     <th>
                                       
                                    </th>
                                    
                                     <th>
                                      
                                    </th>
                                    
                                    
                                </thead>
                                <tbody>

                                    @foreach($data as $item)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->duracao}}</td>
                                        <td>{{$item->tematica}}</td>
                                        <td>{{$item->public}}</td>
                                        <td style="float:right;">

                                            <a href="" class="btn btn-primary " > Estatisticas</a>            
                                            <a href="" class="btn btn-info btn-small"> Qr Code</a>
                                           
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>


                        <div class="tab-pane table-responsive" id="publicas">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th> Nome </th>
                                    <th> Tempo </th>
                                    <th> Tematica </th>
                                    <th> Publica </th> 
                                         <th>
                                       
                                    </th>
                                    
                                     <th>
                                      
                                    </th> 
                                </thead>
                                <tbody>

                                    @foreach($data as $item)
                                    @if($item->public == 1)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->duracao}}</td>
                                        <td>{{$item->tematica}}</td>
                                        <td>Publica</td>
                                       <td style="float:right;">

                                            <a href="" class="btn btn-primary " > Estatisticas</a>            
                                            <a href="" class="btn btn-info btn-small"> Qr Code</a>
                                           
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                           <div class="tab-pane table-responsive" id="privadas">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th> Nome </th>
                                    <th> Tempo </th>
                                    <th> Tematica </th>
                                    <th> Publica </th> 
                                         <th>
                                       
                                    </th>
                                    
                                     <th>
                                      
                                    </th>  
                                </thead>
                                <tbody>

                                    @foreach($data as $item)

                                    @if($item->public == 0 && $flag ++)
                                    <tr>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->duracao}}</td>
                                        <td>{{$item->tematica}}</td>
                                        <td>Privada</td>
                                       <td style="float:right;">

                                            <a href="" class="btn btn-primary " > Estatisticas</a>            
                                            <a href="" class="btn btn-info btn-small"> Qr Code</a>
                                           
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach
                                    <?php $flag =0; ?>

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

  
<!-- 

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
            <div class="modal-header" style="background-color:#4D226D;">
                <h5 class="modal-title"></h5>
                <h5 style="  font-size: 20px;color:#ffffff;" id="exampleModalScrollableTitle">Qr Code </h5>
            </div>
            <div class="modal-body ">
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
                            <div class="carousel-item active col">
                                <img class="d-block img-fluid  " src="{{ asset($b[1]) }}" alt="First slide">
                                <p> Qr Code: {{$i+1}} </p>
                            </div>
                            @endif
                            @if($i > 0)
                            <div class="carousel-item col ">
                                <img class="d-block img-fluid  " src="{{ asset($b[1]) }}" alt="Second slide">
                                <p> Qr Code: {{$i+1}} </p>
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
            <div class="modal-header" style="background-color:#4D226D;">
                <h5 class="modal-title"></h5>
                <h5 style="  font-size: 20px;color:#ffffff;" id="exampleModalScrollableTitle">Qr Code </h5>
            </div>
            <div class="modal-body">
             <h5> {{$item->name}} </h5>
             <h4 style="color: purple;"> Não existe QrCode para este labirinto, verifique se existem perguntas ou se as alterações do labirinto foram salvas.</h4>
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

    <!-- @endif
    @endif
    @endforeach
    @endforeach

    @if($flag == 0 && $flag_sala == 1 )
        </div>
        @endif   -->
 
</div>

  
       
@endsection
