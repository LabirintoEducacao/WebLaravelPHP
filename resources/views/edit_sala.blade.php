@extends('vendor.menu')

@section('content')

@if (session('status'))
<div class="alert alert-success" role="alert">
    {{ session('status') }}
</div>
@endif
<input type="hidden" value="52" id="num_y">
<div class="modal fade" id="addPerg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog larguramodal" role="document">
        <div class="modal-content">
            <div class="card card-nav-tabs card-plain">
                <div class="card-header card-header-primary">
                    <!-- colors: "header-primary", "header-info", "header-success", "header-warning", "header-danger" -->
                    <div class="container row align-items-center">
                        <div class="col-11">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#perg" data-toggle="tab">Pergunta</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#pergReforco" data-toggle="tab">Reforço</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-1">
                            <button type="submit" class="close btnModalClose" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="container ">
                <div class="row align-items-center">
                    <div class="col-6 alert alert-success print-success-msg" style="display: none; position: absolute; z-index: 9999999999;">
                        <ul style="list-style-type: none"></ul>
                    </div>
                </div>
                <!-- <div class="col-6 alert alert-danger print-error-msg" style="display: none;">
                    <ul></ul>
                </div> -->
            </div>

            <form name="add_name" id="add_name">
                <div class="modal-body">



                    @csrf
                    {{ csrf_field() }}

                    <input type="hidden" value="{{$id}}" name="sala_id">
                    <input type="hidden" value="0" name="perg_reforco" id="perg_reforco">


                    <!-- Pergunta  -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="perg">
                            <div class=" container" style="margin-top: -40px">
                                <div class="card houvercard">
                                    <div class=" container">
                                        <div class="row" style="margin-top: 10px;">
                                            <div class="col">
                                                <input type="hidden" value="0" name="perg_id" id="perg_id">
                                                <label for="pergunta" style=" font-size:  130%; color: black;">Pergunta:</label>
                                            </div>
                                            <div class="col-12 col-md-auto" style="display:inline-block">
                                                <div class="row" style="height:50px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="question_type" style="margin-right: 3.5px; padding-top:10%;">Tipo da pergunta:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select class="selectpicker form-control room_type" data-style="btn btn-primary" name="question" id="question_type" style="float:left;">
                                                              <option selected value="1" data-content="<i class='fa fa-question-circle' style='margin-left: -20px;' data-toggle='tooltip' title='meu title'></i>&emsp;Texto"></option>
                                                            <option value="2" data-content="<i class='fa fa-question-circle' style='margin-left: -20px;' data-toggle='tooltip' title='tesssss 2'></i>&emsp;Imagem"></option>
                                                            <option value="3" data-content="<i class='fa fa-question-circle' style='margin-left: -20px;' data-toggle='tooltip' title='tesssss 3'></i>&emsp;Video"></option>
                                                            <option value="4" data-content="<i class='fa fa-question-circle' style='margin-left: -20px;' data-toggle='tooltip' title='tesssss 4'></i>&emsp;Áudio"></option>
                                                        </select>
                                                        <p id="tooltipBox" class="col-sm-6" style="z-index:9999;"></p>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col col-lg-4">
                                                <div class="row" style="height:50px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="room_type" style="margin-right: 3.5px; padding-top:10%;">Interação:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select class="form-control selectpicker" data-style="btn btn-primary" name="room_type" id="room_type">
                                                            <option selected  value="right_key">Chave</option>
                                                            <option value="hope_door">Porta da esperança</option>
                                                            <option value="true_or_false">Verdadeiro ou Falso</option>
                                                            <option value="multiple_forms">Multiplas Formas</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <div class="container" style="padding-top:2%">
                                        <!--                                        <br>-->
                                        <div class="textareaborda2" style="display:block;">
                                            <textarea id="pergunta" type="text" name="pergunta" rows="2" cols="50" class=" form-control @error('pergunta') is-invalid @enderror col" placeholder="Faça sua pergunta" maxlength="500" required></textarea>
                                        </div>

                                        <!--
                                        <div class="form-group form-file-upload form-file-simple" style="display:none;" id="teste">

                                            input type="text" class="form-control inputFileVisible" placeholder="Simple chooser...">
                                            <input type="file" class="inputFileHidden"

                                            <label for="exampleFormControlFile1">Escolha um arquivo...</label>
                                            <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                          </div>
