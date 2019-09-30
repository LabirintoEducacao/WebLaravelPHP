@extends('vendor.menu')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-tabs card-header-primary">
                    <div class="nav-tabs-navigation">
                        <div class="nav-tabs-wrapper">
                            <h4 class="nav-tabs-title">
                                Controle de Salas
                                <button type="button" class="btn btn-info btn-just-icon" data-toggle="modal" data-target="#addSalaModal">
                                    <i class="material-icons">add</i>
                                </button>
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
                                    <a class="nav-link" href="#publicas" data-toggle="tab">
                                        <!--                            <i class="material-icons">code</i>-->
                                        Públicas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#privadas" data-toggle="tab">
                                        <!--                            <i class="material-icons">code</i>-->
                                        Privadas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#ativas" data-toggle="tab">
                                        <!--                            <i class="material-icons">code</i>-->
                                        Ativadas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#desativadas" data-toggle="tab">
                                        <!--                            <i class="material-icons">cloud</i>-->
                                        Desativadas
                                        <div class="ripple-container"></div>
                                    </a>
                                </li>
                            </ul>
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
                                        Tema
                                    </th>
                                    <th>
                                        Tempo
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ativa
                                    </th>
                                    <th>
                                        Ações
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach($salas as $sala)
                                    <tr>
                                        <td>{{$sala->name}}</td>
                                        <td>
                                            @if($sala->tematica==1)
                                            Deserto
                                            @elseif($sala->tematica==2)
                                            Cidade Abandonada
                                            @elseif($sala->tematica==3)
                                            Casa
                                            @else
                                            Floresta
                                            @endif
                                        </td>
                                        <td>{{$sala->duracao}}</td>
                                        <td>
                                            @if($sala->public==0)
                                            Privada
                                            @else
                                            Pública
                                            @endif
                                        </td>
                                        <td>
                                            @if($sala->enable==1)
                                            Sim
                                            @else
                                            Não
                                            @endif
                                        </td>
                                        <td>

                                            <a class="nav-link" href="#pablo" id="sala{{$sala->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="sala{{$sala->id}}">
                                                <a class="dropdown-item" href="{{ url('admin/visualizar/'.$sala->id) }}">Visualizar</a>

                                                <a class="dropdown-item" href="{{ url('admin/editar-sala/'.$sala->id) }}">Editar perg</a>

                                                <button class="dropdown-item" data-toggle="modal" data-target="#editarSalaModal" data-whateverid="{{$sala->id}}" data-whatevernome="{{$sala->name}}" data-whatevertempo="{{$sala->duracao}}" data-whatevertema="{{$sala->tematica}}" data-whateverpublic="{{$sala->public}}" data-whateverenable="{{$sala->enable}}" style="width:93%;">Editar</button>

                                                @if($sala->enable==1)
                                                <a class="dropdown-item" href="{{url('admin/desativar/'.$sala->id)}}">Desativar</a>
                                                @else
                                                <a class="dropdown-item" href="{{url('admin/ativar/'.$sala->id)}}">Ativar</a>
                                                @endif
                                                @if($sala->public==0)
                                                <a class="dropdown-item" href="{{url('admin/alunos/'.$sala->id)}}">Adicionar Alunos</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane table-responsive" id="publicas">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Tema
                                    </th>
                                    <th>
                                        Tempo
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ativa
                                    </th>
                                    <th>
                                        Ações
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach($salas as $sala)
                                    @if($sala->public==1)
                                    <tr>
                                        <td>{{$sala->name}}</td>
                                        <td>
                                            @if($sala->tematica==1)
                                            Deserto
                                            @elseif($sala->tematica==2)
                                            Cidade Abandonada
                                            @elseif($sala->tematica==3)
                                            Casa
                                            @else
                                            Floresta
                                            @endif
                                        </td>
                                        <td>{{$sala->duracao}}</td>
                                        <td>
                                            @if($sala->public==0)
                                            Privada
                                            @else
                                            Pública
                                            @endif
                                        </td>
                                        <td>
                                            @if($sala->enable==1)
                                            Sim
                                            @else
                                            Não
                                            @endif
                                        </td>
                                        <td>

                                            <a class="nav-link" href="#pablo" id="sala{{$sala->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="sala{{$sala->id}}">
                                                <a class="dropdown-item" href="{{ url('admin/visualizar/'.$sala->id) }}">Visualizar</a>
                                                <a class="dropdown-item" href="#addSalaModal" data-toggle="modal" data-target="#addSalaModal" data-whateverid="{{$sala->id}}" data-whatevernome="{{$sala->name}}" data-whatevertempo="{{$sala->duracao}}" data-whatevertema="{{$sala->tematica}}" data-whateverpublic="{{$sala->public}}" data-whateverenable="{{$sala->enable}}">Editar</a>
                                                @if($sala->enable==1)
                                                <a class="dropdown-item" href="{{url('admin/desativar/'.$sala->id)}}">Desativar</a>
                                                @else
                                                <a class="dropdown-item" href="{{url('admin/ativar/'.$sala->id)}}">Ativar</a>
                                                @endif
