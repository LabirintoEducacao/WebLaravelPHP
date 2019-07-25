$(document).ready(function(){
    var x=1;
    var y=1;
    var z=0;
    var divP = $('#caixa');
    // divP.append('<form action="editar-sala" method="POST" style="margin-left: 5%;margin-right:1%">');
    var btnCriar = $('#nova');

//    var btnResp = $('#nresp');

    btnCriar.click(function(){
        if(y<=50){
            if(x>1){
                divP.append('<hr style="background-color:#8e8e8e;height:3px">');
                
                
                var respMax = document.getElementById('respMax').value;
                respMax++;
                console.log('MAXIMO DE REPOSTAS: '+respMax);
                document.getElementById('respMax').value = respMax;
                
                
                var pergMax = document.getElementById('pergMax').value;
                pergMax++;
                console.log('MAXIMO DE PERGUNTAS: '+pergMax);
                document.getElementById('pergMax').value = pergMax;
            }else if(x==1)
                divP.append('<input type="hidden" id="respMax" value="1"><input type="hidden" id="pergMax" value="1">');
                
            divP.append('<div id="c'+x+'"></div>');
            var divPai = $('#c'+x);
            divPai.append('<h4 align="center">Pergunta n°'+x+'&emsp;<button class="btn btn-outline-info" id="nresp'+x+'" onclick="addR(this.id,'+x+');">ADICIONAR RESPOSTA</button><button class="btn btn-outline-danger" id="" onclick="delR(c'+x+');" style="float:right">DELETAR PERGUNTA</button></h4><input type="hidden" id="valor'+x+'" value="1"><br>');
    //        onclick="addR(this.id,'+y+');"
    //        var btnRespI = $('#nresp'+x);
            divPai.append('<div id="p'+x+'">');
            var divPerg = $('#p'+x);
            divPerg.append('<div class="form-group" id="f'+x+'"></div>');
            var divF = $('#f'+x);
            divF.append('<div class="form-group"><h4>&emsp;<input type="checkbox" id="pergR'+x+'" name="pergR'+x+'" value="Pergunta reforço">&nbsp;Pergunta reforço</h4><input type="number" name="numR" class="form-control" placeholder="Reforço da pergunta" style="width: 500px;" id="nref'+x+'" min="0" max="50"><br><h4 class="col-md-2">Número da pergunta:</h4><input type="number" name="Numero" class="form-control" placeholder="Número da pergunta" style="width: 500px;" id="nperg'+x+'" min="0" max="50" value="'+x+'"><br></div>');

            $('#nref'+x).css("display", "none");

    //        $('#pergR'+x).click(function(){
    //            if($('#pergR'+x).attr('checked')){
    //                $('#nref'+x).css("display", "block");
    //            }
    //            else
    //            {
    //                $('#nref'+x).css("display", "none");
    //            }
    //        });

            divF.append('<h4 class="col-md-2"> Tipo da pergunta: </h4');
            divF.append('<select id="tipop'+x+'" name="question_type'+x+'"></select>');
            var Select = $('#tipop'+x);
            Select.append('<option value="1">Texto</option>');
            Select.append('<option value="2">Imagem</option>');
            Select.append('<option value="3">Video</option>');
            Select.append('<option value="4">Aúdio</option>');
            divPerg.append("<br>");
            divPerg.append('<div class="form-group"><h4 class="col-md-2"> Pergunta:</h4><input type="text" name="pergunta'+x+'" class="form-control" placeholder="Pergunta" style="width: 500px;" id="perg'+x+'"></div>');
            divPai.append('<hr style="background-color:rgba(160, 160, 160, 0.87);height:1px">');
            divPai.append('<div id="jperg'+x+'"></div>');
            var divJogo = $('#jperg'+x);
            divJogo.append('<div class="form-group"><h4 align="center">Características da exibição da pergunta</h4><br><h4 class="col-md-2"> Tipo:</h4><select id="tipo'+x+'" name="answer_boolean'+x+'"></select><br><br><h4 class="col-md-2"> Tamanho:</h4><select id="tam'+x+'" name="tamanho'+x+'"></select><br><br><h4 class="col-md-2"> Largura:</h4><select id="larg'+x+'" name="largura'+x+'"></select></div>');

            var Tipo = $('#tipo'+x);
            Tipo.append('<option value="1">Corredor</option>');
            Tipo.append('<option value="2">Labirinto</option>');
            var Tamanho = $('#tam'+x);
            Tamanho.append('<option value="1">Pequeno</option>');
            Tamanho.append('<option value="2">Médio</option>');
            Tamanho.append('<option value="3">Grande</option>');
            var Largura = $('#larg'+x);
            Largura.append('<option value="1">Pequeno</option>');
            Largura.append('<option value="2">Médio</option>');
            Largura.append('<option value="3">Grande</option>');

            divPai.append('<hr style="background-color:rgba(160, 160, 160, 0.87);height:1px">');
            divPai.append('<div id="r'+y+'"><h4 align="center">Respostas:</h4></div>');
            var divResp = $('#r'+y);
            divResp.append('<div class="form-group" id="fr'+y+'"></div>');
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
            Boolean.append('<option value="1">Errada</option>');

            divResp.append("<br>");
            divResp.append('<div class="form-group"><h4 class="col-md-2">Resposta:</h4><input type="text" name="resposta'+y+'" class="form-control" placeholder="Resposta" style="width: 500px;" id="resp'+y+'"></div>');

            divPai.append('</div>');
    //        
    //        var y=('#question_type').val();
            z=x;
            x++;
            y++;


            btnRespI.click(function(){
                    divPai.append('<hr style="background-color:rgba(160, 160, 160, 0.87);height:1px">');
                    divPai.append('<div id="r'+y+'">');
                    var divResp = $('#r'+y);
                    divResp.append('<div class="form-group" id="fr'+y+'"></div>');
                    divResp.append('<input type="hidden" value="perg'+(x-1)+'" id="perg'+(x-1)+'">')
                    var divFr = $('#fr'+y);
                    divFr.append('<h4 class="col-md-2"> Tipo da resposta: </h4>');
                    divFr.append('<select id="tipor'+y+'" name="answer_tipo"></select>');
                    divFr.append('<br><br><h4 class="col-md-2">Esta resposta está: </h4>');
                    divFr.append('<select id="boor'+y+'" name="answer-definitions"></select>');
                    var Select = $('#tipor'+y);
                    Select.append('<option value="1">Texto</option>');
                    Select.append('<option value="2">Imagem</option>');
                    Select.append('<option value="3">Video</option>');
                    Select.append('<option value="4">Aúdio</option>');

                    var Boolean = $('#boor'+y);
                    Boolean.append('<option value="0">Certa</option>');
                    Boolean.append('<option value="1" selected>Errada</option>');
                    divResp.append("<br>");
                    divResp.append('<div class="form-group"><h4 class="col-md-2"> Resposta:</h4><input type="text" name="resposta" class="form-control" placeholder="Resposta" style="width: 500px;" id="resp'+y+'"></div>');
                    divPai.append('</div>');
                    y++;

            });


    //        document.write(itemSelecionado.text() + ' text()<br>');
    //        
    //        var option = $('#question_type').find(":selected").text();
    //        divPai.append('<h4>Tipo: '+itemSelecionado.val()+'</h4>');
    //        divPai.append('<h4>Tipo: '+itemSelecionado.text()+'</h4>');
        }
    });
    
    
    
    btnResp.click(function(){
        if(x>1){
            divPai.append('<hr style="background-color:rgba(160, 160, 160, 0.87);height:1px">');
            divPai.append('<div id="r'+y+'">');
            var divResp = $('#r'+y);
            divResp.append('<div class="form-group" id="fr'+y+'"></div>');
            divResp.append('<input type="hidden" value="perg'+(x-1)+'" id="perg'+(x-1)+'">')
            var divFr = $('#fr'+y);
            divFr.append('<h4 class="col-md-2"> Tipo da resposta: </h4>');
            divFr.append('<select id="tipor'+y+'" name="answer_type"></select>');
            divFr.append('<br><br><h4 class="col-md-2">Esta resposta está: </h4>');
            divFr.append('<select id="boor'+y+'" name="answer_boolean"></select>');
            var Select = $('#tipor'+y);
            Select.append('<option value="1">Texto</option>');
            Select.append('<option value="2">Imagem</option>');
            Select.append('<option value="3">Video</option>');
            Select.append('<option value="4">Aúdio</option>');

            var Boolean = $('#boor'+y);
            Boolean.append('<option value="0">Certa</option>');
            Boolean.append('<option value="1" selected>Errada</option>');
            divResp.append("<br>");
            divResp.append('<div class="form-group"><h4 class="col-md-2"> Resposta:</h4><input type="text" name="Time" class="form-control" placeholder="Resposta" style="width: 500px;" id="resp'+y+'"></div>');
            divPai.append('</div>');
            y++;
        }
        
    });
 
});

    $('#perguntaModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient = button.data('whatever'); // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome');
      var recipientperg = button.data('whatevertype');
      var recipientdetalhes = button.data('whateverdetalhes');
      var recipienttamanho = button.data('whatevertamanho');
      var recipientlargura = button.data('whateverlargura');
      var recipientid = button.data('whateveridperg');
      
      
      
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('.modal-title').text('Nº ' + recipient);
      modal.find('#id-curso').val(recipient);
      modal.find('#pergunta_name').val(recipientnome);
      modal.find('#pergunta_type').val(recipientperg);
      modal.find('#pergunta_ambiente').val(recipientdetalhes);
      modal.find('#pergunta_tamanho').val(recipienttamanho);
      modal.find('#pergunta_largura').val(recipientlargura);
      modal.find('#pergunta_id').val(recipientid);
      
    });

    $('#respostaModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient = button.data('whatevern'); // Extract info from data-* attributes
      var recipientnome = button.data('whateverresp');
      var recipientresp = button.data('whatevertyperesp');
      var recipientid = button.data('whateveridresp');
      
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('.modal-title').text('Nº ' + recipient);
      modal.find('#id-curso').val(recipient);
      modal.find('#resposta_name').val(recipientnome);
      modal.find('#resposta_type').val(recipientresp);
      modal.find('#resposta_id').val(recipientid);
      
    });

    $('#salaModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient = button.data('whatever'); // Extract info from data-* attributes
      var recipientnome = button.data('whatevernome');
      
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('.modal-title').text('Nº ' + recipient);
      modal.find('.sala_name').text('Sala ' + recipientnome);
      modal.find('#sala_id').val(recipient);

      
    });



