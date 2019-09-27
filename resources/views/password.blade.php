@extends('vendor.menu')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <!--                    {{Form::model(['method' => 'POST', 'url' => 'perfil/editar'])}}  -->
                    <form action="{{ url('home') }}" method="POST" style="margin-left: 1%;margin-right:1%">
                        <!--                        @method('POST')-->
                        {{ csrf_field() }}

                        <!--input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"-->
                        <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
                            <input type="password" name="password" class="form-control" placeholder="Nova senha">
                            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group has-feedback {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Confirme sua nova senha">
                            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                            @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>

                        <!--
                        {{ Form::label('password', 'Nova senha:') }}
                        {{ Form::password('password',['class'=>'form-control', 'autofocus', 'placeholder'=>'Nova senha']) }}<br>
                        {{ Form::label('password2', 'Confirmação de senha:') }}
                        {{ Form::password('password2',['class'=>'form-control', 'placeholder'=>'Confirmação de senha']) }}<br>
-->
                        <!--
                        {{ Form::label('password', 'Senha:') }}
                        {{ Form::password('password',['class'=>'form-control', 'placeholder'=>'Senha','minlength'=>'8', 'required']) }}<br>
-->
                        <div class="row align-self-center">
                            {{ Form::submit('ALTERAR SENHA', ['class'=>'btn btn-outline-info btn-lg col-md-5','style'=>'margin-left:7%']) }}
                            <a class="btn btn-outline-danger btn-lg offset-md-1 col-md-5" style="margin-left:2%" href="{{ url('/home') }}">
                                {{ __('CANCELAR') }}
                            </a>
                        </div>
                    </form>
                    <!--                    {{ Form::close() }}-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
