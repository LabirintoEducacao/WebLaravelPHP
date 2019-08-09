@extends('adminlte::page')

@section('content')

<div class="container" style="padding-right: 100px; padding-left: 100px;">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    <input type="hidden" value="52" id="num_y">

    <p style="font-size:35px;" align="center">
        <a class="btn btn-outline-success" href="{{ url('admin/alunos/'.$id) }}">ADICIONAR ALUNOS</a>
        &emsp;EDIÇÃO DA SALA&emsp;
        <button class="btn btn-outline-info" data-toggle="modal" data-target="#addPerg">ADICIONAR PERGUNTA E RESPOSTA
        </button>
    </p>

    <div class="modal fade" id="addPerg" tabindex="-1" role="dialog" aria-labelledby="addPergResp" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addPergResp">Nova Pergunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="add_name" id="add_name" style="margin-left: 5%;margin-right:1%">
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
                            <li class="active col-md-3 lista"><a data-toggle="tab" href="#perg">Pergunta</a></li>
                            <li class="col-md-3 lista"><a data-toggle="tab" href="#resp">Resposta</a></li>
                            <li class="col-md-3 lista"><a data-toggle="tab" href="#ambiente">Ambiente</a></li>
                            <li class="col-md-3 lista"><a data-toggle="tab" href="#pergReforco">Reforço</a></li>

                        </ul>

                        <div class="tab-content">

                            <!-- PERGUNTAS -->
                            <div id="perg" class="tab-pane fade in active">
                                <div class="form-group">
                                    <br>
                                    <h4 style="display: inline;"> Tipo da pergunta:&emsp;</h4>
                                    <select name="question_type">
                                        <option selected value="1">Texto</option>
                                        <option value="2">Imagem</option>
                                        <option value="3">video</option>
                                        <option value="4">Audio</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <br>
                                    <h4 style="display: inline;">Interação:&emsp;</h4>
                                    <select name="room_type">
                                        <option selected value="key">Chave</option>
                                        <option value="door">Porta</option>
                                        <option value="diamond">Diamante</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <h4>Pergunta:</h4>
                                    <input id="pergunta" type="text" name="pergunta" class="@error('pergunta') is-invalid @enderror" placeholder=" Pergunta" style="width: 500px;" required>
                                </div>
                            </div>

                            <!-- RESPOSTAS -->
                            <div id="resp" class="tab-pane fade">
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
                                                <select name="tipo_resp[]" id="tipo_opcao" class="form-control">
                                                    <option selected value="1">Texto</option>
                                                    <option value="2">imagem</option>
                                                    <option value="3">video</option>
                                                    <option value="4">Audio</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="corret[]" class="form-control">
                                                    <option selected value="1">Certa</option>
                                                    <option value="0">Errada</option>
                                                </select>
                                            </td>
                                            <td><input type="text" name="resposta[]" placeholder="Resposta" class="form-control name_list"></td>
                                            <td><button type="button" name="add" id="add" class="btn btn-succcess">Add Name</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- AMBIENTE -->
                            <div id="ambiente" class="tab-pane fade">
                                <br>
                                <div class="form-group">
                                    <span class="col-md-3">Tipo:&emsp;</span>
                                    <select name="answer_boolean">
                                        <option selected value="1">Corredor</option>
                                        <option value="2">Labirinto</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-3">Tamanho:</span>
                                    <select name="tamanho">
                                        <option selected value="1">Pequeno</option>
                                        <option value="2">Medio</option>
                                        <option value="3">Grande</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-3">Largura:&emsp;</span>
                                    <select name="largura">
                                        <option selected value="1">Pequeno</option>
                                        <option value="2">Medio</option>
                                        <option value="3">Grande</option>
                                    </select>
                                </div>
                            </div>
                            <div id="pergReforco" class="tab-pane fade">
                                <div class="hovereffect">
                                    <div class="overlay">
                                        <input type="checkbox">&nbsp;Pergunta Refoço
                                    </div>
                                    <div class="abcd">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="modal-footer">
                        <a class="btn btn-outline-dark" data-dismiss="modal">Close</a>
                        <button name="submit" id="submit" class="btn btn-info" value="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid" style="padding-top: 10px; ">
        <?php $x=1;$y=0;$letras = array("a)", "b)", "c)", "d)"); ?>
        <!------- Estrutura de repetição (CARD)------------------->
        <div class="col-md-12" style="padding-top:20px;" display="inline">
            <h2 style="text-align: center;">Perguntas</h2>
            <br>
            @foreach($data as $item)

            <div class="card">
                <div align="left" class="col-md-6">
                    <h4 display="inline" class="col-md-1"><?php echo $x; ?></h4>
                    <h4 display="inline" class="col-md-7">{{$item->pergunta}}</h4>
                    <!--             <td class="col-md-3">POR ENQUANTO NADA</td> -->
                    <?php $errado=0; ?>
                    @foreach($path_perg as $pp)
                    @if($pp->perg_id==$item->id)
                    <!--                    <input value="{{$pp->perg_id}}"><br><br>-->
                    @foreach($paths as $path)
                    @if($path->id==$pp->path_id)
                    <!--                    <input value="{{$path->id}}"><br><br>-->
                    <span class="col-md-4">
                        @if($errado==1)
                        <button type="button" class="btn btn-outline-info fa fa-pencil" data-toggle="modal" data-target="#caminhoModal" data-whatever="{{$path->id}}" data-whateverambientex="{{$path->ambiente_perg}}" data-whatevertamanhox="{{$path->tamanho}}" data-whateverlargurax="{{$path->largura}}" title="Editar path do reforço"></button>
                        @else
                        <button type="button" class="btn btn-outline-info fa fa-pencil" data-toggle="modal" data-target="#perguntaModal" data-whateverpath="{{$path->id}}" data-whateverambiente="{{$path->ambiente_perg}}" data-whatevertamanho="{{$path->tamanho}}" data-whateverlargura="{{$path->largura}}" data-whatever="<?php echo $x?>" data-whatevernome="{{$item->pergunta}}" data-whatevertype="{{$item->tipo_perg}}" data-whateveridperg="{{$item->id}}" data-whateverroom="{{$item->room_type}}" title="Editar path da pergunta"></button>
                        <a href="{{ url('admin/deletar-pergunta/'.$item->id) }}" class="btn btn-outline-danger fa fa-trash"></a>
                        @endif

                    </span>
                    @endif
                    @endforeach
                    <?php $errado++; ?>
                    @endif
                    @endforeach
                    <?php $x++; ?>


                </div>
                <div align="right" class="col-md-6">
                    @foreach($respostas as $resposta)
                    @foreach($perg_resp as $pergresp)
                    @if($pergresp->perg_id==$item->id)
                    @if($pergresp->resp_id==$resposta->id)
                    <h4 display="inline" class="col-md-1"><?php echo $letras[$y]; ?></h4>
                    <h4 display="inline" align="left" class="col-md-7">{{$resposta->resposta}}</h4>
                    <span class="col-md-4">
                        <button type="button" class="btn btn-outline-info fa fa-pencil" data-toggle="modal" data-target="#respostaModal" data-whatevern="<?php echo $y; ?>" data-whateverresp="{{$resposta->resposta}}" data-whatevertyperesp="{{$resposta->tipo_resp}}" data-whateveridresp="{{$resposta->id}}" data-whatevercorrect="{{$resposta->corret}}"></button>
                        <a href="{{ url('admin/deletar-resposta/'.$resposta->id) }}" class="btn btn-outline-danger fa fa-trash"></a>
                    </span>
                    <?php $y++; ?>
                    <br><br>
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                </div>
            </div>
            <?php $y=0; ?>
            <br><br><br>
            <hr style="border: 0.5px solid #c2c2c2;">
            <br>
            @endforeach
            <div align="right">
                <button type="button" align="right" class="btn btn-outline-danger" data-toggle="modal" data-target="#alteraModal">Alterar sequência</button>
            </div>
            <br>
            <br>
            <h2 style="text-align: center;">Perguntas de Reforço</h2>
            <br>
            <?php $z=1 ?>
            @foreach($ref as $item)
            <div class="card">
                <div align="left" class="col-md-6">
                    <h4 display="inline" class="col-md-1"><?php echo $z; ?></h4>
                    <h4 display="inline" class="col-md-7">{{$item->pergunta}}</h4>
                    <!--             <td class="col-md-3">POR ENQUANTO NADA</td> -->
                    @foreach($path_perg as $pp)
                    @if($pp->perg_id==$item->id)
                    @foreach($paths as $path)
                    @if($path->id==$pp->path_id)
                    <span class="col-md-4">
                        <button type="button" class="btn btn-outline-info fa fa-pencil" data-toggle="modal" data-target="#perguntaModal" data-whatever="<?php echo $z; ?>" data-whatevernome="{{$item->pergunta}}" data-whatevertype="{{$item->tipo_perg}}" data-whateveridperg="{{$item->id}}" data-whateverambiente="{{$path->ambiente_perg}}" data-whatevertamanho="{{$path->tamanho}}" data-whateverlargura="{{$path->largura}}" data-whateverroom="{{$item->room_type}}"></button>
                        <a href="{{ url('admin/deletar-pergunta/'.$item->id) }}" class="btn btn-outline-danger fa fa-trash"></a>
                    </span>
                    @endif
                    @endforeach
                    @endif
                    @endforeach
                    <?php $z++; ?>


                </div>
                <div align="right" class="col-md-6">
                    @foreach($respostas as $resposta)
                    @foreach($perg_resp as $pergresp)
                    @if($pergresp->perg_id==$item->id)
                    @if($pergresp->resp_id==$resposta->id)
                    <h4 display="inline" class="col-md-1"><?php echo $letras[$y]; ?></h4>
                    <h4 display="inline" align="left" class="col-md-7">{{$resposta->resposta}}</h4>
                    <span class="col-md-4">
                        <button type="button" class="btn btn-outline-info fa fa-pencil" data-toggle="modal" data-target="#respostaModal" data-whatevern="<?php echo $y; ?>" data-whateverresp="{{$resposta->resposta}}" data-whatevertyperesp="{{$resposta->tipo_resp}}" data-whateveridresp="{{$resposta->id}}" data-whatevercorrect="{{$resposta->corret}}"></button>
                        <a href="{{ url('admin/deletar-resposta/'.$resposta->id) }}" class="btn btn-outline-danger fa fa-trash"></a>
                    </span>
                    <?php $y++; ?>
                    <br><br>
                    @endif
                    @endif
                    @endforeach
                    @endforeach
                </div>
            </div>
            <?php $y=0;; ?>
            <hr style="border: 0.5px solid #c2c2c2;">

            @endforeach
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

    <div class="modal fade" id="caminhoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                </div>
                <form action="{{ url('admin/editar-ambi') }}" method="POST" style="margin-left: 5%;margin-right:1%">
                    <div class="modal-body">
                        <input type="hidden" value="{{$id}}" name="sala_id">
                        <input type="hidden" name="path_id" id="path_id">
                        @csrf
                        {{ csrf_field() }}
                        <!-- AMBIENTE -->

                        <div id="edit_ambiente">
                            <br>
                            <div class="form-group">
                                <span class="col-md-3">Tipo:&emsp;</span>
                                <select name="pergunta_ambientex" id="pergunta_ambientex">
                                    <option value="1">Corredor</option>
                                    <option value="2">Labirinto</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="col-md-3">Tamanho:</span>
                                <select name="pergunta_tamanhox" id="pergunta_tamanhox">
                                    <option value="1">Pequeno</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Grande</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <span class="col-md-3">Largura:&emsp;</span>
                                <select name="pergunta_largurax" id="pergunta_largurax">
                                    <option value="1">Pequeno</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Grande</option>
                                </select>
                            </div>
                        </div>

                        <br>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-outline-dark" data-dismiss="modal">Close</a>
                        <button type="submit" class="btn btn-outline-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="perguntaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"></h4>
                </div>
                <form action="{{ url('admin/editar-perg' ) }}" method="POST" style="margin-left: 5%;margin-right:1%">
                    <div class="modal-body">
                        <input type="hidden" value="{{$id}}" name="sala_id">
                        <input type="hidden" name="pergunta_id" id="pergunta_id">
                        <input type="hidden" name="pergunta_path" id="pergunta_path">
                        @csrf
                        {{ csrf_field() }}
                        <ul class="nav nav-tabs">
                            <li class="active col-md-6 lista"><a data-toggle="tab" href="#edit_perg">Pergunta</a></li>
                            <li class="col-md-6 lista"><a data-toggle="tab" href="#edit_ambi">Configurações do Ambiente</a></li>
                        </ul>
                        <div class="tab-content">
                            <!-- PERGUNTAS -->
                            <div id="edit_perg" class="tab-pane fade in active">
                                <div class="form-group">
                                    <br>
                                    <label for="pergunta_type" class="control-label" style="display: inline;">Tipo da pergunta:&emsp;</label>
                                    <select name="pergunta_type" id="pergunta_type">
                                        <option value="1">Texto</option>
                                        <option value="2">Imagem</option>
                                        <option value="3">video</option>
                                        <option value="4">Audio</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="perg_room_type" class="control-label">Interação:&emsp;</label>
                                    <select name="perg_room_type" id="perg_room_type">
                                        <option selected value="key">Chave</option>
                                        <option value="door">Porta</option>
                                        <option value="diamond">Diamante</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pergunta_name" class="control-label">Pergunta:</label>
                                    <input type="text" class="form-control" id="pergunta_name" name="pergunta_name">
                                </div>
                            </div>
                            <!-- AMBIENTE -->

                            <div id="edit_ambi" class="tab-pane fade">
                                <br>
                                <div class="form-group">
                                    <span class="col-md-3">Tipo:&emsp;</span>
                                    <select name="pergunta_ambiente" id="pergunta_ambiente">
                                        <option value="1">Corredor</option>
                                        <option value="2">Labirinto</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-3">Tamanho:</span>
                                    <select name="pergunta_tamanho" id="pergunta_tamanho">
                                        <option value="1">Pequeno</option>
                                        <option value="2">Medio</option>
                                        <option value="3">Grande</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-3">Largura:&emsp;</span>
                                    <select name="pergunta_largura" id="pergunta_largura">
                                        <option value="1">Pequeno</option>
                                        <option value="2">Medio</option>
                                        <option value="3">Grande</option>
                                    </select>
                                </div>
                            </div>

                            <br>
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

