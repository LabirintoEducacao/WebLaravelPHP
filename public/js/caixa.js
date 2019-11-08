      $(document).ready(function () {

          //$('#pergunta').summernote();


          var postURL = 'editar-sala/';
          var i = 0;
          var i2 = 0;
          // botao para add resposta fields
          var a = 0;
          var b = 0;

          $('#add').click(function () {
              if (a < 2) {
                  if($('.room_type').val() == 'true_or_false'){
                  $('#dynamic_field').append('' +
                      '<div id="row' + i + '" class="dynamic-added">' +
                      '<div class="card houvercard">' +
                      '<div class="container">' +
                      '<div class="textareaborda2" style="margin-top: 10px;">' +
                      '<textarea type="text" name="resposta[]" placeholder="' + (a + 2) + 'º Resposta" rows="2" class="form-control name_list resposta" maxlength="500" required/>' +
                      '<input type="hidden" name="resp_id[]" class="resp_id">' +
                      '</div>' +
                      '<div class="row align-items-center" style="margin-bottom: 10px;">' +
                      '<div class="col col-sm-11">' +
                      '<div class="form-check form-check-radio">' +
                      'Essa resposta esta correta?&emsp;' +
                      '<label class="form-check-label">' +
                      '<input class="form-check-input correct verdadeiro2" type="checkbox" name="corret[]" value="0" onclick="muda(this);">' +
                      'Sim' +
                      '<span class="circle">' +
                      '<span class="check"></span>' +
                      '</span>' +
                      '</label>' +
                      '</div>' +
                      '</div>' +
                      '<div class="col col-sm-1">' +
                      '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove">X</button>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>');
                }else{

                  $('#dynamic_field').append('' +
                      '<div id="row' + i + '" class="dynamic-added">' +
                      '<div class="card houvercard">' +
                      '<div class="container">' +
                      '<div class="textareaborda2" style="margin-top: 10px;">' +
                      '<textarea type="text" name="resposta[]" placeholder="' + (a + 2) + 'º Resposta" rows="2" class="form-control name_list resposta" maxlength="500" required/>' +
                      '<input type="hidden" name="resp_id[]" class="resp_id">' +
                      '</div>' +
                      '<div class="row align-items-center" style="margin-bottom: 10px;">' +
                      '<div class="col col-sm-11">' +
                      '<div class="form-check form-check-radio">' +
                      'Essa resposta esta correta?&emsp;' +
                      '<label class="form-check-label">' +
                      '<input class="form-check-input correct verdadeiro2" type="radio" name="corret[]" value="0" onclick="muda(this);">' +
                      'Sim' +
                      '<span class="circle">' +
                      '<span class="check"></span>' +
                      '</span>' +
                      '</label>' +
                      '</div>' +
                      '</div>' +
                      '<div class="col col-sm-1">' +
                      '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove">X</button>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>');
                     
                }
                  a++;
                  i++;
                  
                  if(a==2){
                      $("#add").attr('disabled',true)
                  }

                }

                 if(a == 2){

                  function alerttotalresposta(msg, type){
                   var html =  '<div class="alertContainer3 '+type+'">\n';
                  html += '<div class="row align-items-center">';
                  html += '<div class="col-sm-10">';
                  html +=     '<div class="mensajeAlert">'+msg+'</div>\n';
                  html +=     '</div>';
                  html += '<div class="col-sm-2">';
                  html +=     '<div class="cerrarAlert">x</div>\n';
                  html +=     '</div>';
                  html +=     '</div>';
                  html +=     '</div>';
                  jQuery('body').append(html);
                  window.setTimeout(function(){jQuery('.alertContainer3').addClass('active')}, 500);
                  jQuery('.cerrarAlert').click(function(){
                  jQuery('.alertContainer3').removeClass('active');
                  window.setTimeout(function(){jQuery('.alertContainer3').remove()}, 500);
                  });
                  }


                  $('#add').click(function(){
                  alerttotalresposta("Limite Máximo de resposta para cada labirinto são 3 !","warning");

                  });
                    
                  }



          });

          //////////////////////////////////////////////////////////////////////////
          $(document).on('click', '.teste', function () {


                if(b == 2){

                  function alerttotalresposta(msg, type){
                   var html =  '<div class="alertContainer3 '+type+'">\n';
                  html += '<div class="row align-items-center">';
                  html += '<div class="col-sm-10">';
                  html +=     '<div class="mensajeAlert">'+msg+'</div>\n';
                  html +=     '</div>';
                  html += '<div class="col-sm-2">';
                  html +=     '<div class="cerrarAlert">x</div>\n';
                  html +=     '</div>';
                  html +=     '</div>';
                  html +=     '</div>';
                  jQuery('body').append(html);
                  window.setTimeout(function(){jQuery('.alertContainer3').addClass('active')}, 500);
                  jQuery('.cerrarAlert').click(function(){
                  jQuery('.alertContainer3').removeClass('active');
                  window.setTimeout(function(){jQuery('.alertContainer3').remove()}, 500);
                  });
                  }


                  $('.teste').click(function(){
                  alerttotalresposta("Limite Máximo de resposta para cada labirinto são 3 !","warning");

                  });
                    
                  }


              if (b < 2) {
                console.log("passou "+b);
                if($('#room_type_ref').val() == 'true_or_false'){
                  $('#dynamic_field2').append('' +
                      '<div id="row2' + i2 + '" class="dynamic-added2">' +
                      '<div class="card houvercard">' +
                      '<div class="container">' +
                      '<div class="textareaborda2" style="margin-top: 10px;">' +
                      '<textarea type="text" name="resposta_ref[]" placeholder="' + (b + 2) + 'º Resposta refoço" rows="2" class="form-control name_list resposta_ref" maxlength="500" required/>' +
                      '<input type="hidden" name="resp_ref_id[]" class="resp_id">' +
                      '</div>' +
                      '<div class="row align-items-center" style="margin-bottom: 10px;">' +
                      '<div class="col col-sm-11">' +
                      '<div class="form-check form-check-radio">' +
                      'Essa resposta esta correta?&emsp;' +
                      '<label class="form-check-label">' +
                      '<input class="form-check-input correct verdadeiro" type="checkbox" name="corret_ref[]" value="0" onclick="muda(this);">' +
                      'Sim' +
                      '<span class="circle">' +
                      '<span class="check"></span>' +
                      '</span>' +
                      '</label>' +
                      '</div>' +
                      '</div>' +
                      '<div class="col col-sm-1">' +
                      '<button type="button" name="remove2" id="' + i2 + '" class="btn btn-danger btn-sm btn_remove2">X</button>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>'
                  );
                }else{

                   $('#dynamic_field2').append('' +
                      '<div id="row2' + i2 + '" class="dynamic-added2">' +
                      '<div class="card houvercard">' +
                      '<div class="container">' +
                      '<div class="textareaborda2" style="margin-top: 10px;">' +
                      '<textarea type="text" name="resposta_ref[]" placeholder="' + (b + 2) + 'º Resposta refoço" rows="2" class="form-control name_list resposta_ref" maxlength="500" required/>' +
                      '<input type="hidden" name="resp_ref_id[]" class="resp_id">' +
                      '</div>' +
                      '<div class="row align-items-center" style="margin-bottom: 10px;">' +
                      '<div class="col col-sm-11">' +
                      '<div class="form-check form-check-radio">' +
                      'Essa resposta esta correta?&emsp;' +
                      '<label class="form-check-label">' +
                      '<input class="form-check-input correct verdadeiro" type="radio" name="corret_ref[]" value="0" onclick="muda(this);">' +
                      'Sim' +
                      '<span class="circle">' +
                      '<span class="check"></span>' +
                      '</span>' +
                      '</label>' +
                      '</div>' +
                      '</div>' +
                      '<div class="col col-sm-1">' +
                      '<button type="button" name="remove2" id="' + i2 + '" class="btn btn-danger btn-sm btn_remove2">X</button>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>'
                  );

                }
                  b++;
                  i2++;
                }
              if(b==2){
                      $(".teste").attr('disabled',true)
                  }
             
          });
          
          
          
          
          
          $('#answer_boolean').on('change', function(){
            if($('#answer_boolean').val()=='1'){
                $('.tamanho').css('display','none');
            }else{
                $('.tamanho').css('display','block');
            }
        });
          
           


          
          
          
          
        
          ///////////////////////////////////////////////////////////////////
          $('#check-reforco').on('change', function () {
              var $parent = $(this).parents('.hovereffect');
              if (this.checked) {

                  $('.abcd', $parent).append(

                      '<div id="pai" class="hea">' +
                      '<div class=" container">' +
                      '<div class="card houvercardacima">' +
                      '<label class="col-12" style="font-size: 130%; color: black; padding-top: 10px;">Definições do labirinto (ERRADO):</label>' +
                      ' <div class=" container">' +
                      ' <div class="row justify-content-between" style="line-height: 40px; margin-bottom: 10px;">' +
                      '<div class="col-12 col-sm-6">' +
                      '<input type="hidden" name="path_errado_id" id="path_errado_id">' +
                      '<div class="row" style="height:50px;">' +
                      '<div class="col-4" style="height:100%;">' +
                      '<label for="answer_boolean_perg" style="margin-right: 3.5px; padding-top:10%;">Caminho do Labirinto:</label>' +
                      '</div>' +
                      

                      '<div class="col-1" style="margin-left: 12px; margin-top: 12px;">'+
                      '<i class="material-icons info" data-toggle="modal" data-target="#modalinfoCorredor" style="cursor: pointer;" title="Informações sobre a Interação" >info</i>'+
                      '</div>'+

                      '<div class="col-6">' +
                      '<select name="answer_boolean_perg" id="answer_boolean_perg" class="form-control selectpicker answer_boolean_perg" data-style="btn btn-primary" style="float:left;">' +
                      '<option selected value="1">Corredor</option>' +
                      '<option value="2">Labirinto</option>' +
                      '</select>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '<div class="col-12 col-sm-6 tamanho_error" style="display:none">' +
                      '<div class="row" style="height:50px;">' +
                      '<div class="col-5" style="height:100%;">' +
                      '<label for="tamanho_perg" style="margin-right: 3.5px; padding-top:10%;">Tamanho do Labirinto:</label>' +
                      '</div>' +
                      '<div class="col-1" style="margin-left: 12px; margin-top: 12px;">'+
                      '<i class="material-icons info" data-toggle="modal" data-target="#modalinfoTamanho" style="cursor: pointer;" title="Informações sobre a Interação" >info</i>'+
                      '</div>'+
                      '<div class="col-5">' +
                      '<select name="tamanho_perg" id="tamanho_perg" class="form-control selectpicker " data-style="btn btn-primary" style="float:left;">' +
                    '<option selected value="1">Pequeno</option>' +
                     '<option value="2">Médio</option>' +
                      '<option value="3">Grande</option>'+
                    '</select>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +

                      '</div>' +

                      //                  PERGUNTAAAAAAA
                      '<div class=" container hea">' +
                      '<div class="card houvercard">' +
                      '<div class=" container">' +
                      '<div class="row" style="margin-top: 10px;">' +
                      '<div class="col">' +
                      '<input type="hidden" value="0" name="perg_reforco_id" id="perg-reforco-id">' +
                      '<label for="pergunta" style=" font-size:  130%; color: black;">Pergunta refoço:</label>' +
                      '</div>' +
                      '<div class="col-12 col-md-auto">' +
                      '<div class="row" style="height:50px;">' +
                    '<div class="col-5" style="height:100%;">' +
                      '<label for="question_type_ref">Tipo da pergunta:</label>' +
                      '</div>' +
                    '<div class="col-7">' +
                      ' <select class="form-control selectpicker " data-style="btn btn-primary" name="question_type_ref" id="question_type_ref">' +
                      ' <option selected value="1">Texto</option>' +
                      ' <option disabled value="2">Imagem</option>' +
                      '   <option disabled value="3">Vídeo</option>' +
                      '<option disabled value="4">Áudio</option>' +
                      '   </select>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                      '  <div class="col">' +
                      '<div class="row">' +
                    '<div class="col-2 col-sm-2" style=" margin-top: 12px;">' +
                      '   <label for="room_type_ref" style=" margin-right: 3.5px;">Interação:</label>' +
                      '</div>' +
                      '<div class="col-1 col-sm-1" style="margin-left: 12px; margin-top: 12px;">'+
                      '<i class="material-icons info" data-toggle="modal" data-target="#modalinfo" style="cursor: pointer;" title="Informações sobre a Interação" >info</i>'+
                      '</div>'+
                    '<div class="col-8 col-sm-8">' +
                      '<select class="form-control selectpicker " data-style="btn btn-primary" name="room_type_ref" id="room_type_ref">' +
                      '<option selected value="right_key">Chave</option>' +
                      ' <option value="true_or_false">Verdadeiro ou Falso</option>' +
                      '<option value="multiple_forms">Multiplas Formas</option>' +
                      '  </select>' +
                     '</div>' +
                    '</div>' +
                    '</div>' +
                      '  </div>' +
                      '</div>' +
                      '<div class="container">' +
                      ' <div class="textareaborda2">' +
                      '<textarea id="pergunta-reforco" type="text" name="reforco" rows="2" cols="50" class= "form-control col" placeholder="Faça sua pergunta reforço" maxlength="500" required aria-describeby="perguntaRHelp"></textarea>' +
                      '<small id="perguntaRHelp" style="color:red;font-size:10px">(*) CAMPO OBRIGATÓRIO </small>' +
                      '</div>' +
                      '</div>' +

                      '<label class="col-12" style=" margin-top: 10px;  font-size: 130%; color: black;">Definições do labirinto (REFORÇO):</label>' +
                      ' <div class=" container">' +
                      ' <div class="row justify-content-between" style="line-height: 40px; margin-bottom: 10px;">' +
                      '  <div class="col-12 col-sm-6">' +
                      '<input type="hidden" name="path_reforco_id" id="path_reforco_id"></td>' +
                      '<div class="row" style="height:50px;">' +
                    '<div class="col-4" style="height:100%;">' +
                      '  <label for="answer_boolean_ref">Caminho do jogo:</label>' +
                      '</div>'+
                      '<div class="col-1" style="margin-left: 12px; margin-top: 12px;">'+
                      '<i class="material-icons info" data-toggle="modal" data-target="#modalinfoCorredor" style="cursor: pointer;" title="Informações sobre a Interação" >info</i>'+
                      '</div>'+
                      '<div class="col-6">'+
                      '   <select class="form-control selectpicker" data-style="btn btn-primary" name="answer_boolean_ref" id="answer_boolean_ref">' +
                      ' <option selected value="1">Corredor</option>' +
                      ' <option value="2">Labirinto</option>' +
                      '</select>' +
                      ' </div>' +
                      '</div>'+
                      '</div>'+
                      '  <div class="col-12 col-sm-6 tamanho_ref" style="display:none;">' +
                      '<div class="row" style="height:50px;">' +
                    '<div class="col-5" style="height:100%;">' +
                      '<label for="tamanho_ref">Tamanho do labirinto:</label>' +
                      '</div>'+
                      '<div class="col-1" style="margin-left: 12px; margin-top: 12px;">'+
                      '<i class="material-icons info" data-toggle="modal" data-target="#modalinfoTamanho" style="cursor: pointer;" title="Informações sobre a Interação" >info</i>'+
                      '</div>'+
                      '<div class="col-5">'+
                      ' <select class="form-control selectpicker " data-style="btn btn-primary" name="tamanho_ref" id="tamanho_ref">' +
                      '  <option selected value="1">Pequeno</option>' +
                      ' <option value="2">Medio</option>' +
                      '  <option value="3">Grande</option>' +
                      '</select>' +
                      ' </div>' +
                      '</div>'+
                      '</div>'+
          
                      '   </div>' +

                      '</div>' +
                      '</div>' +



                      // '<table class="table table-bordered table-hover hea" id="dynamic_field2" border="0">' +
                      // '<thead>' +
                      // '<tr>' +
                      // '<td>Tipo da Resposta</td>' +
                      // '<td>Definição da Resposta</td>' +
                      // '<td>Resposta</td>' +
                      // '</tr>' +
                      // '</thead>' +
                      // '<tbody>' +
                      // '<tr>' +
                      // '<td>' +
                      // '<select name ="tipo_resp_ref[]" class="form-control tipo_resp_ref">' +
                      // '<option selected value="1">Texto</option>' +
                      // '<option value="2">Imagem</option>' +
                      // '<option value="3">Vídeo</option>' +
                      // '<option value="4">Áudio</option>' +
                      // '</select>' +
                      // '</td>' +
                      // '<td>' +
                      // '<select name ="corret_ref[]" class="form-control corret_ref">' +
                      // '<option selected value="1">Certa</option>' +
                      // '<option value="0">Errada</option>' +
                      // '</select>' +
                      // '</td>' +
                      // '<td><input type="text" name="resposta_ref[]" placeholder="Resposta" class="form-control name_list resposta_ref" maxlength="500" required>' +
                      // '<input type="hidden" name="resp_ref_id[]" class="resp_ref_id"></td>' +
                      // '<td><input type="button" class="teste" value="Add" /></td>' +
                      // '</tbody>' +
                      // '</table>' +

                      '<div class="card houvercard">' +
                      '<!--   Resposta -->' +
                      '<div class=" container" style=" margin-top: 10px;">' +
                      ' <div class= "row  align-items-center">' +
                      '<div class="col-9">' +
                      '<label  style=" margin-top: 10px;  font-size: 130%; color: black;">Resposta:&emsp;</label>' +
                      '<button type="button" class=" teste btn btn-success btn-sm"><i class="material-icons">add</i></button>' +
                      '<small id="respostaRHelp" style="color:red;font-size:10px">&emsp;(*) PELO MENOS 2 RESPOSTAS SÃO OBRIGATÓRIAS </small>'+
                      '</div>' +
                      '<div class="col">' +
                      '<div class="row" style="height:50px;">' +
                      '<div class="col-5" style="height:100%;">' +
                      '<label for="question_type">Tipo da Resposta:</label>' +
                      '</div>'+
                      '<div class="col-7">'+
                      '<select class="form-control selectpicker " data-style="btn btn-primary" name="tipo_resp_ref" id="tipo_opcao_ref" class="tipo_resp_ref form-control">' +
                      ' <option  selected value="1">Texto</option>' +
                      '<option disabled value="2">Imagem</option>' +
                      '<option disabled value="3">Vídeo</option>' +
                      ' <option disabled value="4">Áudio</option>' +
                      '</select>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '<div class="dynamic-added2" id="dynamic_field2" border="0">' +
                      '<div id="row2' + i2 + '" class="dynamic-added2">' +
                      '<div class="card houvercard">' +
                      '<div class="container">' +
                      '<div class="textareaborda2" style="margin-top: 10px;">' +
                      '<textarea type="text" name="resposta_ref[]" id="resposta" placeholder="' + (b + 1) + 'º Resposta refoço" rows="2"  class="form-control name_list resposta_ref" maxlength="500" required></textarea>' +
                      '<input type="hidden" name="resp_ref_id[]" class="resp_ref_id">' +
                      '</div>' +
                      '<div class="row align-items-center" style="margin-bottom: 10px;">' +
                      '<div class="col col-sm-11">' +
                      '<div class="form-check form-check-radio">' +
                      'Essa resposta esta correta?&emsp;' +
                      '<label class="form-check-label">' +
                      '<input class="form-check-input correct verdadeiro" type="radio" name="corret_ref[]" value="0" onclick="muda(this);">' +
                      'Sim' +
                      '<span class="circle">' +
                      '<span class="check"></span>' +
                      '</span>' +
                      '</label>' +
                      '</div>' +
                      '</div>' +
                      '<div class="col col-sm-1">' +
                      '<button type="button" name="remove" id="' + i2 + '" class="btn btn-danger btn-sm btn_remove2">X</button>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '</div>'


                      //reforco path
                      //                      '<div class="hea">' +
                      //                      '<br>' +
                      //                      '<span style="color: black;">Selecionar o ambiente para pergunta reforço:</span><br>' +
                      //                      '<br>' +
                      //                      '<div class="form-group row">' +
                      //                      '<input type="hidden" name="path_reforco_id" id="path_reforco_id"></td>' +
                      //                      '<label for="answer_boolean_ref" class="col">Tipo:</label>' +
                      //                      '<select name="answer_boolean_ref" id="answer_boolean_ref" class="col">' +
                      //                      '<option selected value="1">Corredor</option>' +
                      //                      '<option value="2">Labirinto</option>' +
                      //                      '</select>' +
                      //                      '</div>' +
                      //                      '<div class="form-group row">' +
                      //                      '<label for="tamanho_ref" class="col">Tamanho:</label>' +
                      //                      '<select name="tamanho_ref" id="tamanho_ref" class="col">' +
                      //                      '<option selected value="1">Pequeno</option>' +
                      //                      '<option value="2">Medio</option>' +
                      //                      '<option value="3">Grande</option>' +
                      //                      '</select>' +
                      //                      '</div>' +
                      //                      '<div class="form-group row">' +
                      //                      '<label for="largura_ref" class="col">Largura:</label>' +
                      //                      '<select name="largura_ref" id="largura_ref" class="col">' +
                      //                      '<option selected value="1">Pequeno</option>' +
                      //                      '<option value="2">Medio</option>' +
                      //                      '<option value="3">Grande</option>' +
                      //                      '</select>' +
                      //                      '</div>' +
                      //                      '</div>'
                  );

                  // $(".teste").trigger('click');
                  // $(".teste").trigger('click');
             
                  
                  $('.selectpicker').selectpicker('refresh');
                  
                  
                  document.getElementById('perg_reforco').value = 1;
                  i2++;

                   //var interacao = document.getElementsByName('room_type_ref');

              } else {
                  $('.hea', $parent).remove();
                  document.getElementById('perg_reforco').value = 0;
                  b = 0;
              }

              
               $('#room_type_ref').on('change', function(){

              if($('#room_type_ref').val() == 'true_or_false'){


               $('.verdadeiro').attr('type', 'checkbox');
              
              }else{

                $('.verdadeiro').attr('type', 'radio');
            
              }

            });
              
              
              $('#answer_boolean_perg').on('change', function(){
               
            if($('#answer_boolean_perg').val()=='1'){
                $('.tamanho_error').css('display','none');
            }else{
                $('.tamanho_error').css('display','block');
            }
        });

          
           $('#answer_boolean_ref').on('change', function(){
               
            if($('#answer_boolean_ref').val()=='1'){
                $('.tamanho_ref').css('display','none');
            }else{
                $('.tamanho_ref').css('display','block');
            }
        });

          });

          var refresposta = document.getElementsByName('corret_ref[]');
          // Acao para botao deletar remove fields
          $(document).on('click', '.btn_remove2', function () {

             if(refresposta.length > 2){

              var button_id2 = $(this).attr("id");
                $('#row2' + button_id2 + '').remove();
                b--;
             
                      $(".teste").attr('disabled',false)
                  
             }else if(refresposta.length <= 2){

                  function alert5(msg, type){
                   var html =  '<div class="alertContainer3 '+type+'">\n';
                  html += '<div class="row align-items-center">';
                  html += '<div class="col-sm-11">';
                  html +=     '<div class="mensajeAlert">'+msg+'</div>\n';
                  html +=     '</div>';
                  html += '<div class="col-sm-1">';
                  html +=     '<div class="cerrarAlert">x</div>\n';
                  html +=     '</div>';
                  html +=     '</div>';
                  html +=     '</div>';
                  jQuery('body').append(html);
                  window.setTimeout(function(){jQuery('.alertContainer3').addClass('active')}, 500);
                  jQuery('.cerrarAlert').click(function(){
                  jQuery('.alertContainer3').removeClass('active');
                  window.setTimeout(function(){jQuery('.alertContainer3').remove()}, 500);
                  });
                  }

                  alert5("Essa resposta reforço não pode ser removida pois a pergunta refoço deve conter pelo menos 2 reposta !","error")
          
             }

          });



          //////////////////////////////////////////////////////////////

          // setup token to input Field (is the rule of laravel should be put when you add data to DB)
          $.ajaxSetup({

              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }

          });

          $('#altera').click(function () {

              var testes = document.getElementsByClassName('ui-state-default');
              var lista = new Array();
              for (var i = 0; i < testes.length; i++) {
                  lista[i] = testes[i].value;
                  console.log(lista[i]);
              }
              console.log(lista);
              var lista2 = JSON.stringify(lista);
              console.log(lista2);

              $.ajax({
                  url: '/admin/alterar-ordem',
                  method: "POST",
                  data: {
                      lista: lista
                  },
                  dataType: 'json',
                  error: function (error) {
                      console.log(error);
                  },
                  success: function (data) {
                      if (data.error) {
                          printErrorMsg(data.error);
                      } else {
                          window.location.reload();
                      }
                  }
              });
          });
          
          
          function addUser(id,salaid) {

              $.ajax({
                  url: '/admin/aluno/'+id,
                  method: "POST",
                  data: {
                      id: id,
                      salaid: salaid
                  },
                  dataType: 'json',
                  error: function (error) {
                      console.log(error);
                  },
                  success: function (data) {
//                      if (data.error) {
//                          printErrorMsg(data.error);
//                      } else {
//                          window.location.reload();
//                      }
                  }
              });
          }


        $('#question_type').on('change', function(){
            var x = $('#question_type').val();
           if(x!=1){
               $('#pergunta').attr({placeholder:"Insira a url"});
               
           }else{
               $('#pergunta').attr({placeholder:"Faça sua pergunta"});
           }
               
            console.log($('#question_type').val());
        });
          
          
//          $('#tipo_opcao_ref').on('change', function(){
//            var x = $('#tipo_opcao_ref').val();
//           if(x!=1){
//               $('#pergunta-reforco').attr({placeholder:"Insira a url"});
//               
//           }else{
//               $('#pergunta-reforco').attr({placeholder:"Faça sua pergunta reforço"});
//           }
//               
//            console.log($('#tipo_opcao_ref').val());
//        });
//          
//          
//          $('#tipo_opcao').on('change', function(){
//            var x = $('#tipo_opcao').val();
//   
//           if(x!=1){
//     
//               document.getElementsByName('resposta[]').attr({placeholder:"Insira a url"});
// 
//               
//           }else{
//     
//               document.getElementsByName('resposta[]').attr({placeholder:"Resposta"});
//
//           }
//               
//            console.log($('#tipo_opcao').val());
//        });
//          
//          
//          $('#question_type').on('change', function(){
//            var x = $('#question_type').val();
//           if(x!=1){
//               $('#pergunta').attr({placeholder:"Insira a url"});
//               
//           }else{
//               $('#pergunta').attr({placeholder:"Faça sua pergunta"});
//           }
//               
//            console.log($('#question_type').val());
//        });


          $('#addPerg').on('show.bs.modal', function (event) {
              var modal = $(this);
              var button = $(event.relatedTarget);
              var v = 0,
                  w = 0,
                  x = 0,
                  y = 0,
                  z = 0;
                  i = 0;
                  var teste3 = [];

              var corretos = document.getElementsByName('corret[]');
              var corretos_ref = document.getElementsByName('corret_ref[]');

                $('.montarteste').append(
                '<div id="row' + i + '" class="dynamic-added">' +
                '<div class="card houvercard">'+
                '<div class="container">'+
                '<div class="textareaborda2" style="margin-top: 10px;">'+
                '<textarea type="text" name="resposta[]" id="resposta" placeholder="' + (a + 1) + 'º Resposta" rows="2" class="form-control name_list resposta" maxlength="500" required></textarea>'+
                '<input type="hidden" name="resp_id[]" class="resp_id">'+
                '</div>'+
                '<div class="row align-items-center" style="margin-bottom: 10px;">' +
                '<div class="col col-sm-11">' +
                '<div class="form-check form-check-radio">'+
                'Essa resposta esta correta?&emsp;'+
                '<label class="form-check-label">'+
                '<input class="form-check-input correct verdadeiro2" type="radio" name="corret[]" value="0" onclick="muda(this);" required>'+
                'Sim'+
                '<span class="circle">'+
                '<span class="check"></span>'+
                '</span>'+
                '</label>'+
                '</div>'+
                '</div>'+
                '<div class="col col-sm-1">' +
                '<button type="button" name="remove" id="' + i + '" class="btn btn-danger btn-sm btn_remove">X</button>' +
                '</div>' +
                '</div>'+
                '</div>'+
                '</div>'+
                '</div>'
                  );

              // Acao para botao deletar remove fields
              $(document).on('click', '.btn_remove', function () {

               if(corretos.length > 2){

                  var button_id2 = $(this).attr("id");
                    $('#row' + button_id2 + '').remove();
                    a--;
                 
                      $("#add").attr('disabled',false)
                  
                 }else if(corretos.length <= 2){

                    // alert('Essa resposta não pode ser removida pois a pergunta deve conter pelo menos 2 reposta!');


                  function alert4(msg, type){
                   var html =  '<div class="alertContainer3 '+type+'">\n';
                  html += '<div class="row align-items-center">';
                  html += '<div class="col-sm-11">';
                  html +=     '<div class="mensajeAlert">'+msg+'</div>\n';
                  html +=     '</div>';
                  html += '<div class="col-sm-1">';
                  html +=     '<div class="cerrarAlert">x</div>\n';
                  html +=     '</div>';
                  html +=     '</div>';
                  html +=     '</div>';
                  jQuery('body').append(html);
                  window.setTimeout(function(){jQuery('.alertContainer3').addClass('active')}, 500);
                  jQuery('.cerrarAlert').click(function(){
                  jQuery('.alertContainer3').removeClass('active');
                  window.setTimeout(function(){jQuery('.alertContainer3').remove()}, 500);
                  });
                  }

                  alert4("Essa resposta não pode ser removida pois a pergunta deve conter pelo menos 2 reposta","error")
          
                  }
                

              });

              

              $('.room_type').on('change', function(){

                var roomtype = document.getElementById('room_type');
   

                 if(roomtype.value == 'true_or_false'){

                    console.log('entrou');

                $('.verdadeiro2').attr('type', 'checkbox');
              
              }else{

                $('.verdadeiro2').attr('type', 'radio');
            
              }


               if(roomtype.value == 'hope_door'){

                  $('#check-reforco').trigger("change");
                  $('#desabilitar').css('display','block');
                  $('#check-reforco').prop("checked", true);
                  if($("#path_errado_id").val()==0){
                    $(".teste").trigger("click");
                    $(".teste").trigger("click");
                  }


              
              }else{

                 $('#check-reforco').trigger("change");
                $('#check-reforco').prop("checked", false);
                $('#desabilitar').css('display','none');
            
              }
               
               
             });

         
              if (button.data('whatever')) {
                  var recipient = button.data('whatever');
                  var tamanho = 0;
                  console.log(recipient);
                  $.ajax({
                      url: '/admin/busca-perg',
                      method: "POST",
                      data: {
                          id: recipient
                      },
                      dataType: 'json',
                      error: function (error) {
                          console.log(error);
                      },
                      success: function (data) {
                          console.log(data);
                          a = 0;
                          b = 0;
                          $.each(data, function (i, val) {
                              if (x == 0) {
                                  modal.find('#pergunta').val(val.question);
                                  //   $('#pergunta').summernote(
                                  //    'code', val.question
                                  // );
                                  modal.find('#perg_id').val(val.question_id);
                                  console.log(val.question_id);
                                  modal.find('.room_type').val(val.room_type);
                                   modal.find('#question_type').val(val.question_type);
                                  if(val.room_type == "true_or_false"){
                                    $(".room_type").trigger('change');
                                  }
                                    //$(".room_type").trigger('change');
                                  modal.find('#question_type').val(val.question_type);
                                  $.each(val.path, function (a, path) {
                                      if (w == 0) {
                                          modal.find('#answer_boolean').val(path.type);
                                          if(path.type==2){
                                              $('#answer_boolean').trigger("change");
                                              if(path.height==1)
                                                tamanho = 1;
                                              else if(path.height==4)
                                                tamanho=2;
                                              else
                                                tamanho=3;
                                              console.log("tamanho"+tamanho)
                                         
                                              modal.find('#tamanho').val(tamanho);
                                          }
                                          
                                          modal.find('#path_id').val(path.path_id);
                                          w++;
                                      } else if(document.getElementById('room_type').value=='hope_door'){

                                          $('#desabilitar').css('display','block');
                                   $('#check-reforco').prop("checked", true);
                                   $('#check-reforco').trigger("change");
                                          modal.find('#answer_boolean_perg').val(path.type);
                                          console.log("Path type "+path.type)
                                          
//                                          console.log("Path perg errado "+ document.getElementById("answer_boolean_perg").value);
                                          if(path.type!=1){
                                              $('#answer_boolean_perg').trigger("change");
                                              console.log("altura"+path.height);
                                              if(path.height==1)
                                                tamanho=1;
                                              else if(path.height==4)
                                                tamanho=2;
                                            else
                                                tamanho=3;
                                            modal.find('#tamanho_perg').val(tamanho);
                                              $('#tamanho_perg').trigger("change");
                                              
                                          }
                                          modal.find('#path_errado_id').val(path.path_id);
                                      }
                                  });
                                  console.log(val.answer);
                                  v = 0;
                                  $.each(val.answer, function (j, resp) {
                                      console.log(resp.correct);
                                      if (v > 0) {

                                          $("#add").trigger('click');

                                        
                                      }
                                      
                                      modal.find("#tipo_opcao").val(resp.tipo_resp);
                                      modal.find(document.getElementsByClassName("resp_id")[v]).val(resp.answer_id);
                                      if (resp.correct === true) {
                                          modal.find(corretos[v]).attr("value", "1");
                                          modal.find(corretos[v]).attr("checked", "true");
                                      } else {
                                          modal.find(corretos[v]).attr("value", "0");
                                          //                                        modal.find(corretos[v]).attr("checked", "false");
                                      }
                                      modal.find(document.getElementsByClassName("resposta")[v]).val(resp.answer);
                                      v++;

                                  });
                                  x++;
                              } else {
                                  v = 0;
                                 
                                   
                                   
                                  modal.find('#pergunta-reforco').val(val.question);
                                  modal.find('#perg-reforco-id').val(val.question_id);
                                  modal.find('#room_type_ref').val(val.room_type);
                                  $("#room_type_ref").trigger('change');
                                  modal.find('#question_type_ref').val(val.question_type);
                                  modal.find('#path_reforco_id').val(val.path.path_id);
                                  modal.find('#answer_boolean_ref').val(val.path.type);
                                  $('#answer_boolean_ref').trigger("change");
                                  
                                  if(val.path.type==2){
                                    if(val.path.height==1)
                                       tamanhoref = 1;
                                    else if(val.path.height==4)
                                        tamanhoref = 2;
                                    else
                                        tamanhoref = 3
                                    } 
                                    
                                    modal.find('#tamanho_ref').val(tamanhoref);
                                    $('#tamanho_ref').trigger("change");
                                      
                                      
                                  console.log(val.answer)
                                  $.each(val.answer, function (j, ref) {
                                      if (v > 0 ) {
                                          
                                           $(".teste").trigger('click');
                                        
                                      }
                                      console.log(ref.answer)
                                      modal.find("#tipo_opcao_ref").attr("value", ref.tipo_resp);
                                      modal.find(document.getElementsByClassName("resp_ref_id")[v]).attr("value",ref.answer_id);
                                      if (ref.correct === true){
                                          modal.find(corretos_ref[v]).attr("value", "1");
                                          modal.find(corretos_ref[v]).attr("checked", "true");
                                      }else {
                                          modal.find(corretos_ref[v]).attr("value", "0");
                                      }
                                      modal.find(document.getElementsByClassName("resposta_ref")[v]).val(ref.answer);
                                      v++;
                                      

                                  });

                              }

                          });
                      }
                  });


                  //           var modal = $(this);
                  //           modal.find('.modal-title').text('Nº ' + recipient);
                  //           modal.find('#id-curso').val(recipient);
                  //           modal.find('#pergunta_name').val(recipientnome);
                  //           modal.find('#pergunta_type').val(recipientperg);
                  //           modal.find('#pergunta_ambiente').val(recipientdetalhes);
                  //           modal.find('#pergunta_tamanho').val(recipienttamanho);
                  //           modal.find('#pergunta_largura').val(recipientlargura);
                  //           modal.find('#perg_room_type').val(recipientroom);
                  //           modal.find('#pergunta_path').val(recipientpath);
                  //           modal.find('#pergunta_id').val(recipientid);
              } else {
                  modal.find('#pergunta').val('');
                  modal.find('#perg_id').val(0);
                  modal.find('.room_type').val('right_key');
                  modal.find('#question_type').val(1);
                  modal.find('#perg-reforco-id').val(0);
                  i++;
                $("#add").trigger('click');
                $("#add").trigger('click');
     
              
              }

          });

          //Add Action to buttton submit Data to DB

          $('#submit').click(function (e) {
              var x = document.getElementById('sala_id');
              var y = document.getElementsByName('corret[]');
              var p = document.getElementsByName('corret_ref[]');
              var reforco = document.getElementsByName('resposta_ref[]');
              var resposta = document.getElementsByName('resposta[]');
              var pergunta = document.getElementsByName('pergunta');
              var pergref = document.getElementsByName('reforco');
              var m = 0;
              var z = 0;
              var teste3 = [];
              var teste4 = [];
              var ref = document.getElementById('check-reforco')
              var i;

              for (i = 0; i < y.length; i++) {

                  teste3[i] = y[i].value;


                  if (y[i].value == 1)
                      z++
              }

              var t = $('#add_name').serialize() + "&correto=" + teste3;
        

              if (ref.checked) {
                  for (i = 0; i < p.length; i++) {

                      teste4[i] = p[i].value;


                      if (p[i].value == 1)
                          z++
                  }
                  t += "&correto_ref=" + teste4;
              }


              if (((z == 1 && !ref.checked && $('#room_type').val() != 'true_or_false' )  || 
                (!ref.checked && $('#room_type').val() == 'true_or_false' )) || 
                ((z >= 2 && ref.checked) || ( ((ref.checked) && ($('#room_type_ref').val() == 'true_or_false')) && ($('#room_type').val() == 'hope_door')))){
                  $.ajax({

                      url: postURL + x,
                      method: "POST",
                      data: t,
                      type: 'json',

                      error: function (error) {
                          console.log(error);

                      },

                      success: function (data) {
                          if (data.error) {

                              printErrorMsg(data.error);

                          } else {
                              //window.location.reload();
                              e.preventDefault();
                              console.log(data);

                              i = 1;
                              $('.dynamic-added').remove();
                              $('#add_name')[0].reset();
                              $(".print-success-msg").find("ul").html('');
                              $(".print-success-msg").css('display', 'block');
                              $(".print-error-msg").css('display', 'none');
                              $(".print-success-msg").find("ul").append('<li>' + data.success + '</li>');

                          }

                          a = 0;
                          b = 0;

                      }

                  });


              } else {

                  function alert2(msg, type){
                   var html =  '<div class="alertContainer3 '+type+'">\n';
                  html += '<div class="row align-items-center">';
                  html += '<div class="col-sm-11">';
                  html +=     '<div class="mensajeAlert">'+msg+'</div>\n';
                  html +=     '</div>';
                  html += '<div class="col-sm-1">';
                  html +=     '<div class="cerrarAlert">x</div>\n';
                  html +=     '</div>';
                  html +=     '</div>';
                  html +=     '</div>';
                  jQuery('body').append(html);
                  window.setTimeout(function(){jQuery('.alertContainer3').addClass('active')}, 500);
                  jQuery('.cerrarAlert').click(function(){
                  jQuery('.alertContainer3').removeClass('active');
                  window.setTimeout(function(){jQuery('.alertContainer3').remove()}, 500);
                  });
                  }

                  alert2("Falta marca a resposta certa da aba pergunta ou da aba refoço, verifica se tem pelo menos uma certa!<br>Caso a interação esteja marcado em verdadeiro ou falso poderá ter varias resposta certas ou nehum resposta!","error");
                  e.preventDefault();
             }
              if(ref.checked){

                 for ( i = 0; i < reforco.length; i++){
                     
                       if (reforco[i].value == 0){

                         m++;

                       }
                        
                  }

                  if( m > 0 || pergref[0].value === "" ){

                  function alert1(msg, type){
                  var html =  '<div class="alertContainer '+type+'">\n';
                  html += '<div class="row align-items-center">';
                  html += '<div class="col-sm-11">';
                  html +=     '<div class="mensajeAlert">'+msg+'</div>\n';
                  html +=     '</div>';
                  html += '<div class="col-sm-1">';
                  html +=     '<div class="cerrarAlert">x</div>\n';
                  html +=     '</div>';
                  html +=     '</div>';
                  html +=     '</div>';
                  jQuery('body').append(html);
                  window.setTimeout(function(){jQuery('.alertContainer').addClass('active')}, 500);
                  jQuery('.cerrarAlert').click(function(){
                  jQuery('.alertContainer').removeClass('active');
                  window.setTimeout(function(){jQuery('.alertContainer').remove()}, 500);
                  });
                  }


                  alert1("A campos a preencher na aba Refoço verifique!","error");

                  $('#pergunta-reforco').focus();
                  e.preventDefault();

                  }

                   var h = 0;
                  for ( i = 0; i < resposta.length; i++){
                     
                       if (resposta[i].value == 0){

                         h++;

                       }
                        
                  }

                  if( h > 0 || pergunta[0].value === "" ){

                  function alert3(msg, type){
                  var html =  '<div class="alertContainer2 '+type+'">\n';
                  html += '<div class="row align-items-center">';
                  html += '<div class="col-sm-11">';
                  html +=     '<div class="mensajeAlert">'+msg+'</div>\n';
                  html +=     '</div>';
                  html += '<div class="col-sm-1">';
                  html +=     '<div class="cerrarAlert">x</div>\n';
                  html +=     '</div>';
                  html +=     '</div>';
                  html +=     '</div>';
                  jQuery('body').append(html);
                  window.setTimeout(function(){jQuery('.alertContainer2').addClass('active')}, 500);
                  jQuery('.cerrarAlert').click(function(){
                  jQuery('.alertContainer2').removeClass('active');
                  window.setTimeout(function(){jQuery('.alertContainer2').remove()}, 500);
                  });
                  }

                  alert3("A campos a preencher na aba Pergunta verifique!","error");
                  
                  $('#pergunta').focus();
                  e.preventDefault();
                  }

                  // i = 1;
                  // $('.dynamic-added').remove();
                  // $('#add_name')[0].reset();
                  // $(".print-success-msg").find("ul").html('');
                  // $(".print-success-msg").css('display', 'block');
                  // $(".print-error-msg").css('display', 'none');
                  // $(".print-success-msg").find("ul").append('<li>' + data.success + '</li>');

              }



          });




          $('.btnModalClose').click(function () {
              $('#add_name')[0].reset();
              $('.dynamic-added').remove();
              a = 0;
              b = 0;
              window.location.reload();
          })

          // Print error Message
          function printErrorMsg(msg) {
              $(".print-error-msg").find("ul").html('');
              $(".print-error-msg").css('display', 'block');
              $(".print-success-msg").css('display', 'none');
              $.each(msg, function (Key, value) {
                  $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
              });
          }

      });


      function checkStat(input, name) {
          if (input.checked == true) {
              $("#" + name).val('ativo');
          } else {
              $("#" + name).val('inativo');
          }
      }


      $('#perguntaModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var recipientnome = button.data('whatevernome');
          var recipientperg = button.data('whatevertype');
          var recipientdetalhes = button.data('whateverambiente');
          var recipienttamanho = button.data('whatevertamanho');
          var recipientlargura = button.data('whateverlargura');
          var recipientid = button.data('whateveridperg');
          var recipientroom = button.data('whateverroom');
          var recipientpath = button.data('whateverpath');


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
          modal.find('#perg_room_type').val(recipientroom);
          modal.find('#pergunta_path').val(recipientpath);
          modal.find('#pergunta_id').val(recipientid);

      });

      $('#caminhoModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever');
          var recipientdetalhes = button.data('whateverambientex');
          var recipienttamanho = button.data('whatevertamanhox');
          var recipientlargura = button.data('whateverlargurax');
          var recipientid = button.data('whateveridperg');

          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this);
          modal.find('#pergunta_ambientex').val(recipientdetalhes);
          modal.find('#pergunta_tamanhox').val(recipienttamanho);
          modal.find('#pergunta_largurax').val(recipientlargura);
          modal.find('#path_id').val(recipient);

      });



      $('#respostaModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatevern'); // Extract info from data-* attributes
          var recipientnome = button.data('whateverresp');
          var recipientresp = button.data('whatevertyperesp');
          var recipientid = button.data('whateveridresp');
          var recipientcorrect = button.data('whatevercorrect');
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this);
          modal.find('.modal-title').text('Resposta Nº ' + (recipient + 1));
          // modal.find('#id-curso').val(recipient);
          modal.find('#resposta_name').val(recipientnome);
          modal.find('#resposta_type').val(recipientresp);
          modal.find('#resposta_id').val(recipientid);
          modal.find('#resposta_correct').val(recipientcorrect);


      });

      $('#salaEModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipientnome = button.data('whatevernome');
          var recipientid = button.data('whateverid');
          var recipientresp = button.data('whatevertype');
          var recipienttema = button.data('whatevertema');
          var recipientcorrect = button.data('whateverpublic');
          var recipientenable = button.data('whateverenable');
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this);
          modal.find('#nome').val(recipientnome);
          modal.find('#time').val(recipientresp);
          modal.find('#sala_id').val(recipientid);
          modal.find('#theme').val(recipienttema);
          modal.find('#enable').val(recipientenable);

          if (recipientcorrect == 1)
              $('#public').prop("checked", true);
          else
              $('#public').prop("checked", false);
          //modal.find('#public').val(recipientcorrect);

          if (recipientenable == 1)
              $('#enable').prop("checked", true);
          else
              $('#public').prop("checked", false);
      });

      $('#salaModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget); // Button that triggered the modal
          var recipient = button.data('whatever'); // Extract info from data-* attributes
          var recipientnome = button.data('whatevernome');

          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this);
          modal.find('.modal-title').text('Nº ' + recipient);
          modal.find('.sala_name').text(recipientnome);


      });

      $(function () {
          $("#sortable").sortable({
              revert: true
          });

          $("ul, li").disableSelection();
      });


      function qrcode(qrN) {
          if (document.getElementById(qrN).style.display == 'none')
              document.getElementById(qrN).style.display = 'block';
          else
              document.getElementById(qrN).style.display = 'none';
      }


        
        


  
      $('body').scrollspy({
          target: '#list-example'
      });


      function launch_toast() {
          var x = document.getElementById("toast")
          x.className = "show";
          setTimeout(function () {
              x.className = x.className.replace("show", "");
          }, 5000);
      }

      function buscaraluno() {

          var aluno = document.getElementById("alunosearch").value;
          console.log(aluno);

      }

      $(document).ready(function () {

          ///// Tempo do aleta reforco    
          // function enter() {

          //     $("#texto").fadeOut("slow");

          //   }
          //  $("#flip2").mouseenter(function(){

          //    $("#texto").fadeIn("slow");
          //     setTimeout(enter, 2000);

          // });


          $(function () {
              $('[data-toggle="tooltip"]').tooltip()
          });


      });






function alertaPerg(){
    
    $.notify({
            message: "São permitidas apenas 3 perguntas por sala"
        }, {
            type: 'warning',
            timer: 800,
            placement: {
                from: 'top',
                align: 'right'
            }
        });
}








      ///////////////////////////////Thiago
      $('#confirmalert').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var recipient_id = button.data('id'); // Extract info from data-* attributes
      var recipient_turma = button.data('turma'); // Extract info from data-* attributes
      var recipient_prof = button.data('prof'); // Extract info from data-* attributes

      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this);
      modal.find('#confirmar').attr('onclick', "removeGrupo(" + recipient_id + "," + recipient_prof + "," + recipient_turma + ")");

      });


      $('#modalinfo').on('hidden.bs.modal', function (event){

        $('body').addClass('modal-open');

      });







