@extends('vendor.page')

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

        <?php if(count($data)>=20){ ?>
        <button class="btn btn-outline-info" data-toggle="modal" data-target="#addPerg" disabled>ADICIONAR PERGUNTA E RESPOSTA
        </button>
        <?php }else{ ?>
        <button class="btn btn-outline-info" data-toggle="modal" data-target="#addPerg">ADICIONAR PERGUNTA E RESPOSTA
        </button>
        <?php } ?>
    </p>
    <div align="right">
        <div class="row">
            <label class="col-3 offset-8">Total de Perguntas: </label>
            <input value="{{$c_perg}}" disabled class="col">
        </div>
        <div class="row">
            <label class="col-3 offset-8">Total de Perguntasde Reforço: </label>
            <input value="{{$c_ref}}" disabled class="col">
        </div>
    </div>

    <div class="modal fade" id="addPerg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Adicionar Pergunta</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form name="add_name" id="add_name">
                    <input type="hidden" value="{{$id}}" name="sala_id">
                    <input type="hidden" value="0" name="perg_reforco" id="perg_reforco">
                    <div class="modal-body">
                        @csrf
                        {{ csrf_field() }}
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
                                        <option value="3">video</option>
                                        <option value="4">Audio</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <br>
                                    <label for="room_type" class="col">Interação:</label>
                                    <select name="room_type" id="room_type" class="col">
                                        <option selected value="key">Chave</option>
                                        <option value="door">Porta</option>
                                        <option value="diamond">Diamante</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="pergunta" class="col">Pergunta:</label>
                                    <input id="pergunta" type="text" name="pergunta" class="@error('pergunta') is-invalid @enderror col" placeholder=" Pergunta" maxlength="80" required>
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
                                            <td><input type="text" name="resposta[]" placeholder="Resposta" class="form-control name_list" maxlength="80" required></td>
                                            <td><button type="button" name="add" id="add" class="btn btn-outline-succcess fa fa-plus"></button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- AMBIENTE -->
                            <div id="ambiente" class="tab-pane fade" style="margin-right:2%">
                                <br>
                                <div class="form-group row">
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
                                        <input type="checkbox">&nbsp;Pergunta Refoço
                                    </div>
                                    <div class="abcd">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <a class="btn btn-outline-dark" data-dismiss="modal">Close</a>
                        <button name="submit" id="submit" class="btn btn-info" value="submit">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php $x=1;$y=0;$letras = array("a)", "b)", "c)", "d)"); ?>

    <div class="container-fluid row" style="padding-top: 10px; ">

        <!------- Estrutura de repetição (CARD)------------------->
        <div class="col-md-12" style="padding-top:20px;" display="inline">
            <h2 style="text-align: center;">Perguntas</h2>
            <br>
            @foreach($data as $item)
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php $errado=0; ?>
                        @foreach($path_perg as $pp)
                        @if($pp->perg_id==$item->id)
                        <!--                    <input value="{{$pp->perg_id}}"><br><br>-->
                        @foreach($paths as $path)
                        @if($path->id==$pp->path_id)
                        <!--                    <input value="{{$path->id}}"><br><br>-->
                        @if($path->disp == 1)
                        <h4 display="inline" class="col-3">Pergunta:</h4>
                        <h4 display="inline" align="left" class="col">{{$item->pergunta}}</h4>
                        @endif
                        <span class="col-1">
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
                    </div>
                    <br><br><br>
                </div>
                <div class="col-md-12">
                    <?php $y=0; ?>
                    @foreach($respostas as $resposta)
                    @foreach($perg_resp as $pergresp)
                    @if($pergresp->perg_id==$item->id)
                    @if($pergresp->resp_id==$resposta->id)
                    <div class="row">
                        &emsp;&emsp;&emsp;
                        <h4 display="inline" class="col-1"><?php echo $letras[$y]; ?></h4>
                        <h4 display="inline" align="left" class="col">{{$resposta->resposta}}</h4>
                        <span class="col">
                            <button type="button" class="btn btn-outline-info fa fa-pencil" data-toggle="modal" data-target="#respostaModal" data-whatevern="<?php echo $y; ?>" data-whateverresp="{{$resposta->resposta}}" data-whatevertyperesp="{{$resposta->tipo_resp}}" data-whateveridresp="{{$resposta->id}}" data-whatevercorrect="{{$resposta->corret}}"></button>
                            <a href="{{ url('admin/deletar-resposta/'.$resposta->id) }}" class="btn btn-outline-danger fa fa-trash"></a>
                        </span>
                    </div>
                    <?php $y++; ?>
                    <br><br>
                    @endif
                    @endif
                    @endforeach
                    @endforeach

                </div>

            </div>


            <?php $y=0; ?>

            @foreach($perg_refs as $perg_ref)
            @if($perg_ref->perg_id==$item->id)
            @foreach($refs as $ref)
            @if($ref->id==$perg_ref->ref_id)
            <br><br><br>
            <hr style="border: 0.5px solid #c2c2c2;">
            <br>
            <div class="row">
                @foreach($path_perg as $pp)
                @if($pp->perg_id==$ref->id)
                <!--                    <input value="{{$pp->perg_id}}"><br><br>-->
                @foreach($paths as $path)
                @if($path->id==$pp->path_id)
                <!--                    <input value="{{$path->id}}"><br><br>-->
                <h4 display="inline" class="col-3">Reforço:</h4>
                <h4 display="inline" align="left" class="col">{{$ref->pergunta}}</h4>
                <span class="col-1">
                    <button type="button" class="btn btn-outline-info fa fa-pencil" data-toggle="modal" data-target="#perguntaModal" data-whateverpath="{{$path->id}}" data-whateverambiente="{{$path->ambiente_perg}}" data-whatevertamanho="{{$path->tamanho}}" data-whateverlargura="{{$path->largura}}" data-whatever="<?php echo $x?>" data-whatevernome="{{$ref->pergunta}}" data-whatevertype="{{$ref->tipo_perg}}" data-whateveridperg="{{$ref->id}}" data-whateverroom="{{$ref->room_type}}" title="Editar path da pergunta reforço"></button>
                    <a href="{{ url('admin/deletar-pergunta/'.$item->id) }}" class="btn btn-outline-danger fa fa-trash"></a>

                </span>
                @endif
                @endforeach
                @endif
                @endforeach
            </div>
            @foreach($respostas as $resposta)
            @foreach($perg_resp as $pergresp)
            @if($pergresp->perg_id==$ref->id)
            @if($pergresp->resp_id==$resposta->id)
            <div class="row">
                &emsp;&emsp;&emsp;
                <h4 display="inline" class="col-1"><?php echo $letras[$y]; ?></h4>
                <h4 display="inline" align="left" class="col">{{$resposta->resposta}}</h4>
                <span class="col">
                    <button type="button" class="btn btn-outline-info fa fa-pencil" data-toggle="modal" data-target="#respostaModal" data-whatevern="<?php echo $y; ?>" data-whateverresp="{{$resposta->resposta}}" data-whatevertyperesp="{{$resposta->tipo_resp}}" data-whateveridresp="{{$resposta->id}}" data-whatevercorrect="{{$resposta->corret}}"></button>
                    <a href="{{ url('admin/deletar-resposta/'.$resposta->id) }}" class="btn btn-outline-danger fa fa-trash"></a>
                </span>
            </div>
            <?php $y++; ?>
            <br><br>
            @endif
            @endif
            @endforeach
            @endforeach
            @endif
            @endforeach
            @endif
            @endforeach
            <br><br><br>
            <hr style="border: 0.8px solid #afafaf;">
            <br>

            @endforeach

            <div class="container">
                {{$data->links()}}
            </div>
            <div align="right">
                <button type="button" align="right" class="btn btn-outline-danger" data-toggle="modal" data-target="#alteraModal">Alterar sequência</button>
            </div>
            <br>

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
                            <?php $ab=1 ;?>
                            @foreach($pergs as $item)
                            <li class="ui-state-default" value="{{$item->id}}"><?php echo $ab++;?>:&nbsp;{{$item->pergunta}}</li>
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

                        <div id="edit_ambiente" style="margin: 0% 2% 1% 2%">
                            <br>
                            <div class="form-group row">
                                <label class="col" for="pergunta_ambientex">Tipo:</label>
                                <select name="pergunta_ambientex" id="pergunta_ambientex" class="col">
                                    <option value="1">Corredor</option>
                                    <option value="2">Labirinto</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col" for="pergunta_tamanhox">Tamanho:</label>
                                <select name="pergunta_tamanhox" id="pergunta_tamanhox" class="col">
                                    <option value="1">Pequeno</option>
                                    <option value="2">Medio</option>
                                    <option value="3">Grande</option>
                                </select>
                            </div>
                            <div class="form-group row">
                                <label class="col" for="pergunta_largurax">Largura:</label>
                                <select name="pergunta_largurax" id="pergunta_largurax" class="col">
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
                </div>
                <form action="{{ url('admin/editar-perg' ) }}" method="POST" style="margin-left: 5%;margin-right:1%">
                    <div class="modal-body">
                        <input type="hidden" value="{{$id}}" name="sala_id">
                        <input type="hidden" name="pergunta_id" id="pergunta_id">
                        <input type="hidden" name="pergunta_path" id="pergunta_path">
                        @csrf
                        {{ csrf_field() }}
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#edit_perg">Pergunta</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#edit_ambi">Configurações do Ambiente</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <!-- PERGUNTAS -->
                            <div id="edit_perg" class="tab-pane fade show active" style="margin: 0% 2% 1% 2%">
                                <div class="form-group row">
                                    <br>
                                    <label for="pergunta_type" class="control-label" class="col">Tipo da pergunta:</label>
                                    <select name="pergunta_type" id="pergunta_type" class="col">
                                        <option value="1">Texto</option>
                                        <option value="2">Imagem</option>
                                        <option value="3">video</option>
                                        <option value="4">Audio</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="perg_room_type" class="control-label" class="col">Interação:</label>
                                    <select name="perg_room_type" id="perg_room_type" class="col">
                                        <option selected value="key">Chave</option>
                                        <option value="door">Porta</option>
                                        <option value="diamond">Diamante</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="pergunta_name" class="control-label col">Pergunta:</label>
                                    <input type="text" class="form-control col" id="pergunta_name" name="pergunta_name" maxlength="80" required>
                                </div>
                            </div>
                            <!-- AMBIENTE -->

                            <div id="edit_ambi" class="tab-pane fade" style="margin: 0% 2% 1% 2%">
                                <br>
                                <div class="form-group row">
                                    <label class="col" for="pergunta_ambiente">Tipo:</label>
                                    <select name="pergunta_ambiente" id="pergunta_ambiente">
                                        <option value="1">Corredor</option>
                                        <option value="2">Labirinto</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col" for="pergunta_tamanho">Tamanho:</label>
                                    <select name="pergunta_tamanho" id="pergunta_tamanho">
                                        <option value="1">Pequeno</option>
                                        <option value="2">Medio</option>
                                        <option value="3">Grande</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label class="col" for="pergunta_largura">Largura:</label>
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
            </div>
            <form action="{{ url('admin/editar-resp') }}" method="POST" style="margin-left: 5%;margin-right:1%">
                <div class="modal-body">
                    <input type="hidden" value="{{$id}}" name="sala_id">
                    <input type="hidden" name="resposta_id" id="resposta_id">
                    @csrf
                    {{ csrf_field() }}
                    <div id="edit_resp">
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
                                            <option value="0">Errada</option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" id="resposta_name" name="resposta_name" maxlength="80" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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


@endsection