</div>
<div class="modal fade" id="respostaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"></h4>
            </div>
            <form action="{{ url('admin/editar-resp') }}" method="POST" style="margin-left: 5%;margin-right:1%">
                <div class="modal-body">
                    <input type="hidden" value="{{$id}}" name="sala_id">
                    <input type="hidden" name="resposta_id" id="resposta_id">
                    @csrf
                    {{ csrf_field() }}
                    <ul class="nav nav-tabs">
                        <li class="active col-md-6 lista"><a data-toggle="tab" href="#edit_perg">Resposta</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="edit_resp" class="tab-pane fade in active">
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
                                            <select name="resposta_type" id="resposta_type">
                                                <option value="1">Texto</option>
                                                <option value="2">Imagem</option>
                                                <option value="3">video</option>
                                                <option value="4">Audio</option>
                                            </select>
                                        </td>
                                        <td>
                                            <select id="resposta_correct" name="resposta_correct" class="form-control">
                                                <option value="1">Certa</option>
                                                <option value="2">Errada</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" id="resposta_name" name="resposta_name">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- <div class="form-group">
                <br>
                <label for="resposta_type" class="control-label" style="display: inline;">Tipo da resposta:&emsp;</label>
                <select name ="resposta_type" id ="resposta_type">
                  <option value="1">Texto</option>
                  <option value="2">Imagem</option>
                  <option value="3">video</option>
                  <option value="4">Audio</option>
                </select>
                </div>
                <div class="form-group">
                  <label for="resposta_name" class="control-label">Resposta:</label>
                  <input type="text" class="form-control" id="resposta_name" name="resposta_name">
                </div> -->
                        </div>
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
</div>

@endsection
