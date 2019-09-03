@extends('vendor.page')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 ">
            <div class="card ">

                <div class="card-body justify-content-center ">
                    @if (session('status'))
                    <div class="alert alert-success " role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!--                    {{Form::model(['method' => 'POST', 'url' => 'perfil/editar'])}}  -->
                    <form action="sala" method="POST" style="margin-left: 1%;margin-right:1%">

                        <p style="font-size:50px; "> Definições sobre o Labirinto</p>
                        <!--                        @method('POST')-->
                        {{ csrf_field() }}

                        <!--input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"-->
                        <div class="form-group">
                            {{ Form::label('name', 'Criador do labirinto:') }}
                            {{ Form::text('name',Auth::user()->name,['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome','disabled']) }}
                        </div>

                        <input type="hidden" name="id_prof" value="{{ Auth::user()->id }}">


                        <div class="form-group">
                            <strong> Nome de sua sala:</strong>
                            <input type="text" name="nome" class="form-control has-feedback {{ $errors->has('nome') ? 'has-error bg-primary' : '' }}" placeholder="nome">

                            @if ($errors->has('nome'))
                            <div class="help-block">
                                {{ $errors->first('nome') }}
                            </div>
                            @endif

                        </div>
                        <div class="form-group">
                            <strong> Tempo de duração de cada sala:</strong>
                            <input type="number" name="time" value="" class="form-control" placeholder="Tempo em Segundos">
                        </div>
                        <div class="form-group">
                            <strong> Tema: </strong>
                            <select name="theme">
                                <option value="1">Deserto</option>
                                <option value="2">Cidade Abandonada</option>
                                <option value="3">Casa</option>
                                <option value="4">Floresta</option>
                            </select>

                        </div>
                        <div class="form-group">
                            <input type="checkbox" name="public">Sala Pública
                        </div>

                        <div>
                            <button type="submit" class="btn btn-outline-success btn-lg btn-block">CRIAR SALA</button>
                            &emsp;
                            <a href="{{ url('/admin/sala') }}" class="btn btn-outline-danger btn-lg btn-block">CANCELAR</a>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
