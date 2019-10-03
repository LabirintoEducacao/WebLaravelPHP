@extends('vendor.menu')

@section('content')

<div class="container margin" style="margin-top: 20px;">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <input type="hidden" value="52" id="num_y">

<!--     <div class="row">
        <div class="col">
        <a class="btn btn-outline-success tamanhobutton" href="{{ url('admin/alunos/'.$id) }}">ADICIONAR ALUNOS</a>
        </div>
        <div class="col">
         <div class="tamanhofonte">EDIÇÃO DA SALA</div>
        </div>
        <?php if(count($data)>=20){ ?>
        <div class="col ">
        <button class="btn btn-outline-info tamanhobutton button" data-toggle="modal" data-target="#addPerg" disabled>ADICIONAR PERGUNTA E RESPOSTA
        </button>
        </div>
        <?php }else{ ?>
        <div class="col">
        <button class="btn btn-outline-info tamanhobutton button" data-toggle="modal" data-target="#addPerg">ADICIONAR PERGUNTA E RESPOSTA
        </button>
        </div>
        <?php } ?>
    </div> -->
<!-- 
    <div class="container" style="margin-top: 30px;">
        <div class="row justify-content-end">
            <label>Total de Perguntas: {{$c_perg}}</label>
        </div>
        <div class="row justify-content-end" style="margin-right: -9px;">
            <div>
            <label>Total de Reforços: {{$c_ref}}</label>
        </div>
        </div>
    </div> -->

    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div id ="teste2" class="card-header card-header-primary">
                    <h3 class="card-title" style="text-align:center">{{$sala->name}}
                    </h3>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <div>

                    <br>
                    <br>
              <div class="row" style="margin-bottom: -35px;">

                <div class="col-4 col-md-auto" >
                <button type="button" align="right" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#alteraModal" style="margin-left: -10%;">Estatistica</button>
                 </div>

                <div class="col-4 col-md-auto">
                <a class="btn btn-primary btn-sm"  href="{{url('admin/alunos/'.$sala->id)}}" style="width:100%;"><i class="material-icons">add
                </i>Aluno</a>
                </div>

                <div class="col-4 col-md-auto">
                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#editarSalaModal2" data-whateverid="{{$sala->id}}" data-whatevernome="{{$sala->name}}" data-whatevertempo="{{$sala->duracao}}" data-whatevertema="{{$sala->tematica}}" data-whateverpublic="{{$sala->public}}" data-whateverenable="{{$sala->enable}}" style="float:right;"><i class="material-icons">create</i>Editar</button>
                 </div>
              
                </div>

                <hr style="border: 0.5px solid: grey;" >
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>
                                        Tempo de duração (em minutos)
                                    </th>
                                    <th>
                                        Tema
                                    </th>
                                    <th>
                                        Tipo
                                    </th>
                                    <th>
                                        Ativa
                                    </th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            {{$sala->duracao}}
                                        </td>
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
                                        <td>
                                            @if($sala->public==0)
                                                Privada
                                            @else
                                                Pública
                                            @endif
                                        </td>
                                        <td>
                                            @if($sala->enable==0)
                                                Não
                                            @else
                                                Sim
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                        </table>
                        
                    </div>
                    <br>
                    <br>
                <div class="row" style="margin-bottom: -35px;">
                <div class="col-4 col-md-auto" >
                <button type="button" align="right" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#alteraModal" style="margin-left: -10%;">Sequência</button>
                 </div>
                <div class="col-4 col-md-auto">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addPerg" style="width:100%;"><i class="material-icons">add
                </i> Perg</button>
                </div>
              
                 <div class="col-4 col-md-auto">
                <a class="btn btn-info btn-sm" href="{{ url('/admin/virtual/'.$id)}}" style="width:100%;">Qr Code</a>
                </div>
                </div>

                <hr style="border: 0.5px solid: grey;" >
                
                     <?php $x=1;$y=0;$letras = array("a)", "b)", "c)", "d)"); ?>
                        
                                        <table class="table">
                                                    <thead class=" text-primary">
                                                        <th>
                                                           Perguntas
                                                        </th>
                                                        <th>
                                         
                                                        </th>
                                                        <th>
                                                    <div style="float:right;"> Ações </div>
                                                    <div style="float:right; margin-right: 10%;"> Resposta </div>
                                                    
                                                        </th>                                  
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                            </table>
                            <!------- Estrutura de repetição (CARD)------------------->
                             
                                @foreach($data as $item)

                                         
                                            <?php $errado=0; ?>
                                            @foreach($path_perg as $pp)
                                            @if($pp->perg_id==$item->id)

                                            @foreach($paths as $path)
                                            @if($path->id==$pp->path_id)

                                            @if($path->disp == 1)
                                            <!-- 
                                                 <button type="button" class="btn btn-outline-info fa fa-pencil tamanhobutton" data-toggle="modal" data-target="#addPerg" data-whatever="{{$item->id}}"title="Editar pergunta"></button>&emsp;&emsp;
                                                  <a href="{{ url('admin/deletar-pergunta/'.$item->id) }}" class="btn btn-outline-danger fa fa-trash tamanhobutton"></a>
                     -->
                                            <div id="flip" onclick="abrir('panel'+{{$item->id}});">
                                            <div class="row align-items-center">
                                            <div class="col-auto mr-auto">
                                             {{$item->pergunta}}
                                            </div>
                                            <div class="col-auto">
                                            <a class="nav-link"  id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i id="teste" class="material-icons">more_vert</i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="">
                                                <a class="dropdown-item" data-toggle="modal" data-target="#addPerg" data-whatever="{{$item->id}}">Editar</a>
                                                <a class="dropdown-item" href="{{ url('admin/deletar-pergunta/'.$item->id) }}">Excluir</a>
                                            </div>
                                            </div>
                                           </div>
                                           </div>
                      
                                            @endif
                                            @endif
                                            @endforeach
                                            @endif
                                            @endforeach
                                    
                                   
                                        <?php $y=0; ?>
                                        <div class="panel" id="panel{{$item->id}}">
                                        @foreach($respostas as $resposta)
                                        @foreach($perg_resp as $pergresp)
                                        @if($pergresp->perg_id==$item->id)
                                        @if($pergresp->resp_id==$resposta->id)
                                        
                                        <div class="row">
                                            <h5 class="col-1"><?php echo $letras[$y];?></h5>
                                            <p class="col" style="font-size: 120%; line-height: 30px;">{{$resposta->resposta}}</p>
                                        </div>
                                        <?php $y++; ?>
                                    
                                        @endif
                                        @endif
                                        @endforeach
                                        @endforeach
                                    </div>
                                     <?php $y=0; ?>
                             
                                @foreach($perg_refs as $perg_ref)
                                @if($perg_ref->perg_id==$item->id)
                                @foreach($refs as $ref)
                                @if($ref->id==$perg_ref->ref_id)

                                    @foreach($path_perg as $pp)
                                    @if($pp->perg_id==$ref->id)
                                    <!--                    <input value="{{$pp->perg_id}}"><br><br>-->
                                    @foreach($paths as $path)
                                    @if($path->id==$pp->path_id)
                                    <!--                    <input value="{{$path->id}}"><br><br>-->
                                <div id="flip2" onclick="abrir('panel'+{{$ref->id}});"  data-toggle="tooltip" data-placement="left" title="Reforço da pergunta {{$item->pergunta}}">
                                <!-- <div id="texto" style="color: black">Reforço da pergunta {{$item->pergunta}}</div> -->
                                    <div class="row align-items-center">
                                            <div class="col-auto mr-auto">
                                             {{$ref->pergunta}}
                                            </div>
                                            <div class="col-auto">
                                            <a class="nav-link " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i id="teste" class="material-icons">more_vert</i>
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="">
                                                <a class="dropdown-item" href="">Visualizar</a>
                                                <a class="dropdown-item" href="">Editar</a>
                                               
                                                <a class="dropdown-item" href="#">Desativar</a>
                                      
                                                <a class="dropdown-item" href="#">Ativar</a>
                                            
                                                <a class="dropdown-item" href="#">Adicionar Alunos</a>
                                            </div>
                                            </div>
                                           </div>
                                        </div>
                                    @endif
                                    @endforeach
                                    @endif
                                    @endforeach
                           
                                @foreach($respostas as $resposta)
                                @foreach($perg_resp as $pergresp)
                                @if($pergresp->perg_id==$ref->id)
                                @if($pergresp->resp_id==$resposta->id)
                                <div class="panel2" id="panel{{$ref->id}}">
                                <div class="row">
                                    <h4 display="inline" class="col-sm-12 col-md-1"><?php echo $letras[$y]; ?>&emsp;</h4>
                                    <h4 class="col" style="font-size: 120%; line-height: 30px;">{{$resposta->resposta}}</h4>
                                    
                                </div>
                                <?php $y++; ?>
                                </div>
                                @endif
                                @endif
                                @endforeach
                                @endforeach
                                @endif
                                @endforeach
                                @endif
                                @endforeach
                                <hr style="border: 0.8px solid #afafaf;">

                                @endforeach
                                <div class="container">
                                    {{$data->links()}}
                                </div>      
                </div>
            </div>
        </div>