<!--                                                <a class="dropdown-item" href="{{url('admin/alunos/'.$sala->id)}}">Adicionar Alunos</a>-->
                                            </div>
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
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Tema
                                    </th>
                                    <th>
                                        Tempo
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ativa
                                    </th>
                                    <th>
                                        Ações
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach($salas as $sala)
                                    @if($sala->public==0)
                                    <tr>
                                        <td>{{$sala->name}}</td>
                                        <td>
                                            @if($sala->tematica==1)
                                            Deserto
                                            @elseif($sala->tematica==2)
                                            Cidade Abandonada
                                            @elseif($sala->tematica==3)
                                            Casa
                                            @else
                                            Floresta
                                            @endif
                                        </td>
                                        <td>{{$sala->duracao}}</td>
                                        <td>
                                            @if($sala->public==0)
                                            Privada
                                            @else
                                            Pública
                                            @endif
                                        </td>
                                        <td>
                                            @if($sala->enable==1)
                                            Sim
                                            @else
                                            Não
                                            @endif
                                        </td>
                                        <td>

                                            <a class="nav-link" id="sala{{$sala->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="sala{{$sala->id}}">
                                                <a class="dropdown-item" href="{{ url('admin/visualizar/'.$sala->id) }}">Visualizar</a>
                                               <a class="dropdown-item" href="#addSalaModal" data-toggle="modal" data-target="#addSalaModal" data-whateverid="{{$sala->id}}" data-whatevernome="{{$sala->name}}" data-whatevertempo="{{$sala->duracao}}" data-whatevertema="{{$sala->tematica}}" data-whateverpublic="{{$sala->public}}" data-whateverenable="{{$sala->enable}}">Editar</a>
                                                @if($sala->enable==1)
                                                <a class="dropdown-item" href="{{url('admin/desativar/'.$sala->id)}}">Desativar</a>
                                                @else
                                                <a class="dropdown-item" href="{{url('admin/ativar/'.$sala->id)}}">Ativar</a>
                                                @endif
                                                <a class="dropdown-item" href="{{url('admin/alunos/'.$sala->id)}}">Adicionar Alunos</a>
                                            
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane table-responsive" id="ativas">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Tema
                                    </th>
                                    <th>
                                        Tempo
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ativa
                                    </th>
                                    <th>
                                        Ações
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach($salas as $sala)
                                    @if($sala->enable==1)
                                    <tr>
                                        <td>{{$sala->name}}</td>
                                        <td>
                                            @if($sala->tematica==1)
                                            Deserto
                                            @elseif($sala->tematica==2)
                                            Cidade Abandonada
                                            @elseif($sala->tematica==3)
                                            Casa
                                            @else
                                            Floresta
                                            @endif
                                        </td>
                                        <td>{{$sala->duracao}}</td>
                                        <td>
                                            @if($sala->public==0)
                                            Privada
                                            @else
                                            Pública
                                            @endif
                                        </td>
                                        <td>
                                            @if($sala->enable==1)
                                            Sim
                                            @else
                                            Não
                                            @endif
                                        </td>
                                        <td>

                                            <a class="nav-link" id="sala{{$sala->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="sala{{$sala->id}}">
                                                <a class="dropdown-item" href="{{ url('admin/visualizar/'.$sala->id) }}">Visualizar</a>
                                                <a class="dropdown-item" href="#addSalaModal" data-toggle="modal" data-target="#addSalaModal" data-whateverid="{{$sala->id}}" data-whatevernome="{{$sala->name}}" data-whatevertempo="{{$sala->duracao}}" data-whatevertema="{{$sala->tematica}}" data-whateverpublic="{{$sala->public}}" data-whateverenable="{{$sala->enable}}">Editar</a>
                                    
                                                <a class="dropdown-item" href="{{url('admin/desativar/'.$sala->id)}}">Desativar</a>
                                               
                                       
                                                @if($sala->public==0)
                                                <a class="dropdown-item" href="{{url('admin/alunos/'.$sala->id)}}">Adicionar Alunos</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <div class="tab-pane table-responsive" id="desativadas">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Nome
                                    </th>
                                    <th>
                                        Tema
                                    </th>
                                    <th>
                                        Tempo
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ativa
                                    </th>
                                    <th>
                                        Ações
                                    </th>
                                </thead>
                                <tbody>

                                    @foreach($salas as $sala)
                                    @if($sala->enable==0)
                                    <tr>
                                        <td>{{$sala->name}}</td>
                                        <td>
                                            @if($sala->tematica==1)
                                            Deserto
                                            @elseif($sala->tematica==2)
                                            Cidade Abandonada
                                            @elseif($sala->tematica==3)
                                            Casa
                                            @else
                                            Floresta
                                            @endif
                                        </td>
                                        <td>{{$sala->duracao}}</td>
                                        <td>
                                            @if($sala->public==0)
                                            Privada
                                            @else
                                            Pública
                                            @endif
                                        </td>
                                        <td>
                                            @if($sala->enable==1)
                                            Sim
                                            @else
                                            Não
                                            @endif
                                        </td>
                                        <td>

                                            <a class="nav-link" href="#pablo" id="sala{{$sala->id}}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons">more_vert</i>

                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="sala{{$sala->id}}">
                                                <a class="dropdown-item" href="{{ url('admin/visualizar/'.$sala->id) }}">Visualizar</a>
                                                <a class="dropdown-item" href="#addSalaModal" data-toggle="modal" data-target="#addSalaModal" data-whateverid="{{$sala->id}}" data-whatevernome="{{$sala->name}}" data-whatevertempo="{{$sala->duracao}}" data-whatevertema="{{$sala->tematica}}" data-whateverpublic="{{$sala->public}}" data-whateverenable="{{$sala->enable}}">Editar</a>
                                                
                                                <a class="dropdown-item" href="{{url('admin/ativar/'.$sala->id)}}">Ativar</a>
                                          
                                                @if($sala->public==0)
                                                <a class="dropdown-item" href="{{url('admin/alunos/'.$sala->id)}}">Adicionar Alunos</a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--    MODAL ADICIONAR SALA-->

    <div class="modal fade bd-example-modal-lg" id="addSalaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Sala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/sala') }}" method="POST" style="margin-left: 5%;margin-right:1%;margin-top:3%">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_prof" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="sala_id" id="sala_id" value="0">
                        <div class="form-group">
                            <label for="nome" display="inline">Nome da Sala:</label>
                            <input type="text" name="nome" id="nome" class="form-control has-feedback {{ $errors->has('nome') ? 'has-error bg-primary' : '' }}">

                            @if ($errors->has('nome'))
                            <div class="help-block">
                                {{ $errors->first('nome') }}
                            </div>
                            @endif

                        </div>
                        <div class="form-group" style="margin-top:3.5%">
                            <label for="time" display="inline">Tempo de Duração de cada sala (em minutos):</label>
                            <input type="number" name="time" id="time" class="form-control" min="0" max="120">
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="theme">Tema:&emsp;</label>
<!--                                <select class="form-control selectpicker" data-style="btn btn-link" name="theme" id="theme">-->
                                <select id="theme" name="theme" class="form-control" data-style="btn btn-link">
                                    <option value="1">Deserto</option>
                                    <option value="2">Cidade Abandonada</option>
                                    <option value="3">Casa</option>
                                    <option value="4">Floresta</option>
                                </select>

                            </div>
                            <div class="form-group col">
                            <div class="form-check" style="margin-left:10%;margin-top:17%">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="0" name="public" id="public">Sala Pública
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            </div>
                            <div class="form-group col">
                            <div class="form-check" style="margin-top:17%">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="0" name="enable" id="enable" checked>Ativo
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
    
    
    <div class="modal fade bd-example-modal-lg" id="editarSalaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cadastro de Sala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/sala') }}" method="POST" style="margin-left: 5%;margin-right:1%;margin-top:3%">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_prof" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="sala_id" id="sala_id" value="0">
                        <div class="form-group">
                            <label for="nome" display="inline">Nome da Sala:</label>
                            <input type="text" name="nome" id="nome" class="form-control has-feedback {{ $errors->has('nome') ? 'has-error bg-primary' : '' }}">

                            @if ($errors->has('nome'))
                            <div class="help-block">
                                {{ $errors->first('nome') }}
                            </div>
                            @endif

                        </div>
                        <div class="form-group" style="margin-top:3.5%">
                            <label for="time" display="inline">Tempo de Duração de cada sala (em minutos):</label>
                            <input type="number" name="time" id="time" class="form-control" min="0" max="120">
                        </div>

                        <div class="form-row">
                            <div class="form-group col">
                                <label for="theme">Tema:&emsp;</label>
<!--                                <select class="form-control selectpicker" data-style="btn btn-link" name="theme" id="theme">-->
                                <select id="theme" name="theme" class="form-control" data-style="btn btn-link">
                                    <option value="1">Deserto</option>
                                    <option value="2">Cidade Abandonada</option>
                                    <option value="3">Casa</option>
                                    <option value="4">Floresta</option>
                                </select>

                            </div>
                            <div class="form-group col">
                            <div class="form-check" style="margin-left:10%;margin-top:17%">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="0" name="public" id="public">Sala Pública
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            </div>
                            <div class="form-group col">
                            <div class="form-check" style="margin-top:17%">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" value="0" name="enable" id="enable" checked>Ativo
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            </div>

                        </div>


                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-secondary" data-dismiss="modal">Fechar</a>
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
