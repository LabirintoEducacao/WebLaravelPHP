       $(document).ready(function () {

           var postURL = 'editar-sala';
           var i = 1;
           var i2 = 1;

           // botao para add resposta fields
           var a = 0;
           var b = 0;

           $('#add').click(function () {

               if (a < 3) {
                   $('#dynamic_field').append('' +
                       '<tr id="row' + i + '" class="dynamic-added">' +
                       '<td>' +
                       '<select name ="tipo_resp[]" id ="tipo_opcao" class="form-control">' +
                       '<option selected value="1">Texto</option>' +
                       '<option value="2">Imagem</option>' +
                       '<option value="3">video</option>' +
                       '<option value="4">Audio</option>' +
                       '</select>' +
                       '</td>' +
                       '<td>' +
                       '<select name ="corret[]" class="form-control">' +
                       '<option value="1">Certa</option>' +
                       '<option selected value="0">Errada</option>' +
                       '</select>' +
                       '</td>' +
                       '<td><input type="text" name="resposta[]" placeholder="Resposta" class="form-control name_list" maxlength="80" /></td>' +
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
                       '<option value="3">video</option>' +
                       '<option value="4">Audio</option>' +
                       '</select>' +
                       '</td>' +
                       '<td>' +
                       '<select name ="corret_ref[]" class="form-control">' +
                       '<option value="1">Certa</option>' +
                       '<option selected value="0">Errada</option>' +
                       '</select>' +
                       '</td>' +
                       '<td><input type="text" name="resposta_ref[]" placeholder="Resposta" class="form-control name_list" maxlength="80" /></td>' +
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
           $('input[type="checkbox"]').on('change', function () {
               var $parent = $(this).parents('.hovereffect');
               if (this.checked) {
                   $('.abcd', $parent).append(
                       '<div class="hea">' +
                       '<br>' +
                       '<span style="color: red;">Selecionar o ambiente errado para a pergunta:</span><br><br>' +
                       '<div class="form-group row">' +
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
                       '<label for="pergunta" class="col">Pergunta:</label>' +
                       '<input class="col" id="pergunta" type="text" name="reforco"  placeholder=" Pergunta" maxlength="80" required>' +
                       '</div>' +
                       '<div class="form-group hea row">' +
                       '<label for="question_type_ref" class="col">Tipo da pergunta:</label>' +
                       '<select name ="question_type_ref" id="question_type_ref" class="col">' +
                       '<option selected value="1">Texto</option>' +
                       '<option value="2">Imagem</option>' +
                       '<option value="3">video</option>' +
                       '<option value="4">Audio</option>' +
                       '</select>' +
                       '</div>' +
                       '<div class="form-group hea row">' +
                       '<label for="room_type_ref" class="col">Interação:</label>' +
                       '<select name="room_type_ref" id="room_type_ref" class="col">' +
                       '<option selected value="key">Chave</option>' +
                       '<option value="door">Porta</option>' +
                       '<option value="diamond">Diamante</option>' +
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
                       '<select name ="tipo_resp_ref[]" class="form-control">' +
                       '<option selected value="1">Texto</option>' +
                       '<option value="2">imagem</option>' +
                       '<option value="3">video</option>' +
                       '<option value="4">Audio</option>' +
                       '</select>' +
                       '</td>' +
                       '<td>' +
                       '<select name ="corret_ref[]" class="form-control">' +
                       '<option selected value="1">Certa</option>' +
                       '<option value="0">Errada</option>' +
                       '</select>' +
                       '</td>' +
                       '<td><input type="text" name="resposta_ref[]" placeholder="Resposta" class="form-control name_list" maxlength="80"></td>' +
                       '<td><input type="button" class="teste" value="Add" /></td>' +
                       '</tbody>' +
                       '</table>' +
                       '<div class="hea">' +
                       '<br>' +
                       '<span style="color: black;">Selecionar o ambiente para pergunta reforço:</span><br>' +
                       '<br>' +
                       '<div class="form-group row">' +
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
                       '<div class="form-group">' +
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

           //Add Action to buttton submit Data to DB

           $('#submit').click(function () {
               $.ajax({

                   url: postURL,
                   method: "POST",
                   data: $('#add_name').serialize(),
                   type: 'json',

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
                           $(".print-success-msg").find("ul").append('<li>Registro inserido com sucesso.</li>');
                       }
                       a = 0;
                       b = 0;

                   }

               });

           });

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
           // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
           // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
           var modal = $(this);
           modal.find('#nome').val(recipientnome);
           modal.find('#time').val(recipientresp);
           modal.find('#sala_id').val(recipientid);
           modal.find('#theme').val(recipienttema);
           if (recipientcorrect == 1)
               $('#public').prop("checked", true);
           else
               $('#public').prop("checked", false);
           //modal.find('#public').val(recipientcorrect);


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