-->
                                    </div>


                                    <!--   Ambinete  -->
                                    <label class="col-12" style=" margin-top: 10px;  font-size: 130%; color: black;">Definições do labirinto:</label>
                                    <div class=" container">
                                        <div class="row" style="line-height: 40px; margin-bottom: 10px;">
                                            <div class="col-12 col-sm-4">
                                                <input type="hidden" name="path_id" id="path_id">
                                                <div class="row" style="height:50px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="answer_boolean" style="margin-right: 3.5px; padding-top:10%;">Caminho do jogo:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select name="answer_boolean" id="answer_boolean" class="form-control selectpicker " data-style="btn btn-primary" style="float:left;">
                                                            <option selected value="1">Corredor</option>
                                                            <option value="2">Labirinto</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <input type="hidden" name="path_id" id="path_id">
                                                <div class="row" style="height:50px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="tamanho" style="margin-right: 3.5px; padding-top:10%;">Tamanho do Labirinto:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select name="tamanho" id="tamanho" class="form-control selectpicker" data-style="btn btn-primary" style="float:left;">
                                                            <option selected value="1">Pequeno</option>
                                                            <option value="2">Medio</option>
                                                            <option value="3">Grande</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4">
                                                <input type="hidden" name="path_id" id="path_id">
                                                <div class="row" style="height:50px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="largura" style="margin-right: 3.5px; padding-top:10%;">Largura do Labirinto:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select name="largura" id="largura" class="form-control selectpicker" data-style="btn btn-primary" style="float:left;">
                                                            <option selected value="1">Pequeno</option>
                                                            <option value="2">Medio</option>
                                                            <option value="3">Grande</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=" container" style=" margin-top: -20px;">
                                <div class="card houvercard">
                                    <!--   Resposta -->
                                    <div class=" container" style=" margin-top: 10px;">
                                        <div class="row  align-items-center">
                                            <div class="col-9">
                                                <label style=" margin-top: 10px;  font-size: 130%; color: black;">Resposta:&emsp;</label>
                                                <button type="button" name="add" id="add" class="btn btn-success btn-sm"><i class="material-icons">add</i></button>
                                            </div>

                                            <div class="col-12 col-sm-3">
                                                <input type="hidden" name="path_id" id="path_id">
                                                <div class="row" style="height:70px;">
                                                    <div class="col-5" style="height:100%;">
                                                        <label for="tipo_opcao" style="margin-right: 3.5px; padding-top:15%;">Tipo da Resposta:</label>
                                                    </div>
                                                    <div class="col-7">
                                                        <select name="tipo_resp" id="tipo_opcao" class="form-control selectpicker " data-style="btn btn-primary" style="float:left;">
                                                            <option selected value="1">Texto</option>
                                                            <option value="2">Imagem</option>
                                                            <option value="3">Vídeo</option>
                                                            <option value="4">Áudio</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dynamic-added montarteste" id="dynamic_field" border="0">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Aba do reforco -->

                        <div class="tab-pane" id="pergReforco">
                            <div class="hovereffect">
                                <div class="overlay">
                                    <div class="form-check" style="margin-left:5%; margin-bottom:2%">
                                        <label class="form-check-label">

                                            <input class="form-check-input" type="checkbox" id="check-reforco">
                                            Pergunta Reforço
                                            <span class="form-check-sign">
                                                <span class="check"></span>
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="abcd">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary btnModalClose" data-dismiss="modal">Fechar</a>
                    <button name="submit" id="submit" class="btn btn-success" value="submit">Salvar</button>
                </div>
            </form>

        </div>
    </div>
</div>


