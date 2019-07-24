@extends('adminlte::page')

@section('content')
<div class="container"style="padding-right: 100px; padding-left: 100px;">
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
        <form action="{{ url('admin/editar-sala') }}" method="POST" style="margin-left: 5%;margin-right:1%">
          <input type="hidden" value="{{$id}}" name="sala_id">
          <div class="modal-body">
          
            @csrf
            {{ csrf_field() }}

            <ul class="nav nav-tabs">
              <li class="active col-md-4 lista"><a data-toggle="tab" href="#perg">Pergunta</a></li>
              <li class="col-md-4 lista"><a data-toggle="tab" href="#resp">Resposta</a></li>
              <li class="col-md-4 lista"><a data-toggle="tab" href="#ambiente">Configurações do Ambiente</a></li>
            </ul>

            <div class="tab-content">

              <!-- PERGUNTAS -->
              <div id="perg" class="tab-pane fade in active">
                <div class="form-group">
                  <br>
                  <h4 style="display: inline;"> Tipo da pergunta:&emsp;</h4>
                  <select  name ="question_type">
                    <option selected value="1">Texto</option>
                    <option value="2">Imagem</option>
                    <option value="3">video</option>
                    <option value="4">Audio</option>
                  </select>
                </div>
                <div class="form-group">
                  <h4>Pergunta:</h4>
                  <input type="text" name="pergunta" class="form-control" placeholder="Pergunta" style="width: 500px;">
                </div>
              </div>

              <!-- RESPOSTAS -->
              <div id="resp" class="tab-pane fade">
                <div class="form-group">
                  <br>
                  <h4 style="display: inline;" class="col-md-5">Tipo da resposta:&emsp;</h4>
                  <select  name ="answer_tipo">
                    <option selected value="1">Texto</option>
                    <option value="2">Imagem</option>
                    <option value="3">video</option>
                    <option value="4">Audio</option>
                  </select>
                </div>
                
                <div class="form-group">
                  <h4 class="col-md-5">Definição da resposta: </h4>
                  <select name ="answer-definitions">
                    <option selected value="1">Certa</option>          
                    <option value="2">Fim de Jogo</option>   
                  </select>
                </div>
                <div class="form-group">
                  <table>
                    <tr>
                      <td>
                        <h4 class="col-md-3">Resposta:&emsp;&emsp;</h4>
                      </td>
                      <td>
                        <input type="text" name="resposta" class="form-control" placeholder="Resposta">
                      </td>
                      <td>&emsp;
                        <button class="fa fa-plus btn btn-outline-success btn-sm"></button>
                      </td>
                    </tr>
                  </table>
                </div>
              </div>

              <!-- AMBIENTE -->
              <div id="ambiente" class="tab-pane fade">
                <br>
                <div class="form-group">
                  <span class="col-md-3">Tipo:&emsp;</span>
                  <select name ="answer_boolean">
                    <option selected value="1">Corredor</option>
                    <option value="2">Labirinto</option>
                  </select>
                </div>
                <div class="form-group">
                  <span class="col-md-3">Tamanho:</span>
                  <select name ="tamanho">
                    <option selected value="1">Pequeno</option>
                    <option value="2">Medio</option>
                    <option value="3">Grande</option>                                
                  </select>
                </div>
                <div class="form-group">
                  <span class="col-md-3">Largura:&emsp;</span>
                  <select name ="largura">
                    <option selected value="1">Pequeno</option>
                    <option value="2">Medio</option>
                    <option value="3">Grande</option>                                    
                  </select>
                </div>
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

  <div>
    
  </div>
  <div class="container-fluid" style="padding-top: 10px; ">
   <?php $x=1;$y=1; ?>
   
<!------- Estrutura de repetição (CARD)------------------->
<div class="col-md-6" style="padding-top:20px;" display="inline">
  <div class="card">
    <table>
      <tr>
        <th class="col-md-1"></th>
        <th class="col-md-5">Pergunta</th>
        <!-- <th class="col-md-3">Resposta</th> -->
        <th class="col-md-3"></th>
      </tr>
      @foreach($data as $item)
          <tr>
            <td class="col-md-1"><?php echo $x; ?></td>
            <td class="col-md-5">{{$item->pergunta}}</td>
