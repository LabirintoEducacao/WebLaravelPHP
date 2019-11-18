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


function mostrarmaisalunos() {
    var sala = document.getElementById('id_sala').value;



    $.get("/admin/showaluno", {
        sala: sala
    }).done(function (data) {


        var contagem = 1;
        var contagem1 = 0;
        var max = 7;
        var i = 0;
        parse = JSON.parse(data);
        var paginacao = Math.ceil(parse.length / max);


        $('#divtabela').append(
            '<table id="table' + contagem + '" class="table justify-content-center " style="display:block;">' +
            '<thead >' +
            '<tr>' +
            '<th scope="col">  </th>' +
            '<th scope="col"> Nome: </th>' +
            '<th scope="col"> Email: </th>' +
            '<th scope="col"></th>' +
            '</tr>' +
            '</thead>' +
            '<tbody id="body' + contagem + '" >' +
            '</tbody>' +
            '</table>');






        for (i = 0; i < parse.length; i++) {



            if (contagem1 > max) {
                contagem++;

                $('#divtabela').append(
                    '<table id="table' + contagem + '" class="table container-fluid  justify-content-center" style="display:none;">' +
                    '<thead >' +
                    '<tr>' +
                    '<th scope="col"> </th>' +
                    '<th scope="col"> Nome: </th>' +
                    '<th scope="col"> Email: </th>' +
                    '<th scope="col"></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody id="body' + contagem + '" >' +
                    '</tbody>' +
                    '</table>');


                contagem1 = 0;

            }

            //if(parse[i].sala_id != sala){
            if (i > 0) {
                if (parse[i].id != parse[(i - 1)].id) {
                    $('#body' + contagem).append(
                        '<tr>' +
                        '<td scope="row" id="cod' + parse[i].id + '"></td>' +
                        '<td>' + parse[i].name + '</td>' +
                        '<td>' + parse[i].email + '</td>' +
                        '<td>' + '<a style="color:white;"class="btn btn-primary btn-sm  " id="add' + parse[i].id + '" onclick="addaluno(' + parse[i].id + ') " style="color:white">Adicionar</a>' +
                        '<a id="done' + parse[i].id + '" style="display:none;float:right"><i class="material-icons">done</i></a>' + '</td>' +
                        '</tr>'

                    );

                    contagem1++;
                }
            } else {
                $('#body' + contagem).append(
                    '<tr>' +
                    '<td scope="row" id="cod' + parse[i].id + '"></td>' +
                    '<td>' + parse[i].name + '</td>' +
                    '<td>' + parse[i].email + '</td>' +
                    '<td>' + '<a style="color:white;" class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno(' + parse[i].id + ')" style="color:white">Adicionar</a>' +
                    '<a id="done' + parse[i].id + '" style="display:none;float:right"><i class="material-icons">done</i></a>' + '</td>' +
                    '</tr>'

                );

                contagem1++;
            }

        }


        if (contagem > 5) {
            for (i = 1; i <= 5; i++) {

                if (i == 1) {
                    $('.pagination').append(
                        '<li class="page-item active"><a class="page-link" onclick="paginar(' + i + ',' + contagem + ')">' + i + '</a></li>'
                    );

                } else {


                    $('.pagination').append(
                        '<li class="page-item"><a class="page-link" onclick="paginar(' + i + ',' + contagem + ')">' + i + '</a></li>'
                    );
                }

            }

            $('.pagination').append(
                '<li class="page-item"><a class="page-link" onclick="paginar(' + contagem + ',' + contagem + ')">Ultima</a></li>'
            );

        }
        if (contagem <= 5) {

            for (i = 1; i <= contagem; i++) {

                if (i == 1) {
                    $('.pagination').append(
                        '<li class="page-item active"><a class="page-link" onclick="paginar(' + i + ',' + contagem + ')">' + i + '</a></li>'
                    );

                } else {


                    $('.pagination').append(
                        '<li class="page-item"><a class="page-link" onclick="paginar(' + i + ',' + contagem + ')">' + i + '</a></li>'
                    );
                }

            }

            $('.pagination').append(
                '<li class="page-item"><a class="page-link" onclick="paginar(' + contagem + ',' + contagem + ')">Ultima</a></li>'
            );

        }


    });
}

