@extends('vendor.menu')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div id ="teste2" class="card-header card-header-primary">
                    <h3 class="card-title" style="text-align:center">{{$sala->name}}</h3>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">

                    <div id="flip">
                      
                      <div class="row align-items-center"">
                        <div class="col-auto mr-auto">
                        
                        </div>
                        <div class="col-auto">
                        <a class="nav-link" href="#pablo" id="sala{{$sala->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i id="teste" class="material-icons">more_vert</i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="sala{{$sala->id}}">
                            <a class="dropdown-item" href="{{ url('admin/visualizar/'.$sala->id) }}">Visualizar</a>
                            <a class="dropdown-item" href="#">Editar</a>
                            @if($sala->enable==1)
                            <a class="dropdown-item" href="#">Desativar</a>
                            @else
                            <a class="dropdown-item" href="#">Ativar</a>
                            @endif
                            <a class="dropdown-item" href="#">Adicionar Alunos</a>
                        </div>
                        </div>
                       </div>
                    </div>
                    <div id="panel">Hello world!</div>               
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
