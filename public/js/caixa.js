      $(document).ready(function () {

          //$('#pergunta').summernote();


          var postURL = 'editar-sala/';
          var i = 0;
          var i2 = 0;

          // botao para add resposta fields
          var a = 0;
          var b = 0;
          //           launch_toast();

          // $('#add').click(function () {
          //     if (a < 3) {
          //         $('#dynamic_field').append('' +
          //             '<tr id="row' + i + '" class="dynamic-added">' +
          //             '<td>' +
          //             '<select name ="tipo_resp[]" id ="tipo_opcao" class="form-control tipo_resp">' +
          //             '<option selected value="1">Texto</option>' +
          //             '<option value="2">Imagem</option>' +
          //             '<option value="3">Vídeo</option>' +
          //             '<option value="4">Áudio</option>' +
          //             '</select>' +
          //             '</td>' +
          //             '<td>' +
          //             '<select name ="corret[]" class="form-control corret">' +
          //             '<option value="1">Certa</option>' +
          //             '<option selected value="0">Errada</option>' +
          //             '</select>' +
          //             '</td>' +
          //             '<td><input type="text" name="resposta[]" placeholder="Resposta" class="form-control name_list resposta" maxlength="500" required/>'+
          //              '<input type="hidden" name="resp_id[]" class="resp_id"></td>' +
          //             '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td>' +
          //             '</tr>');
          //         a++;
          //     } else {


          //     }

          // });
          
          
          
          $('#add').click(function () {
              if (a < 2) {
                  $('#dynamic_field').append('' +
                      '<div id="row' + i + '" class="dynamic-added">' +
                      '<div class="card houvercard">' +
                      '<div class="container">' +
                      '<div class="textareaborda2" style="margin-top: 10px;">' +
                      '<textarea type="text" name="resposta[]" placeholder="' + (a + 3) + 'º Resposta" rows="2" class="form-control name_list resposta" maxlength="500" required/>' +
                      '<input type="hidden" name="resp_id[]" class="resp_id">' +
                      '</div>' +
                      '<div class="row align-items-center" style="margin-bottom: 10px;">' +
                      '<div class="col col-sm-11">' +
                      '<div class="form-check form-check-radio">' +
                      'Essa resposta esta correta?&emsp;' +
                      '<label class="form-check-label">' +
                      '<input class="form-check-input correct" type="radio" name="corret[]" onclick="muda(this);" value="0">' +
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
                  a++;
              } else {


              }

          });

          // Acao para botao deletar remove fields

          $(document).on('click', '.btn_remove', function () {

              var button_id = $(this).attr("id");
              $('#row' + button_id + '').remove();
              a--;
              console.log(a);
          });


          //////////////////////////////////////////////////////////////////////////
          $(document).on('click', '.teste', function () {
              if (b < 2) {
                  $('#dynamic_field2').append('' +
                      '<div id="row2' + i2 + '" class="dynamic-added2">' +
                      '<div class="card houvercard">' +
                      '<div class="container">' +
                      '<div class="textareaborda2" style="margin-top: 10px;">' +
                      '<textarea type="text" name="resposta_ref[]" placeholder="' + (b + 3) + 'º Resposta refoço" rows="2" class="form-control name_list resposta_ref" maxlength="500" required/>' +
                      '<input type="hidden" name="resp_ref_id[]" class="resp_id">' +
                      '</div>' +
                      '<div class="row align-items-center" style="margin-bottom: 10px;">' +
                      '<div class="col col-sm-11">' +
                      '<div class="form-check form-check-radio">' +
                      'Essa resposta esta correta?&emsp;' +
                      '<label class="form-check-label">' +
                      '<input class="form-check-input correct" type="radio" name="corret_ref[]" value="0" onclick="muda2(this);">' +
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
                  b++;
              } else {


              }
          });
          // Acao para botao deletar remove fields
          $(document).on('click', '.btn_remove2', function () {

              var button_id2 = $(this).attr("id");
              $('#row2' + button_id2 + '').remove();
              b--;
          });


          ///////////////////////////////////////////////////////////////////
          $('#check-reforco').on('click', function () {
              var $parent = $(this).parents('.hovereffect');
              if (this.checked) {
                  $('.abcd', $parent).append(


                      '<div class="hea">' +
                      '<div class=" container">' +
                      '<div class="card houvercard">' +
                      '<label class="col-12" style=" margin-top: 10px;  font-size: 130%; color: black;">Definições do labirinto (ERRADO):</label>' +
                      ' <div class=" container">' +
                      ' <div class="row" style="line-height: 40px; margin-bottom: 10px;">' +
                  '<div class="col-12 col-sm-4">' +
'<input type="hidden" name="path_errado_id" id="path_errado_id">' +
'<div class="row" style="height:50px;">' +
'<div class="col-5" style="height:100%;">' +
'<label for="answer_boolean_perg" style="margin-right: 3.5px; padding-top:10%;">Caminho do Labirinto:</label>' +
'</div>' +
'<div class="col-7">' +
'<select name="answer_boolean_perg" id="answer_boolean_perg" class="form-control selectpicker " data-style="btn btn-primary btn-round" style="float:left;">' +
'<option selected value="1">Corredor</option>' +
'<option value="2">Labirinto</option>' +
'</select>' +
'</div>' +
'</div>' +
'</div>' +
                      
                      '  <div class="col-12 col-sm-4">' +
                      '<label for="tamanho_perg">Tamanho do labirinto:</label>' +
                      ' <select class="selectborda" name="tamanho_perg" id="tamanho_perg">' +
                      '  <option selected value="1">Pequeno</option>' +
                      ' <option value="2">Medio</option>' +
                      '  <option value="3">Grande</option>' +
                      '</select>' +
                      ' </div>' +
                      ' <div class="col-12 col-sm-4">' +
                      '<label for="largura_perg">Largura do labirinto:</label>' +
                      '   <select class="selectborda" name="largura_perg" id="largura_perg">' +
                      '  <option selected value="1">Pequeno</option>' +
                      '   <option value="2">Medio</option>' +
                      '  <option value="3">Grande</option>' +
                      '           </select>' +
                      '   </div>' +
                      '   </div>' +
                      '</div>' +
                      '</div>' +
                      //                      '<span style="color: red;">Selecionar o ambiente errado para a pergunta:</span><br><br>' +
                      //                      '<div class="form-group row">' +
                      //                      '<input type="hidden" name="path_errado_id" id="path_errado_id">' +
                      //                      '<label for="answer_boolean_perg" class="col">Tipo:</label>' +
                      //                      '<select name="answer_boolean_perg" id="answer_boolean_perg" class="col">' +
                      //                      '<option selected value="1">Corredor</option>' +
                      //                      '<option value="2">Labirinto</option>' +
                      //                      '</select>' +
                      //                      '</div>' +
                      //                      '<div class="form-group row">' +
                      //                      '<label for="tamanho_perg" class="col">Tamanho:</label>' +
                      //                      '<select name="tamanho_perg" id="tamanho_perg" class="col">' +
                      //                      '<option selected value="1">Pequeno</option>' +
                      //                      '<option value="2">Medio</option>' +
                      //                      '<option value="3">Grande</option>' +
                      //                      '</select>' +
                      //                      '</div>' +
                      //                      '<div class="form-group row">' +
                      //                      '<label for="largura_perg" class="col">Largura:</label>' +
                      //                      '<select name="largura_perg" id="largura_perg" class="col">' +
                      //                      '<option selected value="1">Pequeno</option>' +
                      //                      '<option value="2">Medio</option>' +
                      //                      '<option value="3">Grande</option>' +
                      //                      '</select>' +
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
                      '<label for="question_type_ref">Tipo da pergunta:</label>' +
                      ' <select class="selectborda" name="question_type_ref" id="question_type_ref">' +
                      ' <option selected value="1">Texto</option>' +
                      ' <option value="2">Imagem</option>' +
                      '   <option value="3">Vídeo</option>' +
                      '<option value="4">Áudio</option>' +
                      '   </select>' +
                      '   </div>' +
                      '  <div class="col col-lg-4">' +
                      '   <label for="room_type_ref" style=" margin-right: 3.5px;">Interação:</label>' +
                      '<select  class="selectborda" name="room_type_ref" id="room_type_ref">' +
                      '<option selected value="right_key">Chave</option>' +
                      '<option value="hope_door">Porta da esperança</option>' +
                      ' <option value="true_or_false">Verdadeiro ou Falso</option>' +
                      '<option value="multiple_forms">Multiplas Formas</option>' +
                      '  </select>' +
                      '   </div>' +
                      '  </div>' +
                      '</div>' +
                      '<div class="container">' +
                      ' <div class="textareaborda2">' +
                      '<textarea id="pergunta-reforco" type="text" name="reforco" rows="2" cols="50" class= "form-control col" placeholder="Faça sua pergunta reforço" maxlength="500" required></textarea>' +
                      '</div>' +
                      '</div>' +

                      '<label class="col-12" style=" margin-top: 10px;  font-size: 130%; color: black;">Definições do labirinto (REFORÇO):</label>' +
                      ' <div class=" container">' +
                      ' <div class="row" style="line-height: 40px; margin-bottom: 10px;">' +
                      '  <div class="col-12 col-sm-4">' +
                      '<input type="hidden" name="path_reforco_id" id="path_reforco_id"></td>' +
                      '  <label for="answer_boolean_ref">Caminho do jogo:</label>' +
                      '   <select class="selectborda" name="answer_boolean_ref" id="answer_boolean_ref">' +
                      ' <option selected value="1">Corredor</option>' +
                      ' <option value="2">Labirinto</option>' +
                      '</select>' +
                      ' </div>' +
                      '  <div class="col-12 col-sm-4">' +
                      '<label for="tamanho_ref">Tamanho do labirinto:</label>' +
                      ' <select class="selectborda" name="tamanho_ref" id="tamanho_ref">' +
                      '  <option selected value="1">Pequeno</option>' +
                      ' <option value="2">Medio</option>' +
                      '  <option value="3">Grande</option>' +
                      '</select>' +
                      ' </div>' +
                      ' <div class="col-12 col-sm-4">' +
                      '<label for="largura_ref">Largura do labirinto:</label>' +
                      '   <select class="selectborda" name="largura_ref" id="largura_ref">' +
                      '  <option selected value="1">Pequeno</option>' +
                      '   <option value="2">Medio</option>' +
                      '  <option value="3">Grande</option>' +
                      '           </select>' +
                      '   </div>' +
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
                      '</div>' +
                      '<div class="col">' +
                      '<label for="question_type">Tipo da Resposta:</label>' +
                      '<select  class="selectborda" name="tipo_resp_ref" id="tipo_opcao_ref" class="tipo_resp_ref form-control">' +
                      ' <option selected value="1">Texto</option>' +
                      '<option value="2">Imagem</option>' +
                      '<option value="3">Vídeo</option>' +
                      ' <option value="4">Áudio</option>' +
                      '</select>' +
                      '</div>' +
                      '</div>' +

                      '<div class="dynamic-added2" id="dynamic_field2" border="0">' +
                      '<div class="card houvercard">' +
                      '<div class="container">' +
                      '<div class="textareaborda2" style="margin-top: 10px;">' +
                      '<textarea type="text" name="resposta_ref[]" id="resposta" placeholder=" 1º Resposta reforço" rows="2"  class="form-control name_list resposta_ref" maxlength="500" required></textarea>' +
                      '<input type="hidden" name="resp_ref_id[]" class="resp_ref_id">' +
                      '</div>' +

                      '<div class="form-check form-check-radio">' +
                      'Essa resposta esta correta?&emsp;' +
                      '<label class="form-check-label">' +
                      '<input class="form-check-input correct" type="radio" name="corret_ref[]" value="1" onclick="muda2(this);" checked>' +
                      'Sim' +
                      '<span class="circle">' +
                      '<span class="check"></span>' +
                      '</span>' +
                      '</label>' +
                      '</div>' +
                      '</div>' +
                      '</div>' +
                      '<div class="card houvercard">' +
                      '<div class="container">' +
                      '<div class="textareaborda2" style="margin-top: 10px;">' +
                      '<textarea type="text" name="resposta_ref[]" id="resposta" placeholder=" 2º Resposta reforço" rows="2"  class="form-control name_list resposta_ref" maxlength="500" required></textarea>' +
                      '<input type="hidden" name="resp_ref_id[]" class="resp_ref_id">' +
                      '</div>' +
                      '<div class="form-check form-check-radio">' +
                      'Essa resposta esta correta?&emsp;' +
                      '<label class="form-check-label">' +
                      '<input class="form-check-input correct" type="radio" name="corret_ref[]" value="0" onclick="muda2(this);">' +
                      'Sim' +
                      '<span class="circle">' +
                      '<span class="check"></span>' +
                      '</span>' +
                      '</label>' +
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
                  document.getElementById('perg_reforco').value = 1;
              } else {
                  $('.hea', $parent).remove();
                  document.getElementById('perg_reforco').value = 0;
                  b = 0;
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
                  url: 'http://127.0.0.1:8000/admin/alterar-ordem',
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

              var corretos = document.getElementsByName('corret[]');
              var corretos_ref = document.getElementsByName('corret_ref[]');


              if (button.data('whatever')) {
                  var recipient = button.data('whatever');
                  console.log(recipient);
                  $.ajax({
                      url: 'http://127.0.0.1:8000/admin/busca-perg',
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
                                  $.each(val.path, function (a, path) {
                                      if (w == 0) {
                                          modal.find('#answer_boolean').val(path.type);
                                          modal.find('#largura').val(path.widht);
                                          modal.find('#tamanho').val(path.heigh);
                                          modal.find('#path_id').val(path.path_id);
                                          w++;
                                      } else {

                                          //$('#check-reforco').prop("checked", false);
                                          $("#check-reforco").trigger('click');
                                          modal.find('#answer_boolean_perg').val(path.type);
                                          modal.find('#largura_perg').val(path.widht);
                                          modal.find('#tamanho_perg').val(path.heigh);
                                          modal.find('#path_errado_id').val(path.path_id);
                                      }
                                  });
                                  console.log(val.answer);
                                  v = 0;
                                  $.each(val.answer, function (j, resp) {
                                      console.log(resp.correct);
                                      if (v > 1) {
                                          $('#dynamic_field').append('' +
                                              '<div id="row' + i + '" class="dynamic-added">' +
                                              '<div class="card houvercard">' +
                                              '<div class="container">' +
                                              '<div class="textareaborda2" style="margin-top: 10px;">' +
                                              '<textarea type="text" name="resposta[]" placeholder="' + (a + 3) + 'º Resposta" rows="2" class="form-control name_list resposta" maxlength="500" required/>' +
                                              '<input type="hidden" name="resp_id[]" class="resp_id">' +
                                              '</div>' +
                                              '<div class="row align-items-center" style="margin-bottom: 10px;">' +
                                              '<div class="col col-sm-11">' +
                                              '<div class="form-check form-check-radio">' +
                                              'Essa resposta esta correta?&emsp;' +
                                              '<label class="form-check-label">' +
                                              '<input class="form-check-input correct" type="radio" name="corret[]" value="0" onclick="muda(this);">' +
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
                                          a++;
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
                                  modal.find('#question_type_ref').val(val.question_type);
                                  modal.find('#path_reforco_id').val(val.path.path_id);
                                  modal.find('#answer_boolean_ref').val(val.path.type);
                                  modal.find('#largura_ref').val(val.path.widht);
                                  modal.find('#tamanho_ref').val(val.path.heigh);
                                  console.log(val.answer)
                                  $.each(val.answer, function (j, ref) {
                                      if (v > 1) {
                                          $('#dynamic_field2').append('' +
                                              '<div id="row2' + i2 + '" class="dynamic-added2">' +
                                              '<div class="card houvercard">' +
                                              '<div class="container">' +
                                              '<div class="textareaborda2" style="margin-top: 10px;">' +
                                              '<textarea type="text" name="resposta_ref[]" placeholder="' + (b + 3) + 'º Resposta refoço" rows="2" class="form-control name_list resposta_ref" maxlength="500" required/>' +
                                              '<input type="hidden" name="resp_ref_id[]" class="resp_ref_id">' +
                                              '</div>' +
                                              '<div class="row align-items-center" style="margin-bottom: 10px;">' +
                                              '<div class="col col-sm-11">' +
                                              '<div class="form-check form-check-radio">' +
                                              'Essa resposta esta correta?&emsp;' +
                                              '<label class="form-check-label">' +
                                              '<input class="form-check-input correct" type="radio" name="corret_ref[]" value="0" onclick="muda2(this);">' +
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
                                              '</div>');
                                          b++;
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
                  modal.find('#room_type').val('key');
                  modal.find('#question_type').val(1);
                  modal.find('#perg-reforco-id').val(0);
                  $('#check-reforco').prop("checked", false);

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



              if ((z == 1 && !ref.checked) || (z == 2 && ref.checked)) {
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
                  alert("Uma das respostas deve estar correta!")
                  e.preventDefault();
              }


              if(ref.checked){

                 for ( i = 0; i < reforco.length; i++){
                     
                       if (reforco[i].value == 0){

                         m++;

                       }
                        
                  }

                  if( m > 0 || pergref[0].value === "" ){

                  alert("A campos a preencher na aba Refoço verifique!\nCaso não necessite de reforço desmarque a caixa pergunta refoço.");

                  }

                   var h = 0;
                  for ( i = 0; i < resposta.length; i++){
                     
                       if (resposta[i].value == 0){

                         h++;

                       }
                        
                  }

                  if( h > 0 || pergunta[0].value === "" ){

                  alert("A campos a preencher na aba Pergunta verifique!");

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



      $('.carousel').carousel({
          interval: 1000
      });

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