<!--             <td class="col-md-3">POR ENQUANTO NADA</td> -->
            <td>
              <button type="button" class="btn btn-outline-info fa fa-pencil" data-toggle="modal" data-target="#perguntaModal" data-whatever="<?php echo $x; ?>" data-whatevernome="{{$item->pergunta}}" data-whateverdetalhes="{{$item->ambiente_perg}}" data-whatevertype="{{$item->tipo_perg}}" data-whatevertamanho="{{$item->tamanho}}" data-whateverlargura="{{$item->largura}}" data-whateveridperg="{{$item->id}}"></button>
              <a href="{{ url('admin/deletar-pergunta/'.$item->id) }}" class="btn btn-outline-danger fa fa-trash"></a>
            </td>
          </tr>
          <?php $x++; ?>

      @endforeach
    </table>
  </div>
</div>
<div class="col-md-6" style="padding-top:20px;">
  <div class="card">
    <table>
      <tr>
        <th class="col-md-1"></th>
        <th class="col-md-5">Resposta</th>
        <!-- <th class="col-md-3">Resposta</th> -->
        <th class="col-md-3"></th>
      </tr>
      @foreach($respostas as $resposta)
          <tr>
            <td class="col-md-1"><?php echo $y; ?></td>
            <td class="col-md-5">{{$resposta->resposta}}</td>
<!--             <td class="col-md-3">POR ENQUANTO NADA</td> -->
            <td>
              <button type="button" class="btn btn-outline-info fa fa-pencil" data-toggle="modal" data-target="#respostaModal" data-whatevern="<?php echo $y; ?>" data-whateverresp="{{$resposta->resposta}}" data-whatevertyperesp="{{$resposta->tipo_resp}}" data-whateveridresp="{{$resposta->id}}"></button>
              <a href="{{ url('admin/deletar-pergunta/'.$resposta->id) }}" class="btn btn-outline-danger fa fa-trash"></a>
            </td>
          </tr>
          <?php $y++; ?>
      @endforeach
    </table>
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
        <form action="{{ url('admin/editar-perg') }}" method="POST" style="margin-left: 5%;margin-right:1%">
          <div class="modal-body">
            <input type="hidden" value="{{$id}}" name="sala_id">
            <input type="hidden" name="pergunta_id" id="pergunta_id">
            @csrf
            {{ csrf_field() }}
            <ul class="nav nav-tabs">
              <li class="active col-md-6 lista"><a data-toggle="tab" href="#edit_perg">Pergunta</a></li>
              <li class="col-md-6 lista"><a data-toggle="tab" href="#edit_ambiente">Configurações do Ambiente</a></li>
            </ul>
            <div class="tab-content">
              <!-- PERGUNTAS -->
              <div id="edit_perg" class="tab-pane fade in active">
                <div class="form-group">
                <br>
                <label for="pergunta_type" class="control-label" style="display: inline;">Tipo da pergunta:&emsp;</label>
                <select name ="pergunta_type" id ="pergunta_type">
                  <option value="1">Texto</option>
                  <option value="2">Imagem</option>
                  <option value="3">video</option>
                  <option value="4">Audio</option>
                </select>
                </div>
                <div class="form-group">
                  <label for="pergunta_name" class="control-label">Pergunta:</label>
                  <input type="text" class="form-control" id="pergunta_name" name="pergunta_name">
                </div>
              </div>
              <!-- AMBIENTE -->
              <div id="edit_ambiente" class="tab-pane fade">
                <br>
                <div class="form-group">
                  <span class="col-md-3">Tipo:&emsp;</span>
                  <select name ="pergunta_ambiente" id="pergunta_ambiente">
                    <option value="1">Corredor</option>
                    <option value="2">Labirinto</option>
                  </select>
                </div>
                <div class="form-group">
                  <span class="col-md-3">Tamanho:</span>
                  <select name ="pergunta_tamanho" id="pergunta_tamanho">
                    <option value="1">Pequeno</option>
                    <option value="2">Medio</option>
                    <option value="3">Grande</option>                                
                  </select>
                </div>
                <div class="form-group">
                  <span class="col-md-3">Largura:&emsp;</span>
                  <select name ="pergunta_largura" id="pergunta_largura">
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
                <div class="form-group">
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
                </div>
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