<div class="container">
    <div class="col-md-12">
        <div class="card">
            <div id="teste2" class="card-header card-header-primary">
                @if($sala->enable==1)
                <h3 class="card-title" style="text-align:center">{{$sala->name}}
                </h3>
                @else
                <h3 class="card-title" style="text-align:center;"><i>{{$sala->name}}<span style="float:right;font-size:20px">Desativada</span></i>
                </h3>
                @endif
                <p class="card-category"></p>
            </div>
            <div class="card-body">
                <div>
                    <div class="row" style="margin-bottom: -35px;">
                        <?php
                                            $x = gmdate("H:i:s", $sala->duracao);
                                            
                                        ?>

                        <div class="col-12 col-md-auto">
                            <button type="button" align="right" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#alteraModal" style="width:100%;">Estatistica</button>
                        </div>

                        @if($sala->public==0)
                        <div class="col-12 col-md-auto">
                            <a class="btn btn-success btn-sm" href="{{url('admin/alunos/'.$sala->id)}}" style="width:100%;"><i class="material-icons">add
                                </i>&emsp;Aluno</a>
                        </div>
                        @endif

                        <div class="col-12 col-md-auto">
                            <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editarSalaModal2" data-whateverid="{{$sala->id}}" data-whatevernome="{{$sala->name}}" data-whatevertempo="{{$x}}" data-tempoo="{{$sala->duracao}}" data-whatevertema="{{$sala->tematica}}" data-whateverpublic="{{$sala->public}}" data-whateverenable="{{$sala->enable}}" style="float:right; width:100%;"><i class="material-icons">create</i>&emsp;Editar</button>
                        </div>

                    </div>

                    <hr style="border: 0.5px solid: grey;">

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
                                    {{$x}}
                                </td>
                                <td>
                                    @if($sala->tematica=="urban")
                                    Urbano
                                    @elseif($sala->tematica=="mansion")
                                    Casa/Mansão
                                    @elseif($sala->tematica=="icy_maze")
                                    Gelo
                                    @else
                                    Selva
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
                    <div class="col-12 col-md-auto">
                        <button type="button" align="right" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#alteraModal" style="width:100%;">Sequência</button>
                    </div>
                    <div class="col-12 col-md-auto">
                        <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#addPerg" style="width:100%;"><i class="material-icons">add
                            </i>&emsp;Pergunta</button>
                    </div>

                    <div class="col-12 col-md-auto">

                        <button type="button" class="col-12 btn btn-warning btn-sm  fa fa-qrcode qrcode" id="{{$sala->id}}" value="{{$sala->id}}" onclick="qrcodebtn({{$sala->id}});">&emsp;Qr Code</button>

                    </div>
                </div>

                <hr style="border: 0.5px solid: grey;">

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

                <div id="pai">
                    <?php 
                    $cont = 0;
                    $cont2 = 0;
                    ?>

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

                    <div id="flip">
                        <div class="row align-items-center" style="cursor: pointer;">
                            <div class="col-sm-10 container" onclick="abrir('panel'+{{$item->id}});">
                                <?php
                                $str2 = $item->pergunta;
                                $total1 = strlen($str2); 
                                ?>
                                @if($total1 > 108)
                                <div id="div2" data-toggle="tooltip" data-placement="top" title="{{$item->pergunta}}">{{$item->pergunta}}</div>
                                @else
                                <div>{{$item->pergunta}}</div>
                                @endif
                            </div>

                            <div class="col-2 col-sm-auto textototal{{$cont}}">

                            </div>
                            <div class="col-2 col-sm-1">
                                <a class="nav-link" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right;">
                                    <i id="teste" class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="">
                                    <a class="dropdown-item" data-toggle="modal" data-target="#addPerg" data-whatever="{{$item->id}}">Editar</a>
                                    <a class="dropdown-item" onclick="(confirm('Você realmente deseja deletar a pergunta: \'{{$item->pergunta}}\'? ')) ? window.location.href =  '{{ url('admin/visualizar/deletar-pergunta/'.$item->id) }}' : window.location.reload(forcedReload);">Excluir</a>
                                </div>
                            </div>
                            <div class="container col-1 " onclick="abrir('panel'+{{$item->id}});" style="margin-top: -10px;">
                                <a><img src="{{asset('img/expand-button.png')}}" width="8px"></a>
                            </div>
                        </div>
                    </div>

                    <?php $cont ++; ?>
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
                            <h5><?php echo $letras[$y];?></h5>
                            <div class="col totalresposta" style=" margin-top: -5px;">
                                <p style="font-size: 120%; line-height: 30px;">{{$resposta->resposta}}</p>
                            </div>
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

                    <div id="flip2" data-toggle="tooltip" data-placement="left" title="Reforço da pergunta {{$item->pergunta}}">
                        <!-- <div id="texto" style="color: black">Reforço da pergunta {{$item->pergunta}}</div> -->
                        <div class="row align-items-center" style="cursor: pointer;">
                            <div class="col-sm-10 container" onclick="abrir('panel'+{{$ref->id}});">
                                <?php
                        $str = $ref->pergunta;
                        $total = strlen($str); 
                        ?>
                                @if($total > 108)
                                <div id="div2" data-toggle="tooltip" data-placement="top" title="{{$ref->pergunta}}">{{$ref->pergunta}}</div>
                                @else
                                <div>{{$ref->pergunta}}</div>
                                @endif
                            </div>

                            <div class="col-2 col-sm-auto textototalref{{$cont2}}">



                            </div>

                            <div class="col-2 col-sm-1">
                                <a class="nav-link " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="float: right;">
                                    <i id="teste" class="material-icons">more_vert</i>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="">

                                    <a class="dropdown-item" onclick="(confirm('Você realmente deseja deletar a pergunta reforço: \'{{$ref->pergunta}}\'? ')) ? window.location.href =  '{{ url('admin/visualizar/deletar-pergunta/'.$ref->id) }}' : window.location.reload(forcedReload)">Excluir</a>
                                </div>
                            </div>
                            <div class="container col-1 " style="margin-top: -10px;" onclick="abrir('panel'+{{$ref->id}});">
                                <a><img src="{{asset('img/expand-button.png')}}" width="8px"></a>
                            </div>
                        </div>
                    </div>
                    <?php $cont2 ++; ?>
                    @endif
                    @endforeach
                    @endif
                    @endforeach

                    <div class="panel2" id="panel{{$ref->id}}">
                        @foreach($respostas as $resposta)
                        @foreach($perg_resp as $pergresp)
                        @if($pergresp->perg_id==$ref->id)
                        @if($pergresp->resp_id==$resposta->id)
                        <div class="row">
                            <h5><?php echo $letras[$y];?></h5>
                            <div class="col" style=" margin-top: -5px;">
                                <p style="font-size: 120%; line-height: 30px;">{{$resposta->resposta}}</p>
                            </div>
                        </div>
                        <?php $y++; ?>
                        @endif
                        @endif
                        @endforeach
                        @endforeach
                    </div>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    <hr style="border: 0.8px solid #afafaf;">

                    @endforeach
                </div>
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
                        <input type="time" name="time3" id="time3" step='1' class="form-control" min="00:00:00" max="01:00:00" onblur="transforma(this.value,1);">
                        <input type="hidden" name="time4" id="time4" class="form-control">

                    </div>

                    <div class="form-row">
                        <div class="form-group col">
                            <label for="theme">Tema:&emsp;</label>
                            <!--                                <select class="form-control selectpicker" data-style="btn btn-link" name="theme" id="theme">-->
                            <select id="theme" name="theme" class="form-control" data-style="btn btn-link">
                                <option value="icy_maze">Gelo</option>
                                <option value="urban">Urbano</option>
                                <option value="forest">Selva</option>
                                <option value="mansion">Casa/Mansão</option>
                            </select>

                        </div>
                        <div class="form-group col">
                            <div class="form-check" style="margin-left:10%;margin-top:17%">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="public1" id="public1">Sala Pública
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="form-group col">
                            <div class="form-check" style="margin-top:17%">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="enable1" id="enable1">Ativo
                                    <span class="form-check-sign">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>

                    </div>


                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary btnModalClose" data-dismiss="modal">Fechar</a>
                    <button type="submit" class="btn btn-success">Salvar</button>
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
                    <ul id="sortable" class="sortable" style="list-style-type: none;">
                        @foreach($data as $item)
                        <li class="ui-state-default" value="{{$item->id}}">{{$item->pergunta}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-secondary btnModalClose" data-dismiss="modal">Fechar</a>
                    <button type="button" class="btn btn-success altera" id="altera" name="altera">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="qrmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#4D226D;">
                <h5 class="modal-title"></h5>
                <h5 style="  font-size: 20px; color:#ffffff;">Qr Code </h5>
            </div>

            <div class="modal-body">
                <h5 id="nomeqrsala">Nome: </h5>
                <input id="hiddenid" type="hidden" value="">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner" id="corouselimg">
                    </div>

                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Anterior</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Próximo</span>
                    </a>
                </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!----------------- Fim Modal ------------------->


<div class="modal fade" id="noinfomodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content ">
            <div class="modal-header" style="background-color:#4D226D;">
                <h5 class="modal-title"></h5>
                <h5 style="  font-size: 20px;color:#ffffff;" id="exampleModalScrollableTitle">Qr Code </h5>
            </div>
            <div class="modal-body">
                <h4 style="color: purple;"> Não existe QrCode para este labirinto, verifique se existem perguntas ou se as alterações do labirinto foram salvas.</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Fechar </button>
            </div>
        </div>
    </div>
</div>

<div id="mensagem" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div id="mensagemcontent" class="modal-content">
            ...
        </div>
    </div>
</div>

@endsection