function paginar(opcao, data, total) {
    if (opcao == 0) {
        $('#divtabela').children().each(function () {
            $(this).css('display', 'none');
        });

        $('#table' + data).css('display', 'block');

        $('.pagination').empty();

        if (data == 1) {

            $('.pagination').append(
                '<li class="page-item active"><a class="page-link active" onclick="paginar(0,' + data + ',' + total + ')">' + data + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data + 2) + ',' + total + ')">' + (data + 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data + 3) + ',' + total + ')">' + (data + 3) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data + 4) + ',' + total + ')">' + (data + 4) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + total + ',' + total + ')">Ultima</a></li>'
            );
        }


        if (data > 2 && data <= (total - 2)) {
            $('.pagination').append(
                '<li class="page-item "><a class="page-link" onclick="paginar(0,1' + ',' + total + ')">Primeira</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data - 2) + ',' + total + ')">' + (data - 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
                '<li class="page-item active"><a class="page-link active" onclick="paginar(0,' + data + ',' + total + ')">' + data + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data + 2) + ',' + total + ')">' + (data + 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + total + ',' + total + ')">Ultima</a></li>'
            );

        } else if (data == 2 && data <= (total - 2)) {
            $('.pagination').append(
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
                '<li class="page-item active"><a class="page-link active" onclick="paginar(' + data + ',' + total + ')">' + data + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data + 2) + ',' + total + ')">' + (data + 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data + 3) + ',' + total + ')">' + (data + 3) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + total + ',' + total + ')">Ultima</a></li>'
            );
        } else if (data == total && (total - 2) > 1) {
            $('.pagination').append(
                '<li class="page-item "><a class="page-link" onclick="paginar(0,1' + ',' + total + ')">Primeira</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data - 4) + ',' + total + ')">' + (data - 4) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data - 3) + ',' + total + ')">' + (data - 3) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data - 2) + ',' + total + ')">' + (data - 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
                '<li class="page-item active"><a class="page-link active" onclick="paginar(0,' + data + ',' + total + ')">' + data + '</a></li>'

            );
        } else if (data == (total - 1)) {
            $('.pagination').append(
                '<li class="page-item "><a class="page-link" onclick="paginar(0,1' + ',' + total + ')">Primeira</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data - 3) + ',' + total + ')">' + (data - 3) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data - 2) + ',' + total + ')">' + (data - 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(0,' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
                '<li class="page-item active"><a class="page-link active" onclick="paginar(0,' + data + ',' + total + ')">' + data + '</a></li>' +
                '<li class="page-item "><a class="page-link active" onclick="paginar(0,' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>'

            );
        }
    } else {
        $('#divtabela2').children().each(function () {
            $(this).css('display', 'none');
        });
        $('#divtabela').children().each(function () {
            $(this).css('display', 'none');
        });

        $('#table' + data).css('display', 'block');

        $('.pagination').empty();

        if (data == 1) {

            $('.pagination').append(
                '<li class="page-item active"><a class="page-link active" onclick="paginar(1,' + data + ',' + total + ')">' + data + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data + 2) + ',' + total + ')">' + (data + 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data + 3) + ',' + total + ')">' + (data + 3) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data + 4) + ',' + total + ')">' + (data + 4) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + total + ',' + total + ')">Ultima</a></li>'
            );
        }


        if (data > 2 && data <= (total - 2)) {
            $('.pagination').append(
                '<li class="page-item "><a class="page-link" onclick="paginar(1,1' + ',' + total + ')">Primeira</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data - 2) + ',' + total + ')">' + (data - 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
                '<li class="page-item active"><a class="page-link active" onclick="paginar(1,' + data + ',' + total + ')">' + data + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data + 2) + ',' + total + ')">' + (data + 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + total + ',' + total + ')">Ultima</a></li>'
            );

        } else if (data == 2 && data <= (total - 2)) {
            $('.pagination').append(
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
                '<li class="page-item active"><a class="page-link active" onclick="paginar(1,' + data + ',' + total + ')">' + data + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data + 2) + ',' + total + ')">' + (data + 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data + 3) + ',' + total + ')">' + (data + 3) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + total + ',' + total + ')">Ultima</a></li>'
            );
        } else if (data == total && (total - 2) > 1) {
            $('.pagination').append(
                '<li class="page-item "><a class="page-link" onclick="paginar(1,1' + ',' + total + ')">Primeira</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data - 4) + ',' + total + ')">' + (data - 4) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data - 3) + ',' + total + ')">' + (data - 3) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data - 2) + ',' + total + ')">' + (data - 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
                '<li class="page-item active"><a class="page-link active" onclick="paginar(1,' + data + ',' + total + ')">' + data + '</a></li>'

            );
        } else if (data == (total - 1)) {
            $('.pagination').append(
                '<li class="page-item "><a class="page-link" onclick="paginar(1,1' + ',' + total + ')">Primeira</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data - 3) + ',' + total + ')">' + (data - 3) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data - 2) + ',' + total + ')">' + (data - 2) + '</a></li>' +
                '<li class="page-item "><a class="page-link" onclick="paginar(1,' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
                '<li class="page-item active"><a class="page-link active" onclick="paginar(1,' + data + ',' + total + ')">' + data + '</a></li>' +
                '<li class="page-item "><a class="page-link active" onclick="paginar(1,' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>'

            );
        }
    }
}

function addaluno(id) {
    var idsala1 = document.getElementById('id_sala').value;
    // $.post( "/admin/aluno", { 'id': id } );

    var _token = $('meta[name="_token"]').attr('content');

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': _token
        }
    });

    $.ajax({
        url: '/admin/addaluno',
        type: 'POST',
        data: {
            id: id,
            salaid: idsala1
        },

        dataType: 'JSON',

        success: function () {
            $('#add' + id).css('display', 'none');
            $('#done' + id).css('display', 'block');
        },

        error: function () {


        }
    });
    // form action="{{ url('admin/aluno') }}" method="POST"
}




