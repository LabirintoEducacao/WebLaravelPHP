@extends('adminlte::page')

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
                       <form action="{{ url('profile/edit') }}" method="POST" style="margin-left: 25%;margin-right:1%">
<!--                        @method('POST')-->
                        {{ csrf_field() }}
                        @if (\Request::is('admin/settings')) 
                        <!--input type="hidden" name="_method" value="PATCH">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}"-->
                        {{ Form::label('name', 'Nome:') }}
                        {{ Form::text('name',Auth::user()->name,['class'=>'form-control', 'autofocus', 'placeholder'=>'Nome']) }}<br>
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::email('email',Auth::user()->email,['class'=>'form-control', 'placeholder'=>'E-mail']) }}<br>
<!--
                        {{ Form::label('password', 'Senha:') }}
                        {{ Form::password('password',['class'=>'form-control', 'placeholder'=>'Senha','minlength'=>'8', 'required']) }}<br>
-->
                        <div class="row align-self-center">
                            {{ Form::submit('SALVAR ALTERAÇÕES', ['class'=>'btn btn-outline-success btn-lg col-md-5','style'=>'margin-left:7%']) }}                         
                            <a class="btn btn-outline-danger btn-lg offset-md-1 col-md-5" style="margin-left:2%" href="{{ url('/home') }}">
                                        {{ __('CANCELAR') }}
                            </a>
                        </div>
                        @elseif (\Request::is('admin/deletar'))
                        {{ Form::label('name', 'Nome:') }}
                        {{ Form::text('name',Auth::user()->name,['class'=>'form-control', 'placeholder'=>'Nome', 'disabled']) }}<br>
                        {{ Form::label('email', 'Email:') }}
                        {{ Form::email('email',Auth::user()->email,['class'=>'form-control', 'placeholder'=>'E-mail', 'disabled']) }}<br>
                    </form>
                    <form action="{{ url('admin/delete/'.Auth::user()->id) }}" method="POST" style="margin-left: 25%">
                        @csrf
                        {{ method_field('DELETE') }}
                        {{ Form::submit('DELETAR PERFIL', ['class'=>'btn btn-outline-danger btn-lg btn-block']) }}
                    </form>
<!--                    {{ Form::close() }}-->

                 @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection