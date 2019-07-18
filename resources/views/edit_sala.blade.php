@extends('adminlte::page')

@section('content')
<div class="container"style="padding-right: 100px; padding-left: 100px;">
  
                    <input type="hidden" value="52" id="num_y">

                      <p style="font-size:35px;" align="center"> Incluindo Perguntas e Respostas&emsp;<button class="btn btn-outline-info" id="nova">ADICIONAR PERGUNTA E RESPOSTA</button></p>

        <form action=" {{ url('admin/editar-sala')}}" method="POST" style="margin-left: 25%;margin-right:1%">
                           @csrf
                        {{ csrf_field() }}
                        
                                            
<!-------------------------  PERGUNTA  -------------------------------->
                           


                      <p class="card-title" >{{Auth::user()->name}} </p>
                        <input type="hidden" name="id_sala" value="{{ $id }}">
                     

                        <div class="form-group">
                             <h4 class="col-md-2"> Tipo da perguntas: </h4>
                            <select  name ="question_type">
                                <option selected value="1">Texto</option>
                                <option value="2">Imagem</option>
                                <option value="3">video</option>
                                <option value="4">Audio</option>
                                
                             </select>

                        </div>
                        <br>
                        <div class="form-group">
                            <h4 class="col-md-2"> Pergunta:</h4>
                            <input type="text" name="pergunta" class="form-control" placeholder="Pergunta" style="width: 500px;">
                        </div>

                       <input type="hidden" name="id_prof" value="{{ Auth::user()->id }}">
<!-------------------------  RESPOSTAS  -------------------------------->


                          <h3>Resposta</h3>
                        <div class="form-group">

                           
                             <h4 class="col-md-2"> Tipo da resposta: </h4>
                            <select name ="answer_tipo">
                                <option selected value="4">Texto</option>
                                <option value="1">Imagen</option>
                                <option value="2">video</option>
                                <option value="3">Audio</option>
                                
                             </select>
                               </div>

                             <div class="form-group">
                            <h4 class="col-md-2"> Definição da resposta: </h4>
                            <select name ="answer-definitions">
                                <option selected value="1">Certa</option>          
                                <option value="2">Fim de Jogo</option>   
                             </select>

                        </div>
                        
                        <div class="form-group">
                            <h4 class="col-md-2"> Resposta:</h4>
                            <input type="text" name="resposta" class="form-control"
                             placeholder="Resposta" style="width: 500px;">
                        </div>

                        


                       <!--  <div id="caixa">
                           
                        </div>
 -->
                                
                        
                           
                                   
                        
                     
                     
<!--                        <button class="btn btn-outline-info" id="nresp">ADICIONAR RESPOSTA</button>-->

------  DEFINIÇOES DAS RESPOSTAR PARA O LABIRINTO   -----

                          <p style="font-size:40px; ">Definição de como o Jogo mostrará essa pergunta</p>

                          <div class="form-group">
                             <strong class="col-md-2"> Tipo: </strong>
                            <select name ="answer_boolean">
                                <option selected value="1">Corredor</option>
                                <option value="2">Labirinto</option>
                                    
                             </select>
                        </div>


                        <div class="form-group">
                             <strong class="col-md-2"> Tamanho: </strong>
                            <select name ="tamanho">
                                <option selected value="1">Pequeno</option>
                                <option value="2">Medio</option>
                                <option value="3">Grande</option>
                                    
                             </select>
                        </div>
                        
                        <div class="form-group">
                             <strong class="col-md-2"> Largura: </strong>
                            <select name ="largura">
                                <option selected value="1">Pequeno</option>
                                <option value="2">Medio</option>
                                <option value="3">Grande</option>
                                    
                             </select>
                        </div>
             <button type="submit" class="btn btn-outline-danger btn-lg btn-block">CRIAR SALA</button>
                        </form>
                        

                    
    
    <script>
        function addR(id,x){
            var resp = document.getElementById('valor'+x).value;
            if(resp<=3){
                var divPai = $('#c'+x);
                var y = document.getElementById("num_y").value;
                divPai.append('<hr style="background-color:rgba(160, 160, 160, 0.87);height:1px">');
                divPai.append('<div id="r'+y+'">');
                var divResp = $('#r'+y);
                divResp.append('<div class="form-group" id="fr'+y+'"></div>');
                divResp.append('<input type="hidden" value="perg'+x+'" id="perg'+x+'">')
                var divFr = $('#fr'+y);
                divFr.append('<h4 class="col-md-2">Tipo da resposta: </h4><button class="btn btn-outline-danger fa fa-trash" id="delete'+y+'" onclick="delR(r'+y+');" style="float:right"></button>');
                divFr.append('<select id="tipor'+y+'" name="answer_tipo'+y+'"></select>');
                divFr.append('<br><br><h4 class="col-md-2">Esta resposta está: </h4>');
                divFr.append('<select id="boor'+y+'" name="answer-definitions'+y+'"></select>');
                var Select = $('#tipor'+y);
                Select.append('<option value="1">Texto</option>');
                Select.append('<option value="2">Imagem</option>');
                Select.append('<option value="3">Video</option>');
                Select.append('<option value="4">Aúdio</option>');

                var Boolean = $('#boor'+y);
                Boolean.append('<option value="0">Certa</option>');
                Boolean.append('<option value="1" selected>Errada</option>');
                divResp.append("<br>");
                divResp.append('<div class="form-group"><h4 class="col-md-2"> Resposta:</h4><input type="text" name="resposta'+y+'" class="fo    control" placeholder="Resposta" style="width: 500px;" id="resp'+y+'"></div>');
                divPai.append('</div>');
                y++;
                console.log(y);
                document.getElementById('num_y').value = y;
                
                resp++;
                console.log(resp);
                document.getElementById('valor'+x).value = resp;
                
                var respMax = document.getElementById('respMax').value;
                respMax++;
                console.log('MAXIMO DE REPOSTAS: '+respMax);
                document.getElementById('respMax').value = respMax;
                
            }else{
                alert('Não é possível adicionar mais respostas a essa pergunta');
            }

        }
        
        
        function delR(x){
            var divPai = $('#'+x);
            divPai.remove();

        }
    
    
    </script>
    
    
</div>

@endsection