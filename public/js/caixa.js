      
       $(document).ready(function () {

  //$('#pergunta').summernote();


           var postURL = 'editar-sala';
           var i = 1;
           var i2 = 1;

           // botao para add resposta fields
           var a = 0;
           var b = 0;
//           launch_toast();

           $('#add').click(function () {
               if (a < 3) {
                   $('#dynamic_field').append('' +
                       '<tr id="row' + i + '" class="dynamic-added">' +
                       '<td>' +
                       '<select name ="tipo_resp[]" id ="tipo_opcao" class="form-control tipo_resp">' +
                       '<option selected value="1">Texto</option>' +
                       '<option value="2">Imagem</option>' +
                       '<option value="3">Vídeo</option>' +
                       '<option value="4">Áudio</option>' +
                       '</select>' +
                       '</td>' +
                       '<td>' +
                       '<select name ="corret[]" class="form-control corret">' +
                       '<option value="1">Certa</option>' +
                       '<option selected value="0">Errada</option>' +
                       '</select>' +
                       '</td>' +
                       '<td><input type="text" name="resposta[]" placeholder="Resposta" class="form-control name_list resposta" maxlength="500" required/>'+
                        '<input type="hidden" name="resp_id[]" class="resp_id"></td>' +
                       '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td>' +
                       '</tr>');
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
               if (b < 3) {
                   $('#dynamic_field2').append('' +
                       '<tr id="row' + i2 + '" class="dynamic-added">' +
                       '<td>' +
                       '<select name ="tipo_resp_ref[]" class="form-control">' +
                       '<option selected value="1">Texto</option>' +
                       '<option value="2">Imagem</option>' +
                       '<option value="3">Vídeo</option>' +
                       '<option value="4">Áudio</option>' +
                       '</select>' +
                       '</td>' +
                       '<td>' +
                       '<select name ="corret_ref[]" class="form-control">' +
                       '<option value="1">Certa</option>' +
                       '<option selected value="0">Errada</option>' +
                       '</select>' +
                       '</td>' +
                       '<td><input type="text" name="resposta_ref[]" placeholder="Resposta" class="form-control name_list" maxlength="500" required/>'+
                        '<input type="hidden" name="resp_ref_id[]" class="resp_ref_id"></td>' +
                       '<td><button type="button" name="remove2" id="' + i2 + '" class="btn btn-danger btn_remove2">X</button></td>' +
                       '</tr>');
                   b++;
               } else {


               }
           });
           // Acao para botao deletar remove fields
           $(document).on('click', '.btn_remove2', function () {

               var button_id2 = $(this).attr("id");
               $('#row' + button_id2 + '').remove();
               b--;
           });


           ///////////////////////////////////////////////////////////////////
           $('#check-reforco').on('change', function () {
               var $parent = $(this).parents('.hovereffect');
               if (this.checked) {
                   $('.abcd', $parent).append(
                       '<div class="hea">' +
                       '<br>' +
                       '<span style="color: red;">Selecionar o ambiente errado para a pergunta:</span><br><br>' +
                       '<div class="form-group row">' +
                       '<input type="hidden" name="path_errado_id" id="path_errado_id">'+
                       '<label for="answer_boolean_perg" class="col">Tipo:</label>' +
                       '<select name="answer_boolean_perg" id="answer_boolean_perg" class="col">' +
                       '<option selected value="1">Corredor</option>' +
                       '<option value="2">Labirinto</option>' +
                       '</select>' +
                       '</div>' +
                       '<div class="form-group row">' +
                       '<label for="tamanho_perg" class="col">Tamanho:</label>' +
                       '<select name="tamanho_perg" id="tamanho_perg" class="col">' +
                       '<option selected value="1">Pequeno</option>' +
                       '<option value="2">Medio</option>' +
                       '<option value="3">Grande</option>' +
                       '</select>' +
                       '</div>' +
                       '<div class="form-group row">' +
                       '<label for="largura_perg" class="col">Largura:</label>' +
                       '<select name="largura_perg" id="largura_perg" class="col">' +
                       '<option selected value="1">Pequeno</option>' +
                       '<option value="2">Medio</option>' +
                       '<option value="3">Grande</option>' +
                       '</select>' +
                       '</div>' +
                       '</div>' +
                       '<div class="form-group hea row">' +
                       '<br>' +
                       '<br>' +
                       '<input id="perg-reforco-id" name="perg_reforco_id" type="hidden" value="0">' +
                       '<label for="pergunta" class="col">Pergunta:</label>' +
                       '<input class="col" id="pergunta-reforco" type="text" name="reforco"  placeholder=" Pergunta" maxlength="500" required>' +
                       '</div>' +
                       '<div class="form-group hea row">' +
                       '<label for="question_type_ref" class="col">Tipo da pergunta:</label>' +
                       '<select name ="question_type_ref" id="question_type_ref" class="col">' +
                       '<option selected value="1">Texto</option>' +
                       '<option value="2">Imagem</option>' +
                       '<option value="3">Vídeo</option>' +
                       '<option value="4">Áudio</option>' +
                       '</select>' +
                       '</div>' +
                       '<div class="form-group hea row">' +
                       '<label for="room_type_ref" class="col">Interação:</label>' +
                       '<select name="room_type_ref" id="room_type_ref" class="col">' +
                       '<option selected value="right_key">Chave</option>' +
                       '<option value="hope_door" selected>Porta da esperança</option>' +
                       '<option value="true_or_false">Verdadeiro ou Falso </option>' +
                       '<option value="multiple_forms">Multiplas Formas</option>' +
                       '</select>' +
                       '</div>' +
                       '<table class="table table-bordered table-hover hea" id="dynamic_field2" border="0">' +
                       '<thead>' +
                       '<tr>' +
                       '<td>Tipo da Resposta</td>' +
                       '<td>Definição da Resposta</td>' +
                       '<td>Resposta</td>' +
                       '</tr>' +
                       '</thead>' +
                       '<tbody>' +
                       '<tr>' +
                       '<td>' +
                       '<select name ="tipo_resp_ref[]" class="form-control tipo_resp_ref">' +
                       '<option selected value="1">Texto</option>' +
                       '<option value="2">Imagem</option>' +
                       '<option value="3">Vídeo</option>' +
                       '<option value="4">Áudio</option>' +
                       '</select>' +
                       '</td>' +
                       '<td>' +
                       '<select name ="corret_ref[]" class="form-control corret_ref">' +
                       '<option selected value="1">Certa</option>' +
                       '<option value="0">Errada</option>' +
                       '</select>' +
                       '</td>' +
                       '<td><input type="text" name="resposta_ref[]" placeholder="Resposta" class="form-control name_list resposta_ref" maxlength="500" required>'+
                        '<input type="hidden" name="resp_ref_id[]" class="resp_ref_id"></td>' +
                       '<td><input type="button" class="teste" value="Add" /></td>' +
                       '</tbody>' +
                       '</table>' +
                       '<div class="hea">' +
                       '<br>' +
                       '<span style="color: black;">Selecionar o ambiente para pergunta reforço:</span><br>' +
                       '<br>' +
                       '<div class="form-group row">' +
                       '<input type="hidden" name="path_reforco_id" id="path_reforco_id"></td>' +
                       '<label for="answer_boolean_ref" class="col">Tipo:</label>' +
                       '<select name="answer_boolean_ref" id="answer_boolean_ref" class="col">' +
                       '<option selected value="1">Corredor</option>' +
                       '<option value="2">Labirinto</option>' +
                       '</select>' +
                       '</div>' +
                       '<div class="form-group row">' +
                       '<label for="tamanho_ref" class="col">Tamanho:</label>' +
                       '<select name="tamanho_ref" id="tamanho_ref" class="col">' +
                       '<option selected value="1">Pequeno</option>' +
                       '<option value="2">Medio</option>' +
                       '<option value="3">Grande</option>' +
                       '</select>' +
                       '</div>' +
                       '<div class="form-group row">' +
                       '<label for="largura_ref" class="col">Largura:</label>' +
                       '<select name="largura_ref" id="largura_ref" class="col">' +
                       '<option selected value="1">Pequeno</option>' +
                       '<option value="2">Medio</option>' +
                       '<option value="3">Grande</option>' +
                       '</select>' +
                       '</div>' +
                       '</div>'
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

           $('#addPerg').on('show.bs.modal', function (event) {
               var modal = $(this);
               var button = $(event.relatedTarget);
               var v=0,w=0,x=0,y=0,z=0;
               if (button.data('whatever')) {
                   var recipient = button.data('whatever');
                   console.log(recipient);
                   $.ajax({
                       url: 'http://127.0.0.1:8000/admin/busca-perg',
                       method: "POST",
                       data: {id: recipient},
                       dataType: 'json',
                       error: function (error) {
                       console.log(error);
                        },
                       success: function (data) {
                           console.log(data);
                           a = 0;
                            b = 0;
                           $.each(data, function(i, val){
                               if(x==0){
                                   modal.find('#pergunta').val(val.question);
                                  //   $('#pergunta').summernote(
                                  //    'code', val.question
                                  // );
                                   modal.find('#perg_id').val(val.question_id);
                                   console.log(val.question_id);
                                   modal.find('#room_type').val(val.room_type);
                                   modal.find('#question_type').val(val.question_type);
                                   $.each(val.path, function(a,path){
                                       if(w==0){
                                           modal.find('#answer_boolean').val(path.type);
                                           modal.find('#largura').val(path.widht);
                                           modal.find('#tamanho').val(path.heigh);
                                           modal.find('#path_id').val(path.path_id);
                                           w++;
                                       }else{

                                        $('#check-reforco').prop("checked", true);
                                        $("#check-reforco").trigger('change');
                                           modal.find('#answer_boolean_perg').val(path.type);
                                           modal.find('#largura_perg').val(path.widht);
                                           modal.find('#tamanho_perg').val(path.heigh);
                                           modal.find('#path_errado_id').val(path.path_id);
                                       }
                                   });
                                   $.each(val.answer, function(j,resp){
                                       if(v>0){
                                           $('#dynamic_field').append('' +
                       '<tr id="row' + i + '" class="dynamic-added">' +
                       '<td>' +
                       '<select name ="tipo_resp[]" id ="tipo_opcao" class="form-control tipo_resp">' +
                       '<option selected value="1">Texto</option>' +
                       '<option value="2">Imagem</option>' +
                       '<option value="3">Vídeo</option>' +
                       '<option value="4">Áudio</option>' +
                       '</select>' +
                       '</td>' +
                       '<td>' +
                       '<select name ="corret[]" class="form-control corret">' +
                       '<option value="1">Certa</option>' +
                       '<option selected value="0">Errada</option>' +
                       '</select>' +
                       '</td>' +
                       '<td><input type="text" name="resposta[]" placeholder="Resposta" class="form-control name_list resposta" maxlength="500" required/>'+
                        '<input type="hidden" name="resp_id[]" class="resp_id"></td>' +
                       '<td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">X</button></td>' +
                       '</tr>');
                                           a++;
                                       }
                                       modal.find(document.getElementsByClassName("tipo_resp")[v]).val(resp.tipo_resp);
                                       modal.find(document.getElementsByClassName("resp_id")[v]).val(resp.answer_id);
                                       if(resp.correct===true){
                                            modal.find(document.getElementsByClassName("corret")[v]).val(1);
                                       }else{
                                           modal.find(document.getElementsByClassName("corret")[v]).val(0);
                                       }
                                       modal.find(document.getElementsByClassName("resposta")[v]).val(resp.answer);
                                       v++;
                                       
                                   });
                                   x++;
                               }else{
                                   v=0;
                                   modal.find('#pergunta-reforco').val(val.question);
                                   modal.find('#perg-reforco-id').val(val.question_id);
                                   modal.find('#room_type_ref').val(val.room_type);
                                   modal.find('#question_type_ref').val(val.question_type);
                                    modal.find('#path_reforco_id').val(val.path.path_id);
                                    modal.find('#answer_boolean_ref').val(val.path.type);
                                    modal.find('#largura_ref').val(val.path.widht);
                                    modal.find('#tamanho_ref').val(val.path.heigh);
                                   $.each(val.answer, function(j,resp){
                                    if(v>0){
                                          $('#dynamic_field2').append('' +
                                       '<tr id="row' + i2 + '" class="dynamic-added">' +
                                       '<td>' +
                                       '<select name ="tipo_resp_ref[]" class="form-control tipo_resp_ref">' +
                                       '<option selected value="1">Texto</option>' +
                                       '<option value="2">Imagem</option>' +
                                       '<option value="3">Vídeo</option>' +
                                       '<option value="4">Áudio</option>' +
                                       '</select>' +
                                       '</td>' +
                                       '<td>' +
                                       '<select name ="corret_ref[]" class="form-control corret_ref">' +
                                       '<option value="1">Certa</option>' +
                                       '<option selected value="0">Errada</option>' +
                                       '</select>' +
                                       '</td>' +
                                       '<td><input type="text" name="resposta_ref[]" placeholder="Resposta" class="form-control name_list resposta_ref" maxlength="500" required/>'+
                                        '<input type="hidden" name="resp_ref_id[]" class="resp_ref_id"></td>' +
                                       '<td><button type="button" name="remove2" id="' + i2 + '" class="btn btn-danger btn_remove2">X</button></td>' +
                                       '</tr>');
                                   b++;
                                    }
                                       modal.find(document.getElementsByClassName("tipo_resp_ref")[v]).val(resp.tipo_resp);
                                       modal.find(document.getElementsByClassName("resp_ref_id")[v]).val(resp.answer_id);
                                       if(resp.correct===true){
                                        modal.find(document.getElementsByClassName("corret_ref")[v]).val(1);
                                       }else{
                                           modal.find(document.getElementsByClassName("corret_ref")[v]).val(0);
                                       }
                                       modal.find(document.getElementsByClassName("resposta_ref")[v]).val(resp.answer);
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
               }else{
                   modal.find('#pergunta').val('');
                    modal.find('#perg_id').val(0);
                    modal.find('#room_type').val('key');
                    modal.find('#question_type').val(1);
                   modal.find('#perg-reforco-id').val(0);
                   $('#check-reforco').prop("checked", false);
                   
               }

           });

           //Add Action to buttton submit Data to DB

           $('#submit').click(function () {
               $.ajax({

                   url: postURL,
                   method: "POST",
                   data: $('#add_name').serialize(),
                   type: 'json',
                   error: function (error) {
                       console.log(error);
                        },

                   success: function (data) {
                       if (data.error) {

                           printErrorMsg(data.error);
                       } else {
                           window.location.reload();
                           i = 1;
                           $('.dynamic-added').remove();
                           $('#add_name')[0].reset();
                           $(".print-success-msg").find("ul").html('');
                           $(".print-success-msg").css('display', 'block');
                           $(".print-error-msg").css('display', 'none');
                           $(".print-success-msg").find("ul").append('<li>'+data.success+'</li>');
                       }
                       a = 0;
                       b = 0;

                       
                   }

               });

           });
           
           $('.btnModalClose').click(function(){
               $('#add_name')[0].reset();
               $('.dynamic-added').remove();
               a = 0;
                b = 0;
//                window.location.reload();
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

           if(recipientenable == 1)
            $('#enable').prop("checked",true);
          else
            $('#public').prop("checked",false);
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


    function qrcode(qrN){
        if(document.getElementById(qrN).style.display == 'none')
            document.getElementById(qrN).style.display = 'block';
        else
            document.getElementById(qrN).style.display = 'none';
    }


$('.carousel').carousel({
  interval: 1000
});

$('body').scrollspy({ target: '#list-example' });


function launch_toast() {
    var x = document.getElementById("toast")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
}

function buscaraluno(){

 var aluno = document.getElementById("alunosearch").value;
  console.log(aluno);

}



$(document).ready(function(){

  // PAINEL PARA MOSTRAR PERGUNTA
    $("#flip").click(function(){
        $("#panel").slideToggle("slow");
    });
   // PAINEL PARA MOSTRAR reforco
    $("#flip2").click(function(){
        $("#panel2").slideToggle("slow");
    });
});