function pesquisa() {

    $('#search').keyup(function () {
        var nomeFiltro = $(this).val().toLowerCase();

        $('table tbody').find('tr').each(function () {
            var conteudoCelula = $(this).find('td').text();
            var corresponde = conteudoCelula.toLowerCase().indexOf(nomeFiltro) >= 0;
            $(this).css('display', corresponde ? '' : 'none');
        });
    });

}

function mostrargrupos() {
    $('#divtabelagrupo').append(

        '<table style="align:center" id="" class="  justify-content-center idtable table container " >' +
        '<thead class=" justify-content-center">' +
        '<tr>' +
        '<th scope="col-1"></th>' +
        '<th scope="col"> Nome: </th>' +
        '<th scope="col" ></th>' +
        '</tr>' +
        '</thead>' +
        '<tbody id="bodygrupos">' +
        '</tbody>' +
        '</table>'
    );

    var id = $('#user_id').val();
    var salaid = $('#sala_id').val();


    $.get("/admin/grupo/" + id).done(function (data) {


        var parse = JSON.parse(data);

        for (var i = 0; i < parse.length; i++) {

            $('#bodygrupos').append(
                '<tr class="gp' + i + '">' +
                '<th scope="row" id="cod' + parse[i].id + '"></th>' +
                '<td>' + parse[i].turma + '</td>' +
                '<td>' + '<a class="btn btn-primary btn-sm" id="addg' + parse[i].id + '" onclick="addgrupo(' + parse[i].id + ',' + salaid + ')" style="color:white">Adicionar</a>' +
                '<a id="doneg' + parse[i].id + '" style="display:none;float:right"><i class="material-icons">done</i></a>' + '</td>' +
                '</tr>'
            );
        }
    });
}

function addgrupo(id, salaid) {
    $.get("/admin/addgrupo/" + id + "/" + salaid).done(function (data) {
        console.log(data);
        $('#addg' + id).css('display', 'none');
        $('#doneg' + id).css('display', 'block');

        function alert_grupo(msg, type) {
            var html = '<div class="alertContainer3 ' + type + '">\n';
            html += '<div class="row align-items-center">';
            html += '<div class="col-sm-8">';
            html += '<div class="mensajeAlert">' + msg + '</div>\n';
            html += '</div>';
            html += '<div class="col-sm-4">';
            html += '<div class="cerrarAlert">x</div>\n';
            html += '</div>';
            html += '</div>';
            html += '</div>';
            jQuery('body').append(html);
            window.setTimeout(function () {
                jQuery('.alertContainer3').addClass('active')
            }, 500);
            jQuery('.cerrarAlert').click(function () {
                jQuery('.alertContainer3').removeClass('active');
                window.setTimeout(function () {
                    jQuery('.alertContainer3').remove()
                }, 500);
            });
        }

        alert_grupo("Grupo Adicionado com Sucesso !!", "error");

    });
}

function fechar() {
    $('.alertainf').hide();
}





////////////////////////////////////////////////////////Thiago
//declaração de duas listas, alunos(armazena os alunos selecionados em uma lista para adicionar somente depois de confirmar) && remover(armazena uma lista de alunos selecionados para remover somente depois de confirmar)
var alunos = new Array();
var remove = new Array();


//Listenners para abrir e fechar o modal de adição de grupos
$('#addGrupoModal').on('hide.bs.modal', function (e) {
    $('#divtabela').empty();
    $('.pagination').empty();
});
$('#alunosModal').on('hide.bs.modal', function (e) {
    $('#divtabela2').empty();
    $('.pagination').empty();
});

