// Alunos Js


$('#addAlunoModal').on('show.bs.modal', function (e) { 

            mostrarmaisalunos();
            pesquisa();
            mostrargrupos();

            
         });

          $('#addAlunoModal').on('hide.bs.modal', function (e) {

             $('#divtabela').empty();
             $('.pagination').empty();
             location.reload();

           }); 

         function mostrarmaisalunos(){
             var sala = document.getElementById('id_sala').value;
            console.log('sala:',sala);

        
             $.get("/admin/showaluno").done( function(data){
                 
                var contagem1 = 0;
                var contagem = 1;
                var total = 0;
                var max =7;
                var i =0;
                var parse = JSON.parse(data);
                var paginacao = Math.ceil(parse.length/max);
                console.log(parse);
            

                $('#divtabelaaluno').append(
                    '<table style="align:center" id="table'+ contagem +'" class="  justify-content-center idtable table container " >'+
                                '<thead class=" justify-content-center">'+
                                    '<tr>'+
                                        '<th scope="col-1"></th>'+
                                        '<th scope="col"> Nome: </th>'+
                                        '<th scope="col"> Email: </th>'+
                                        '<th scope="col" ></th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody  id="bodyaluno">'+
                                '</tbody>'+
                            '</table>' 
                            );



                for( i =0; i < parse.length ; i++){
 


                 if(parse[i].sala_id != sala){
                     if(i>0){
                     if(parse[i].id != parse[(i-1)].id){
                         $('#body'+contagem).append(
                                 '<tr>'+
                                '<td scope="row" id="cod'+parse[i].id +'"></td>'+
                                '<td>'+ parse[i].name + '</td>' +
                                 '<td>'+ parse[i].email +'</td>' +
                                 '<td>'+ '<a class="btn btn-primary btn-sm" id="add'+parse[i].id +'" onclick="addaluno('+parse[i].id +')">Adicionar</a>' 
                                + '<a id="done'+parse[i].id +'" style="display:none;float:right"><i class="material-icons">done</i></a>'  +'</td>' +
                                     '</tr>'

                                     );

                         contagem1++;
                    }
                }else{
                    $('#body'+contagem).append(
                                 '<tr>'+
                                '<td scope="row" id="cod'+parse[i].id +'"></td>'+
                                '<td>'+ parse[i].name + '</td>' +
                                 '<td>'+ parse[i].email +'</td>' +
                                 '<td>'+ '<a class="btn btn-primary btn-sm" id="add'+parse[i].id +'" onclick="addaluno('+parse[i].id +')">Adicionar</a>' 
                                + '<a id="done'+parse[i].id +'" style="display:none;float:right"><i class="material-icons">done</i></a>'  +'</td>' +
                                     '</tr>'

                                     );

                         contagem1++;
                }
                 }



                 }




                 paginar(1 , paginacao);


        
                  

             });
         }

         function paginar(data,total){
            
            console.log(data,total);

            var td = data*7;
            var ultimo = total*7;
            var i =0;


             for(i = 0; i <td-7; i++){
            $('.td'+i).addClass("tablehide");
        }

            for( i = td; i <= ultimo; i++){
            $('.td'+i).addClass("tablehide");
            

        }

             for( i = td-7; i <= td; i++){
            $('.td'+i).removeClass("tablehide");
        }


             $('.pagination').empty();

             if(data==1){

                $('.pagination').append( 
                '<li class="page-item active"><a class="page-link active" onclick="paginar('+data+','+total+')">'+data+'</a></li>'+ 
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data+1)+','+total+')">'+(data+1)+'</a></li>'+
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data+2)+','+total+')">'+(data+2)+'</a></li>'+
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data+3)+','+total+')">'+(data+3)+'</a></li>'+
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data+4)+','+total+')">'+(data+4)+'</a></li>'+
                '<li class="page-item "><a class="page-link" onclick="paginar('+total+','+total+')">Ultima</a></li>'
                );
            }


             if(data>2 && data<=(total-2)){
                $('.pagination').append( 
                '<li class="page-item "><a class="page-link" onclick="paginar(1'+','+total+')">Primeira</a></li>'+  
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data-2)+','+total+')">'+(data-2)+'</a></li>'+
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data-1)+','+total+')">'+(data-1)+'</a></li>'+
                '<li class="page-item active"><a class="page-link active" onclick="paginar('+data+','+total+')">'+data+'</a></li>'+ 
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data+1)+','+total+')">'+(data+1)+'</a></li>'+
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data+2)+','+total+')">'+(data+2)+'</a></li>'+
                '<li class="page-item "><a class="page-link" onclick="paginar('+total+','+total+')">Ultima</a></li>'
                );

                }else if(data==2 && data<=(total-2)){
                 $('.pagination').append(   
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data-1)+','+total+')">'+(data-1)+'</a></li>'+
                '<li class="page-item active"><a class="page-link active" onclick="paginar('+data+','+total+')">'+data+'</a></li>'+ 
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data+1)+','+total+')">'+(data+1)+'</a></li>'+
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data+2)+','+total+')">'+(data+2)+'</a></li>'+
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data+3)+','+total+')">'+(data+3)+'</a></li>'+
                '<li class="page-item "><a class="page-link" onclick="paginar('+total+','+total+')">Ultima</a></li>'
                ); }

                 else if( data==total && (total-2)>1){
                 $('.pagination').append(
                 '<li class="page-item "><a class="page-link" onclick="paginar(1'+','+total+')">Primeira</a></li>'+
                 '<li class="page-item "><a class="page-link" onclick="paginar('+(data-4)+','+total+')">'+(data-4)+'</a></li>'+       
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data-3)+','+total+')">'+(data-3)+'</a></li>'+     
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data-2)+','+total+')">'+(data-2)+'</a></li>'+   
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data-1)+','+total+')">'+(data-1)+'</a></li>'+
                '<li class="page-item active"><a class="page-link active" onclick="paginar('+data+','+total+')">'+data+'</a></li>'
                
                ); } else if(data == (total-1)){
                 $('.pagination').append(
                 '<li class="page-item "><a class="page-link" onclick="paginar(1'+','+total+')">Primeira</a></li>'+      
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data-3)+','+total+')">'+(data-3)+'</a></li>'+     
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data-2)+','+total+')">'+(data-2)+'</a></li>'+   
                '<li class="page-item "><a class="page-link" onclick="paginar('+(data-1)+','+total+')">'+(data-1)+'</a></li>'+
                '<li class="page-item active"><a class="page-link active" onclick="paginar('+data+','+total+')">'+data+'</a></li>'+
                '<li class="page-item "><a class="page-link active" onclick="paginar('+(data+1)+','+total+')">'+(data+1)+'</a></li>'
                
                ); }  

         }



          function addaluno(id){


                    
                    var idsala1 = document.getElementById('id_sala').value;

                    console.log(idsala1);

                // $.post( "/admin/aluno", { 'id': id } );

                var _token = $('meta[name="_token"]').attr('content');

                        $.ajaxSetup({

                            headers: {

                                'X-CSRF-TOKEN': _token

                            }

                        });


                     $.ajax({
                     url: 'http://127.0.0.1:8000/admin/addaluno/',
                     type: 'POST',
                     data: {
                            id: id,
                            salaid: idsala1
                        },

                    dataType: 'JSON',

                        success: function(){
                            $('#add'+id).css('display','none');
                            $('#done'+id).css('display','block');
                            
                            console.log("Comunicacao ok");
                        },

                        error: function(){
                                console.log("erro");

                        }
                        });
                       


                
                


                } 



          
    function pesquisa(){
    
    $('#search').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();
    console.log(nomeFiltro);
     

    if(nomeFiltro.length > 0){
    $('#teste').addClass("tablehide");   
     }

     if(nomeFiltro.length == 0){
        $('#teste').removeClass("tablehide");
        $('#divtabelaaluno').empty();
        $('.pagination').empty();
            mostrarmaisalunos();
        
    }

        $('.idtable').find('tr').each(function() {
        var conteudoCelula = $(this).find('td').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        if(corresponde == true){
            $(this).removeClass("tablehide");
        }else{
             $(this).addClass("tablehide");
        }

    });
});
}

function mostrargrupos() {

          $('#divtabelagrupo').append(

                    '<table style="align:center" id="" class="  justify-content-center idtable table container " >'+
                                '<thead class=" justify-content-center">'+
                                    '<tr>'+
                                        '<th scope="col-1"></th>'+
                                        '<th scope="col"> Nome: </th>'+
                                        '<th scope="col" ></th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody id="bodygrupos">'+
                                '</tbody>'+
                            '</table>' 
             );

        var id = $('#user_id').val();
        console.log(id);

      $.get("/admin/grupo/"+id).done( function(data){

    


        var parse = JSON.parse(data);
      
        for(var i = 0; i < parse.length; i++){

             $('#bodygrupos').append(
                         '<tr class="gp'+ i +'">'+
                         '<th scope="row" id="cod'+parse[i].id +'"></th>'+
                         '<td>'+ parse[i].turma+ '</td>' +
                         '<td>'+ '<a class="btn btn-primary btn-sm " onclick="addgrupo('+ parse[i].id +')" style="color:white">Adicionar</a>' +'</td>' +
                         '</tr>'
                              
                             );

        }       
   
      });


}


function addgrupo(id){

    console.log(id);
  $.get("/admin/addgrupo/"+id).done( function(data){
    console.log(data);

});

}