@extends('vendor.menu')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
  
<div class="container">
  @if(Auth::user()->hasAnyRole('admin'))
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <h2 style="display:inline;">Tabela de Usuário</h2>
                &emsp;
                    <a href="{{ url('/admin/newuser') }}" class="btn btn-outline-success fa fa-plus">
                        Adicionar novo usuário
                    </a>
                <div class="card-body">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">Nome</th>
                          <th scope="col">Email</th>
<!--                            SÓ EXIBE SE FOR ADMIN-->
                            
                          <th scope="col">Tipo de usuário</th>

                          <th scope="col">Ações</th>

                        </tr>
                      </thead>
                      <tbody>
                        @foreach($users as $user)
                        <tr>
                                   <th class="col-md-2">{{ $user->name }}</th>
                                   <th class="col-md-3">{{ $user->email }}</th>
                                   <th class="col-md-1">{{ implode(', ', $user->roles()->get()->pluck('name')->toArray()) }}</th>

                                   <th class="col-md-1">

                                     <a href="{{ route('admin.users.edit', $user->id) }}" class="float-left">
                                       <button type="button" class="btn btn-outline-info btn-sm fa fa-pencil">&nbsp;&nbsp;EDITAR</button>
                                     </a> </th>
                                     <th class="col-md-2">
                                      <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="float-left">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-outline-danger btn-sm fa fa-trash-o" aria-hidden="true">&nbsp;&nbsp;DELETAR</button>
                                      </form>


                                   </th>
                            
                            
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <!-- essa parte mostra a paginação-->
                    <div class="container">
                    {{ $users->links() }}
                  </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