//função COMPLEXA responsável por: mostrar TODOS os alunos quando for criar grupo, mostrar somente alunos não inseridos no grupo quando for adicionar alunos e montar a paginação(pag1,2,3,4,....)
function mostrarmaisalunos2(option, option2, jotason) {
    var todos;
    var parse;
    $('#addGrupoModal').on('show.bs.modal');
    $('.pagination').empty();

    if (option == 0) {
        if (jotason == 5) {//Ocorre quando clica em adicionar grupos (mostra TODOS os alunos)
            //console.log("Jotason se for 5---->" + jotason);
            parse = todos;
        }

        newJson = jotason;
        option = 1;
    }
    if (option == 0) {

        $.get("/admin/showalunos").done(function (data) {

            if (option2 == 0) {
                remover_alunos_inseridos(data);//Manda o array de todos os alunos para a função que seleciona somente os não presentes no grupo
                parse = JSON.parse(jotason);
                $(".pagination").empty();
            }
            else {
                parse = JSON.parse(data);
            }
            let contagem = 1;
            let contagem1 = 0;
            let max = 7;
            let i = 0;

            //console.log("jotason--->" + jotason);
            if (jotason == 5) {
                $('#divtabela').empty();
                $('.pagination').empty();
                parse = JSON.parse(todos);

                let paginacao = Math.ceil(parse.length / max);
                $('#divtabela').append(
                    '<table id="table' + contagem + '" class="table container-fluid" style="display:block;">' +
                    '<thead >' +
                    '<tr>' +
                    '<th scope="col">  </th>' +
                    '<th scope="col"> Nome: </th>' +
                    '<th scope="col"> Email: </th>' +
                    '<th scope="col"></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody id="body' + contagem + '" >' +
                    '</tbody>' +
                    '</table>');
                for (i = 0; i < parse.length; i++) {
                    if (contagem1 > max) {
                        contagem++;

                        $('#divtabela').append(
                            '<table id="table' + contagem + '" class="table container-fluid" style="display:none;">' +
                            '<thead >' +
                            '<tr>' +
                            '<th scope="col"> </th>' +
                            '<th scope="col"> Nome: </th>' +
                            '<th scope="col"> Email: </th>' +
                            '<th scope="col"></th>' +
                            '</tr>' +
                            '</thead>' +
                            '<tbody id="body' + contagem + '" >' +
                            '</tbody>' +
                            '</table>');
                        contagem1 = 0;
                    }
                    if (i > 0) {
                        if (parse[i].id != parse[(i - 1)].id) {
                            $('#body' + contagem).append(
                                '<tr id=addaluno' + parse[i].id + '>' +
                                '<td scope="row" id="cod' + parse[i].id + '"></td>' +
                                '<td>' + parse[i].name + '</td>' +
                                '<td>' + parse[i].email + '</td>' +
                                '<td>' + '<a style="color:white;" class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno2(0,' + parse[i].id + ')">Adicionar</a>' +
                                '<a id="done' + parse[i].id + '" style="display:none;float:right"><i class="material-icons">done</i></a>' + '</td>' +
                                '</tr>'

                            );
                            contagem1++;
                        }
                    } else {
                        $('#body' + contagem).append(
                            '<tr id=addaluno' + parse[i].id + '>' +
                            '<td scope="row" id="cod' + parse[i].id + '"></td>' +
                            '<td>' + parse[i].name + '</td>' +
                            '<td>' + parse[i].email + '</td>' +
                            '<td>' + '<a style="color:white;" class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno2(0,' + parse[i].id + ')">Adicionar</a>' +
                            '<a id="done' + parse[i].id + '" style="display:none;float:right"><i class="material-icons">done</i></a>' + '</td>' +
                            '</tr>'
                        );
                        contagem1++;
                    }
                }
                if (contagem > 5) {
                    for (i = 1; i <= 5; i++) {
                        if (i == 1) {
                            $('.pagination').append(
                                '<li class="page-item active"><a class="page-link" onclick="paginar(0,' + i + ',' + contagem + ')">' + i + '</a></li>'
                            );

                        } else {
                            $('.pagination').append(
                                '<li class="page-item"><a class="page-link" onclick="paginar(0,' + i + ',' + contagem + ')">' + i + '</a></li>'
                            );
                        }
                    }
                    $('.pagination').append(
                        '<li class="page-item"><a class="page-link" onclick="paginar(0,' + contagem + ',' + contagem + ')">Ultima</a></li>'
                    );
                }
                if (contagem <= 5) {
                    for (i = 1; i <= contagem; i++) {
                        if (i == 1) {
                            $('.pagination').append(
                                '<li class="page-item active"><a class="page-link" onclick="paginar(0,' + i + ',' + contagem + ')">' + i + '</a></li>'
                            );
                        } else {
                            $('.pagination').append(
                                '<li class="page-item"><a class="page-link" onclick="paginar(0,' + i + ',' + contagem + ')">' + i + '</a></li>'
                            );
                        }
                    }
                    $('.pagination').append(
                        '<li class="page-item"><a class="page-link" onclick="paginar(0,' + contagem + ',' + contagem + ')">Ultima</a></li>'
                    );
                }
            }

        });
    } else {
        $.get("/admin/showalunos").done(function (data) {
            if (option2 == 0) {
                remover_alunos_inseridos(data);
            }
            else {
                parse = JSON.parse(jotason);
            }
            let contagem = 1;
            let contagem1 = 0;
            let max = 7;
            let i = 0;
            //console.log(jotason);
            if (Option == 1) {
                parse = JSON.parse(jotason);
            }

            if (jotason == 5) {
                parse = JSON.parse(data);
                todos = parse;
                option = 0;
                $("#divtabela2").empty();
                $("#divtabela").empty();
                $(".pagination").empty();
                let paginacao = Math.ceil(parse.length / max);
                $('#divtabela').append(
                    '<table id="table' + contagem + '" class="table" style="display:block;">' +
                    '<thead >' +
                    '<tr>' +
                    '<th scope="col" >  </th>' +
                    '<th scope="col" > Nome: </th>' +
                    '<th scope="col" > Email: </th>' +
                    '<th scope="col" ></th>' +
                    '</tr>' +
                    '</thead>' +
                    '<tbody id="body' + contagem + '" >' +
                    '</tbody>' +
                    '</table>');
                for (i = 0; i < parse.length; i++) {
                    if (contagem1 > max) {
                        contagem++;

                        $('#divtabela').append(
                            '<table id="table' + contagem + '" class="table" style="display:none;">' +
                            '<thead >' +
                            '<tr>' +
                            '<th scope="col" > </th>' +
                            '<th scope="col"> Nome: </th>' +
                            '<th scope="col" > Email: </th>' +
                            '<th scope="col" ></th>' +
                            '</tr>' +
                            '</thead>' +
                            '<tbody id="body' + contagem + '" >' +
                            '</tbody>' +
                            '</table>');
                        contagem1 = 0;
                    }
                    if (i > 0) {
                        if (parse[i].id != parse[(i - 1)].id) {
                            $('#body' + contagem).append(
                                '<tr id=addaluno' + parse[i].id + '>' +
                                '<td  id="cod' + parse[i].id + '"></td>' +
                                '<td >' + parse[i].name + '</td>' +
                                '<td >' + parse[i].email + '</td>' +
                                '<td >' + '<a style="color:white;" class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno2(1,' + parse[i].id + ')">Adicionar</a>' +
                                '<a id="done' + parse[i].id + '" style="display:none;float:right"><i class="fa fa-undo rotationteste"></i></a>' + '</td>' +
                                '</tr>'

                            );
                            contagem1++;
                        }
                    } else {
                        $('#body' + contagem).append(
                            '<tr id=addaluno' + parse[i].id + '>' +
                            '<td  id="cod' + parse[i].id + '"></td>' +
                            '<td >' + parse[i].name + '</td>' +
                            '<td >' + parse[i].email + '</td>' +
                            '<td >' + '<a style="color:white;" class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno2(1,' + parse[i].id + ')">Adicionar</a>' +
                            '<a id="done' + parse[i].id + '" style="display:none;float:right"><i class="fa fa-undo rotationteste"></i></a>' + '</td>' +
                            '</tr>'
                        );
                        contagem1++;
                    }
                }
                if (contagem > 5) {
                    for (i = 1; i <= 5; i++) {
                        if (i == 1) {
                            $('.pagination').append(
                                '<li class="page-item active"><a class="page-link" onclick="paginar(1,' + i + ',' + contagem + ')">' + i + '</a></li>'
                            );

                        } else {
                            $('.pagination').append(
                                '<li class="page-item"><a class="page-link" onclick="paginar(1,' + i + ',' + contagem + ')">' + i + '</a></li>'
                            );
                        }
                    }
                    $('.pagination').append(
                        '<li class="page-item"><a class="page-link" onclick="paginar(1,' + contagem + ',' + contagem + ')">Ultima</a></li>'
                    );
                }
                if (contagem <= 5) {
                    for (i = 1; i <= contagem; i++) {
                        if (i == 1) {
                            $('.pagination').append(
                                '<li class="page-item active"><a class="page-link" onclick="paginar(1,' + i + ',' + contagem + ')">' + i + '</a></li>'
                            );
                        } else {
                            $('.pagination').append(
                                '<li class="page-item"><a class="page-link" onclick="paginar(1,' + i + ',' + contagem + ')">' + i + '</a></li>'
                            );
                        }
                    }
                    $('.pagination').append(
                        '<li class="page-item"><a class="page-link" onclick="paginar(1,' + contagem + ',' + contagem + ')">Ultima</a></li>'
                    );
                }
            }
            else {
                $("#divtabela2").empty();
                $("#divtabela").empty();
                $(".pagination").empty();
                if (option2 != 0) {
                    let paginacao = Math.ceil(parse.length / max);
                    $('#divtabela2').append(
                        '<table id="table' + contagem + '" class="table" style="display:block;">' +
                        '<thead >' +
                        '<tr>' +
                        '<th scope="col" >  </th>' +
                        '<th scope="col" > Nome: </th>' +
                        '<th scope="col" > Email: </th>' +
                        '<th scope="col" ></th>' +
                        '</tr>' +
                        '</thead>' +
                        '<tbody id="body' + contagem + '" >' +
                        '</tbody>' +
                        '</table>');
                    for (i = 0; i < parse.length; i++) {
                        if (contagem1 > max) {
                            contagem++;

                            $('#divtabela2').append(
                                '<table id="table' + contagem + '" class="table" style="display:none;">' +
                                '<thead >' +
                                '<tr>' +
                                '<th scope="col" > </th>' +
                                '<th scope="col"> Nome: </th>' +
                                '<th scope="col" > Email: </th>' +
                                '<th scope="col" ></th>' +
                                '</tr>' +
                                '</thead>' +
                                '<tbody id="body' + contagem + '" >' +
                                '</tbody>' +
                                '</table>');
                            contagem1 = 0;
                        }
                        if (i > 0) {
                            if (parse[i].id != parse[(i - 1)].id) {
                                $('#body' + contagem).append(
                                    '<tr id=addaluno' + parse[i].id + '>' +
                                    '<td  id="cod' + parse[i].id + '"></td>' +
                                    '<td >' + parse[i].name + '</td>' +
                                    '<td >' + parse[i].email + '</td>' +
                                    '<td >' + '<a style="color:white;" class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno2(1,' + parse[i].id + ')">Adicionar</a>' +
                                    '<a id="done' + parse[i].id + '" style="display:none;float:right"><i class="fa fa-undo rotationteste"></i></a>' + '</td>' +
                                    '</tr>'

                                );
                                contagem1++;
                            }
                        } else {
                            $('#body' + contagem).append(
                                '<tr id=addaluno' + parse[i].id + '>' +
                                '<td  id="cod' + parse[i].id + '"></td>' +
                                '<td >' + parse[i].name + '</td>' +
                                '<td >' + parse[i].email + '</td>' +
                                '<td >' + '<a style="color:white;" class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno2(1,' + parse[i].id + ')">Adicionar</a>' +
                                '<a id="done' + parse[i].id + '" style="display:none;float:right"><i class="fa fa-undo rotationteste"></i></a>' + '</td>' +
                                '</tr>'
                            );
                            contagem1++;
                        }
                    }
                    if (contagem > 5) {
                        for (i = 1; i <= 5; i++) {
                            if (i == 1) {
                                $('.pagination').append(
                                    '<li class="page-item active"><a class="page-link" onclick="paginar(1,' + i + ',' + contagem + ')">' + i + '</a></li>'
                                );

                            } else {
                                $('.pagination').append(
                                    '<li class="page-item"><a class="page-link" onclick="paginar(1,' + i + ',' + contagem + ')">' + i + '</a></li>'
                                );
                            }
                        }
                        $('.pagination').append(
                            '<li class="page-item"><a class="page-link" onclick="paginar(1,' + contagem + ',' + contagem + ')">Ultima</a></li>'
                        );
                    }
                    if (contagem <= 5) {
                        for (i = 1; i <= contagem; i++) {
                            if (i == 1) {
                                $('.pagination').append(
                                    '<li class="page-item active"><a class="page-link" onclick="paginar(1,' + i + ',' + contagem + ')">' + i + '</a></li>'
                                );
                            } else {
                                $('.pagination').append(
                                    '<li class="page-item"><a class="page-link" onclick="paginar(1,' + i + ',' + contagem + ')">' + i + '</a></li>'
                                );
                            }
                        }
                        $('.pagination').append(
                            '<li class="page-item"><a class="page-link" onclick="paginar(1,' + contagem + ',' + contagem + ')">Ultima</a></li>'
                        );
                    }
                }
                option = 0;
            }
        });
    }
}

