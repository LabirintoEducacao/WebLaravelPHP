@extends('layouts.app')

@section('content')
<!------------------------ Cabeçalho ------------------------>
<div class="container-fluid">
    <form class="form-inline mr-auto" action="{{ url('/buscar') }}" method="POST">
        @csrf
        <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search" name="buscar" id="buscar">
        <button class="btn btn-outline-info" type="submit">Buscar</button>
    </form>
    <form class="form-inline mr-auto" action="/api/virtual" method="POST">
        @csrf
        <input class="form-control mr-sm-2" type="text" placeholder="ID" aria-label="Search" name="id" id="buscar">
        <button class="btn btn-outline-info" type="submit">teste</button>
    </form>
</div>
@if (session('status'))
<div class="alert alert-warning" role="alert">
    {{ session('status') }}
</div>
@endif
<!------------------------ Espaço das Salas  --------------------------->
<div class="container-fluid" style="padding-top: 10px; margin: 2% 2% 2% 2%">


    <!------- Estrutura de repetição (CARD)------------------->
    @foreach($data as $item)
    <?php $id=$item->id ?>

    <div class="col-md-3" style="padding-top:20px;" display="inline">
        <div class="card ">

            <p class="card-title">
                <h3 align="center">{{$item->name}}</h3>
            </p>

            <img src=" {{ asset('img/1.jpg')}} " style="width:100%; margin-bottom: 10px; " alt="imagen labirinto">

            <a href="admin/virtual/{{$item->id}}" class="btn btn-sm btn-outline-info fa fa-gamepad ">&ensp;Jogar</a>



            <!----------------------Botao do Modal-------------------------->

            <button type="button" class="btn btn-outline-cyan btn-sm fa fa-qrcode" data-toggle="modal" data-target="#salaModal" data-whatever="{{$item->id}}" data-whatevernome="{{$item->name}}"> Qr Code</button>


        </div>
    </div>
    @endforeach


    <div class="modal fade" id="salaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content ">
                <div class="modal-header" style="background-color:#2F4F4F;">
                    <h2 style="color:#ffffff; margin-left:40%">Qr Code </h2>

                </div>
                <div class="modal-body">

                    <h3 class="sala_name" align="center">Sala</h3>
                    <p align="center">{!! QrCode::size(250)->generate( 'labirinto Quimica' ); !!}</p>
                    <input type="hidden" name="sala_id" id="sala_id">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>





    @endsection
