$(document).ready(function () {

        var postURL='editar-sala';
        var i = 1;

        // botao para add resposta fields
        var a = 0;

        $('#add').click(function() {

         if(a < 3){
          $('#dynamic_field').append('' + 
         '<tr id="row'+i+'" class="dynamic-added">' +
         '<td>'+
         '<select name ="tipo_resp[]" id ="tipo_opcao" class="form-control">'+
         '<option selected value="1">Texto</option>'+
         '<option value="2">Imagem</option>'+
         '<option value="3">video</option>'+
         '<option value="4">Audio</option>'+
         '</select>'+
         '</td>' +
          '<td>'+
          '<select name ="corret[]" class="form-control">'+
         '<option selected value="1">Certa</option>'+
          '<option value="2">Fim de Jogo</option>'+   
          '</select>'+
          '</td>'+
          '<td>'+
          '<input type="checkbox" name="end_game[]">' +
          '</td>' +
         '<td><input type="text" name="resposta[]" placeholder="Resposta" class="form-control name_list" /></td>' +
         '<td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td>' +
         '</tr>');
          a++;
          }else{
       
             
          }

        });
        // Acao para botao deletar remove fields

        $(document).on('click', '.btn_remove', function() {
       
          var button_id = $(this).attr("id");
          $('#row'+button_id+'').remove();
          a--;
        });

        // setup token to input Field (is the rule of laravel should be put when you add data to DB)
        $.ajaxSetup({

          headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }

        });

        //Add Action to buttton submit Data to DB
        
        $('#submit').click(function() {

          $.ajax({

              url: postURL,
              method:"POST",
              data:$('#add_name').serialize(),
              type:'json',

              success:function(data)
              {
                  if(data.error){

                    printErrorMsg(data.error);
                  }else{

                    i=1;
                    $('.dynamic-added').remove();
                    $('#add_name')[0].reset();
                    $(".print-success-msg").find("ul").html('');
                    $(".print-success-msg").css('display', 'block');
                    $(".print-error-msg").css('display', 'none');
                    $(".print-success-msg").find("ul").append('<li>Registro inserido com sucesso.</li>');
                  }
                 a = 0;
              }

          });

        });

        // Print error Message
        function  printErrorMsg(msg){
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display', 'block');
        $(".print-success-msg").css('display', 'none');
        $.each( msg, function(Key, value) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
      }

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