//função reponsável por remover um grupo
function removeGrupo(id, prof_id, turma) {
    console.log(prof_id);
    $.get("/grupos/deletar-grupo/" + id).done(
        function () {
            $('#fecharGrupo').trigger('click');
            var type = "danger";
            $.notify({
                message: "Grupo " + turma + " removido com sucesso"
            }, {
                type: type,
                timer: 4000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
        }
    );
    setTimeout(function () {
        window.location.reload()
    }, 450);
}

//função reponsável por criar um grupo
function salvarGrupo(id_prof) {
    var nome = $("#nome").val();
    if (nome != "") {
        let tam = alunos.length;

        var _token = $('meta[name="_token"]').attr('content');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': _token
            }
        });
        $('#teste').trigger('click');
        var type = "success";
        $.notify({
            message: "Grupo " + nome + " adicionado com sucesso"
        }, {
            type: type,
            timer: 4000,
            placement: {
                from: 'top',
                align: 'right'
            },
            z_index: 999999
        });
        $.ajax({
            url: '/grupos/addaluno',
            type: 'POST',
            data: {
                grupo: nome,
                alunos: alunos
            },
            dataType: 'JSON',

            success: function () {
                alunos = [];
            },
            error: function (error) {
                console.log(error);
            }
        });
        setTimeout(function () {
            
            window.location.reload()
        }, 450);

    } else {
        var type = "warning";
        $.notify({
            message: "Você precisa dar um nome para o grupo!"
        }, {
            type: type,
            timer: 4000,
            placement: {
                from: 'top',
                align: 'right'
            },
            z_index: 9999
        });
        $('#nome').focus();
        console.log("Nome vazio");
    }
}

