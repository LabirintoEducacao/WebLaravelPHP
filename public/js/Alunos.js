// Alunos Js


$('#addAlunoModal').on('show.bs.modal', function (e) { 

            mostrarmaisalunos();
            pesquisa();

            
         });

          $('#addAlunoModal').on('hide.bs.modal', function (e) {

             $('#divtabela').empty();
             $('.pagination').empty();
             location.reload();

           }); 

         function mostrarmaisalunos(){
             var sala = document.getElementById('id_sala').value;
         

        
             $.get("/admin/showaluno").done( function(data){
                 console.log(data);

                var contagem = 1;
                var contagem1 = 0;
                var max =7;
                var i =0;
                parse = JSON.parse(data);
                var paginacao = Math.ceil(parse.length/max);
            

                $('#divtabela').append(
                    '<table id="table'+ contagem +'" class="table container-fluid" style="display:block;">'+
                                '<thead >'+
                                    '<tr>'+
                                        '<th scope="col">  </th>'+
                                        '<th scope="col"> Nome: </th>'+
                                        '<th scope="col"> Email: </th>'+
                                        '<th scope="col"></th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody id="body'+ contagem +'" >'+
                                '</tbody>'+
                            '</table>' );



               


                for( i =0; i < parse.length ; i++){

                   

                 if(contagem1 > max){
                    contagem ++;

                    $('#divtabela').append(
                    '<table id="table'+ contagem +'" class="table container-fluid" style="display:none;">'+
                                '<thead >'+
                                    '<tr>'+
                                        '<th scope="col"> </th>'+
                                        '<th scope="col"> Nome: </th>'+
                                        '<th scope="col"> Email: </th>'+
                                        '<th scope="col"></th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody id="body'+ contagem +'" >'+
                                '</tbody>'+
                            '</table>' );


                    contagem1 =0;

                 }

                 //if(parse[i].sala_id != sala){
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


                if(contagem > 5){
                for(i=1; i<=5; i++){

                 if(i==1){
                    $('.pagination').append(
                '<li class="page-item active"><a class="page-link" onclick="paginar('+i+','+contagem+')">'+ i +'</a></li>'
                    );

                 } else{  


                $('.pagination').append(
                '<li class="page-item"><a class="page-link" onclick="paginar('+i+','+contagem+')">'+ i +'</a></li>'
                    );
                }

                }

                $('.pagination').append(
                '<li class="page-item"><a class="page-link" onclick="paginar('+contagem+','+contagem+')">Ultima</a></li>'
                    );

            } if(contagem <=5 ) {

                for(i=1; i<=contagem; i++){

                 if(i==1){
                    $('.pagination').append(
                '<li class="page-item active"><a class="page-link" onclick="paginar('+i+','+contagem+')">'+ i +'</a></li>'
                    );

                 } else{  


                $('.pagination').append(
                '<li class="page-item"><a class="page-link" onclick="paginar('+i+','+contagem+')">'+ i +'</a></li>'
                    );
                }

                }
                
                $('.pagination').append(
                '<li class="page-item"><a class="page-link" onclick="paginar('+contagem+','+contagem+')">Ultima</a></li>'
                    );

            }
                  

             });
         }

         function paginar(data,total){
            


            $('#divtabela').children().each(function() {
            $(this).css('display','none');
});

             $('#table'+data).css('display','block');

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
                       


                
                // form action="{{ url('admin/aluno') }}" method="POST"


                } 



          
    function pesquisa(){
    
    $('#search').keyup(function() {
    var nomeFiltro = $(this).val().toLowerCase();

        $('table tbody').find('tr').each(function() {
        var conteudoCelula = $(this).find('td').text();
        var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
        $(this).css('display', corresponde ? '' : 'none');
    });
});
}