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

            <p class="card-title">{{$item->name}} </p>

            <img src=" {{ asset('img/1.jpg')}} " style="width:200px; margin-bottom: 10px; " alt="imagen labirinto"><br>
            <a class="btn btn-sm btn-outline-cyan fa fa-cogs" data-toggle="modal" data-target="#salaEModal" data-whatevernome="{{$item->name}}" data-whatevertype="{{$item->duracao}}" data-whatevertema="{{$item->tematica}}" data-whateverpublic="{{$item->public}}" data-whateverid="{{$item->id}}"></a>

            <a href="{{ url('admin/editar-sala/'.$item->id) }}" class="btn btn-sm btn-outline-info fa fa-pencil-square-o"></a>

            <a href="{{ url('admin/deletar-sala/'.$item->id)}}" class="btn btn-sm btn-outline-danger fa fa-trash"></a>
        </div>
    </div>

    @endif
    @endforeach
</div>


<div class="modal fade" id="salaEModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"></h4>
            </div>
            <form action="{{ url('admin/editar-sala') }}" method="POST" style="margin-left: 5%;margin-right:1%">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        {{ Form::label('name', 'Criador do labirinto:') }}
                        {{ Form::text('name',Auth::user()->name,['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome','disabled' => 'disabled']) }}
                    </div>

                    <input type="hidden" name="id_prof" value="{{ Auth::user()->id }}">

                    <input type="hidden" name="sala_id" id="sala_id">
                    <div class="form-group">
                        <strong> Nome de sua sala:</strong>
                        <input type="text" name="nome" id="nome" class="form-control has-feedback {{ $errors->has('nome') ? 'has-error bg-primary' : '' }}" placeholder="nome">

                        @if ($errors->has('nome'))
                        <div class="help-block">
                            {{ $errors->first('nome') }}
                        </div>
                        @endif

                    </div>
                    <div class="form-group">
                        <strong> Tempo de Duração de cada sala:</strong>
                        <input type="text" name="time" id="time" value="" class="form-control" placeholder="Tempo em Segundos">
                    </div>
                    <div class="form-group">
                        <strong> Tema: </strong>
                        <select name="theme" id="theme">
                            <option value="1">Deserto</option>
                            <option value="2">Cidade Abandonada</option>
                            <option value="3">Casa</option>
                            <option value="4">Floresta</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="public" id="public">Sala Pública
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