//Função responsável por adicionar ou remover o aluno selecionado do vetor alunos[]
function addaluno2(option, id) {
    console.log(alunos);
    if (option == 0) {
        if ($('#add' + id + ':visible').length == 0) {
            $('#done' + id).css('display', 'none');
            $('#add' + id).css('display', 'block');
            $("#addaluno" + id).css('background-color', '#fff');
            for (var i = 0; i < alunos.length; i++) {
                if (alunos[i] === id) {
                    alunos.splice(i, 1);
                }
            }
        } else {
            $('#add' + id).css('display', 'none');
            $('#done' + id).css('display', 'block');
            $('#done' + id).attr("onclick", "addaluno2(0," + id + ")");
            alunos.push(id);
            $("#addaluno" + id).css('background-color', '#bdf59d');

        }
    } else {
        if ($('#add' + id + ':visible').length == 0) {
            $('#done' + id).css('display', 'none');
            $('#add' + id).css('display', 'block');
            $("#addaluno" + id).css('background-color', '#fff');
            for (let i = 0; i < alunos.length; i++) {
                if (alunos[i] === id) {
                    alunos.splice(i, 1);
                }
            }
        } else {
            $('#add' + id).css('display', 'none');
            $('#done' + id).css('display', 'block');
            $('#done' + id).attr("onclick", "addaluno2(0," + id + ")");
            $("#addaluno" + id).css('background-color', '#bdf59d');
            alunos.push(id);
        }
    }
}

