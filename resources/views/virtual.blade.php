@extends('adminlte::page')

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

            <a href="#" class="btn btn-sm btn-outline-info fa fa-gamepad ">&ensp;Jogar</a>
            <!----------------------Botao do Modal-------------------------->
            <button type="button" class="btn btn-outline-cyan btn-sm fa fa-qrcode" data-toggle="modal" data-target="#salaModal" data-whatever="{{$item->id}}" data-whatevernome="{{$item->name}}"> Qr Code</button>


        </div>
    </div>
    @else
    @foreach($sala_user as $sala)
    @if($item->id==$sala->sala_id)
    @if($user == $sala->user_id)
    <?php $id=$item->id ?>

    <div class="col-md-3" style="padding-top:20px;">
        <div class="card ">

            <p class="card-title"> {{$item->name}} </p>

            <img src=" {{ asset('img/1.jpg')}} " style="width:200px; margin-bottom: 10px; " alt="imagen labirinto">

            <a href="#" class="btn btn-sm btn-outline-info fa fa-gamepad ">&ensp;Jogar</a>
            <!----------------------Botao do Modal-------------------------->
            <button type="button" class="btn btn-outline-cyan btn-sm fa fa-qrcode" data-toggle="modal" data-target="#salaModal" data-whatever="{{$item->id}}" data-whatevernome="{{$item->name}}"> Qr Code</button>


        </div>
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
                    <p style="padding-left: 170px;">{!! QrCode::size(250)->generate( 'labirinto Quimica' ); !!}</p>
                    <input type="hidden" name="sala_id" id="sala_id">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>





    @endsection
