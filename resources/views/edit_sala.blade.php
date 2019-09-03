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
                                        <option value="3">video</option>
                                        <option value="4">Audio</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <br>
                                    <label for="room_type" class="col">Interação:</label>
                                    <select name="room_type" id="room_type" class="col">
                                        <option value="right_key">Chave</option>
                                        <option value="hope_door" selected>Porta da esperança</option>
                                        <option value="true_or_false">Verdadeiro ou Falso </option>
                                        <option value="multiple_forms">Multiplas Formas</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <input type="hidden" value="0" name="perg_id" id="perg_id">
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
                                                <select name="tipo_resp[]" id="tipo_opcao" class="form-control tipo_resp">
                                                    <option selected value="1">Texto</option>
                                                    <option value="2">imagem</option>
                                                    <option value="3">video</option>
                                                    <option value="4">Audio</option>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="corret[]" class="form-control corret">
                                                    <option selected value="1">Certa</option>
                                                    <option value="0">Errada</option>
                                                </select>
                                            </td>
                                            <td><input type="text" name="resposta[]" id="resposta" placeholder="Resposta" class="form-control name_list resposta" maxlength="80" required>
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
    <?php $x=1;$y=0;$letras = array("a)", "b)", "c)", "d)"); ?>
    

    <div class="container-fluid row desktop" style="padding-top: 10px;">

        <!------- Estrutura de repetição (CARD)------------------->
        <div class="col-md-12" style="padding-top:20px;" display="inline">
            <br>
            @foreach($data as $item)
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="row">
                        <?php $errado=0; ?>
                        @foreach($path_perg as $pp)
                        @if($pp->perg_id==$item->id)

                        @foreach($paths as $path)
                        @if($path->id==$pp->path_id)

                        @if($path->disp == 1)
                        <h4 display="inline" class="col-sm-12 col-md-3">Pergunta:&emsp;</h4>
                        <h4 display="inline" align="left" class="col-sm-12 col-md-8">{{$item->pergunta}}</h4>
                        <span class="col-sm-12 col-md-1">
                             <button type="button" class="btn btn-outline-info fa fa-pencil" data-toggle="modal" data-target="#addPerg" data-whatever="{{$item->id}}"title="Editar pergunta"></button>
                              <a href="{{ url('admin/deletar-pergunta/'.$item->id) }}" class="btn btn-outline-danger fa fa-trash"></a>

                        </span>
                        @endif
                        
                        @endif
                        @endforeach
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
                        <h4 display="inline" class="col-sm-12 col-md-1"><?php echo $letras[$y]; ?>&emsp;</h4>
                        <h4 display="inline" align="left" class="col-sm-12 col-md-11">{{$resposta->resposta}}</h4>
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
                <h4 display="inline" class="col-sm-12 col-md-2">Reforço:&emsp;</h4>
                <h4 display="inline" align="left" class="col-sm-12 col-md-10">{{$ref->pergunta}}</h4>
                
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
                <h4 display="inline" class="col-sm-12 col-md-1"><?php echo $letras[$y]; ?>&emsp;</h4>
                <h4 display="inline" align="left" class="col-sm-12 col-md-1">{{$resposta->resposta}}</h4>
                
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
            <br>
            <div>
                <a style="width:100%" class="btn btn-outline-cyan" href="{{ url('/admin/virtual/'.$id)}}">SALVAR TODAS AS ALTERAÇÕES</a>
            </div>

        </div>


    </div>
    


    
@endsection