//função atalho para a funçao linhatabela()
function editTabela(id) {
    $('#linha' + id).trigger('click');
}

//Função responsável por abrir um modal e mostrar uma tabela com os alunos pertencentes a este grupo
function linhaTabela(id) {
    $("#start_tab").attr("class","nav-link active nomegrupo");
    $("#second_tab").attr("class","nav-link");
    $("#linha" + id).attr("data-toggle", "modal");
    $("#linha" + id).attr("data-target", "#alunosModal");
    $("#save-edit").attr("onclick", "check(" + id + ')');
    
    //Altera o nome da primeira TAB para o nome do gurpo
    $.get("/grupos/nomegrupo/" + id).done(
        function (nome) {
            $('.nomegrupo').text(nome[0].turma);
        }
    );
    //Preenche a tabela dos alunos do grupo que foi clicado
    $.get("/grupos/alunosgrupo/" + id).done(
        function (data) {
            $('#tabelaalunosgrupos').empty();
            for (let i = 0; i < data.length; i++) {
                var linha = $("<tr id='aluno" + data[i].id + "'><td data-toggle='modal' data-target='#alunosModal' width='90%'>" + data[i].name + "</td><td style='text-align: center'><i onclick='removeAluno(1," + data[i].id + ',' + data[i].turma + ")' id='checkreturn" + data[i].id + "'style='display:none'class='fa fa-undo rotationteste' aria-hidden='true'></i><i class='material-icons rotationteste' id='checkremove" + data[i].id + "'style='color:red;' onclick='removeAluno(0," + data[i].id + ',' + data[i].turma + ")'></i></td></tr>");
                $("#tabelaalunosgrupos").append(linha);
            }
        });
}

//função que manipula o vetor remove[]-->vetor responsável por salvar uma lista de alunos que serão removidos ao confirmar a alteração
function removeAluno(option, id, turma) {
    if (option == 0) {
        remove.push(id);
        $('#aluno' + id).css('background-color', 'rgba(247,203,203,0.72)');
        $("#checkremove" + id).css('display', 'none');
        $("#checkreturn" + id).css('display', 'block');
    }
    else if (option == 1) {
        for (let i = 0; i < remove.length; i++) {
            if (remove[i] === id) {
                remove.splice(i, 1);
            }
        }
        $('#aluno' + id).css('background-color', 'white');
        $("#checkremove" + id).css('display', 'block');
        $("#checkreturn" + id).css('display', 'none');
    }
}

//função responsável por trocar as tabs
function troca_tabs(option) {
    $("#divtabela2").empty();
    if (option == 0) {
        mostrarmaisalunos2(1, 0);
        for (let i = 0; i <= remove.length; i++) {
            $('#aluno' + remove[i]).css('background-color', 'white');
            $("#checkremove" + remove[i]).css('display', 'block');
            $("#checkreturn" + remove[i]).css('display', 'none');
        }
        $("#salas_v").hide();
        $("#divdatabela").hide();
        $('#adicionaralunos').show();
        remove = [];
    } else if (option == 1) {
        $("#divdatabela").show();
        $('#adicionaralunos').hide();
        $("#salas_v").hide();
        alunos = [];
    } else if (option == 2) {
        $("#salas_v").show();
        $("#divdatabela").hide();
        $('#adicionaralunos').hide();
    }

}

//Função que abre o modal para a confirmação da ação
function check(id) {
    $("#save-edit").attr("data-toggle", "modal");
    $("#save-edit").attr("data-target", "#confirmalert");
    $("#confirmalert").css("z-index", "9999");

    setTimeout(function () {
        $("#confirmar").attr("onclick", "salvar_alteracoes(" + id + ',0)');
        $("#fecharGrupo").attr("onclick", "salvar_alteracoes(" + id + ',1)');
        $(".texto-confirmar").html("Deseja mesmo salvar as alterações?");
    }, 300);

    // console.log("Lista de alunos a serem removidos:")
    // console.log(remove);
    // console.log("Lista de alunos a serem adicionados:")
    // console.log(alunos);
    // console.log("Id da sala ----->" + id);
    // if (alunos.length > 0) {
    //     // console.log("Adicionar");
    // }
    // else if (remove.length > 0) {
    //     // console.log("Remover");
    // }
}
$("#confirmalert").on('hidden.bs.modal', function (event) {
    $("body").addClass('modal-open');
});

