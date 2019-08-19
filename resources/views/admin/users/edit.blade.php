@extends('vendor.page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Usuário {{ $user->name }}</h1>
@stop

@section('content')
   
                <div class="card-body">
                   
                   <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST" style="margin-left:5%">
                        @csrf
                         {{ method_field('PUT') }}
                         @foreach($roles as $role)
                            <div class="form-check">
                              <input type="checkbox" name="roles[]" value="{{ $role->id }}"
                             {{ $user->hasAnyRole($role->name)?'checked':'' }}>
                             <label>{{ $role->name }}</label>
                            </div>
                          @endforeach
                          <button type="submit" class="btn btn-outline-info btn-sm fa fa-refresh">&nbsp;&nbsp;Atualizar</button>
                   </form>

                </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