</div>
<div class="modal fade bd-example-modal-lg" id="editarSalaModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edição de Sala</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ url('admin/sala') }}" method="POST" style="margin-left: 5%;margin-right:1%;margin-top:3%">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_prof" value="{{ Auth::user()->id }}">
                        <input type="hidden" name="sala_id" id="sala_id" value="0">
                        <input type="hidden" value="1" id="page" name="page">
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
                                    <input class="form-check-input" type="checkbox" value="0" name="enable" id="enable">Ativo
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

    <div class="modal fade" id="addPerg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document" style="max-width: 70%; max-height: auto;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Pergunta</h5>
                    <button type="submit" class="close btnModalClose" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="add_name" id="add_name">

                    
                    <input type="hidden" value="{{$id}}" name="sala_id">
                    <input type="hidden" value="0" name="perg_reforco" id="perg_reforco">
                    <div class="modal-body">
            
                        @csrf
                        {{ csrf_field() }}
                        <div class="alert alert-danger print-error-msg" style="display: none;">
                            <ul></ul>
                        </div>
                        <div class="alert alert-success print-success-msg" style="display: none;">
                            <ul></ul>
                        </div>
                        <br><br>

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#perg">Pergunta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#resp">Resposta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#ambiente">Ambiente</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#pergReforco">Reforço</a>
                            </li>
                        </ul>
                        <div class="tab-content">

                            <!-- PERGUNTAS -->
                            <div id="perg" class="tab-pane fade show active" style="margin-right:2%">
                                <div class="form-group row">
                                    <br>
                                    <label for="question_type" class="col">Tipo da pergunta:</label>
                                    <select name="question_type" id="question_type" class="col">
                                        <option selected value="1">Texto</option>
                                        <option value="2">Imagem</option>
                                        <option value="3">Vídeo</option>
                                        <option value="4">Áudio</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <br>
                                    <label for="room_type" class="col">Interação:</label>

                                    <select name="room_type" id="room_typ" class="col">
                                        <option selected value="right_key">Chave</option>
                                        <option value="hope_door">Porta da esperança</option>
                                        <option value="true_or_false">Verdadeiro ou Falso</option>
                                        <option value="multiple_forms">Multiplas Formas</option>
                                    </select>


                                </div>
                                <div class="form-group row">
                                    <input type="hidden" value="0" name="perg_id" id="perg_id">
                                    <label for="pergunta" class="col">Pergunta:</label>

                                    <input id="pergunta" type="text" name="pergunta" class="@error('pergunta') is-invalid @enderror col" placeholder=" Pergunta" maxlength="500" required>

                                    <!--  <textarea id="pergunta" name="pergunta"></textarea> -->

                                </div>
                            </div>

                            <!-- RESPOSTAS -->
                            <div id="resp" class="tab-pane fade" style="margin-right:2%">
                                <table class="table table-bordered table-hover" id="dynamic_field" border="0">
                                    <thead>
                                        <tr>
                                            <td>Tipo da Resposta</td>
                                            <td>Definição da Resposta</td>
                                            <td>Resposta</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <select name="tipo_resp[]" id="tipo_opcao" class="form-control tipo_resp">
                                                    <option selected value="1">Texto</option>
                                                    <option value="2">Imagem</option>
                                                    <option value="3">Vídeo</option>
                                                    <option value="4">Áudio</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="corret[]" class="form-control corret">
                                                    <option selected value="1">Certa</option>
                                                    <option value="0">Errada</option>
                                                </select>
                                            </td>
                                            <td><input type="text" name="resposta[]" id="resposta" placeholder="Resposta" class="form-control name_list resposta" maxlength="500" required>
                                            <input type="hidden" name="resp_id[]" class="resp_id">
                                            </td>
                                            <td><button type="button" name="add" id="add" class="btn btn-outline-succcess fa fa-plus"></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            
                            </div>

                            <!-- AMBIENTE -->
                            <div id="ambiente" class="tab-pane fade" style="margin-right:2%">
                                <br>
                                <div class="form-group row">
                                    <input type="hidden" name="path_id" id="path_id">
                                    <label for="answer_boolean" class="col">Tipo:</label>
                                    <select name="answer_boolean" id="answer_boolean" class="col">
                                        <option selected value="1">Corredor</option>
                                        <option value="2">Labirinto</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="tamanho" class="col">Tamanho:</label>
                                    <select name="tamanho" id="tamanho" class="col">
                                        <option selected value="1">Pequeno</option>
                                        <option value="2">Medio</option>
                                        <option value="3">Grande</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="largura" class="col">Largura:</label>
                                    <select name="largura" id="largura" class="col">
                                        <option selected value="1">Pequeno</option>
                                        <option value="2">Medio</option>
                                        <option value="3">Grande</option>
                                    </select>
                                </div>
                            </div>
                            <div id="pergReforco" class="tab-pane fade" style="margin-right:2%">
                                <div class="hovereffect">
                                    <div class="overlay">
                                        <input type="checkbox" id="check-reforco">&nbsp;Pergunta Reforço
                                    </div>
                                    <div class="abcd">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-outline-dark btnModalClose" data-dismiss="modal">Close</a>
                        <button name="submit" id="submit" class="btn btn-info" value="submit">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="alteraModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                </div>
                <form>
                    {{ csrf_field() }}
                    <input type="hidden" value="{{$id}}" name="sala_id" id="sala_id">
                    <div class="modal-body">
                        <ul id="sortable" class="sortable">
                            @foreach($data as $item)
                            <li class="ui-state-default" value="{{$item->id}}">{{$item->pergunta}}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-outline-dark" data-dismiss="modal">Close</a>
                        <button type="button" class="btn btn-outline-success altera" id="altera" name="altera">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    


    
@endsection