//função que realiza a adição ou remoção dos alunos após clicar em confirmar no modal de confirmação de alteração
function salvar_alteracoes(id, op) {
    if (op == 0) {
        if (remove.length > 0) {//Remover
            $.ajax({
                url: '/grupos/remover/aluno',
                type: 'POST',
                data: {
                    aluno: remove,
                    turma: id
                },
                dataType: 'JSON',

                success: function () {
                    console.log("funfou");
                    for (let i = 0; i <= remove.length; i++) {
                        $("#aluno" + remove[i]).remove();
                    }
                    //remove = [];
                    function confirmAlter(msg, type) {
                        var html = '<div class="alertContainer3 ' + type + '">\n';
                        html += '<div class="row align-items-center">';
                        html += '<div class="col-8">';
                        html += '<div class="mensajeAlert">' + msg + '</div>\n';
                        html += '</div>';
                        html += '<div class="col">';
                        html += '<div class="cerrarAlert">x</div>\n';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        jQuery('body').append(html);
                        window.setTimeout(function () { jQuery('.alertContainer3').addClass('active') }, 1);
                        // jQuery('.cerrarAlert').click(function () {
                        //     jQuery('.alertContainer3').removeClass('active');
                        //     window.setTimeout(function () { jQuery('.alertContainer3').remove() }, 1);
                        // });
                        setTimeout(function () {
                            $(".alertContainer3").remove();
                        }, 3000);
                    }

                    confirmAlter("Alterações realizadas com sucesso", "info0");
                    $('#fecharGrupo').trigger('click');
                },
                error: function (error) {
                    console.log(error);
                }
            });

        }
        else if (alunos.length > 0) {//Adicionar
            console.log("Adicionaraaaaaaaaaaaaaaaaa")
            for (let i = 0; i < alunos.length; i++) {
                console.log("entrei--->"+i);
                $("#addaluno" + alunos[i]).remove();
            }
            $.ajax({
                url: '/grupos/addalunogrupo',
                type: 'POST',
                data: {
                    aluno: alunos,
                    turma: id
                },
                dataType: 'JSON',

                success: function (data) {
                    console.log(data);
                    for (let i = 0; i <= remove.length; i++) {
                        $.get("/grupos/alunosgrupo/" + id).done(
                            function (data) {
                                $('#tabelaalunosgrupos').empty();
                                for (let i = 0; i < data.length; i++) {
                                    var linha = $("<tr id='aluno" + data[i].id + "'><td data-toggle='modal' data-target='#alunosModal' width='90%'>" + data[i].name + "</td><td style='text-align: center'><i onclick='removeAluno(1," + data[i].id + ',' + data[i].turma + ")' id='checkreturn" + data[i].id + "'style='display:none'class='fa fa-undo rotationteste' aria-hidden='true'></i><i class='material-icons rotationteste' id='checkremove" + data[i].id + "'style='color:red;' onclick='removeAluno(0," + data[i].id + ',' + data[i].turma + ")'></i></td></tr>");
                                    $("#tabelaalunosgrupos").append(linha);
                                }
                            });
                    }
                    var type = "success";
                    $.notify({
                        message: "Alterações realizadas com sucesso"
                    }, {
                        type: type,
                        timer: 4000,
                        placement: {
                            from: 'top',
                            align: 'right'
                        },
                        z_index: 999999
                    });
                    $('#fecharGrupo').trigger('click');
                },
                error: function (error) {
                    console.log("aaaaaaaa " + error);
                }
            });
        }
        console.log("Tamanho da lista alunos: " + alunos.length);
        console.log("Tamanho da lista remove: " + remove.length);
        console.log("Op --->" + op);
    }
    else if (op == 1) {
        alunos = [];
        remove = [];
        console.log("Cancelei a alteração")
    }
}

//Função responsável por mostrar, na aba adicionar alunos, somente alunos que ainda não foram inseridos no grupo selecionado
function remover_alunos_inseridos(data1) {
    let teste = $("#save-edit").attr('onclick');
    let res = teste.split("(");
    let res2 = res[1];
    let res3 = res2.split(")");
    $.get("/grupos/alunosgrupo/" + res3[0]).done(
        function (data) {
            var json_original = JSON.parse(data1);
            for (let i = 0; i < json_original.length; i++) {
                for (let y = 0; y < data.length; y++) {
                    if (json_original[i].id == data[y].id) {
                        json_original.splice(i, 1);
                    }
                }
            }
            jsonNovo = JSON.stringify(json_original);
            mostrarmaisalunos2(0, 1, jsonNovo);
        });
}
////////////////////////////////////////////////////////Thiago


function gruposVinculados(id) {
    $.get("/vinculogrupo/" + id).done(function (data) {
        console.log(data);
    });
}
