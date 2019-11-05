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
                        '<td>' + '<a class="btn btn-primary btn-sm  " id="add' + parse[i].id + '" onclick="addaluno(' + parse[i].id + ') " style="color:white">Adicionar</a>' +
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
                    '<td>' + '<a class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno(' + parse[i].id + ')" style="color:white">Adicionar</a>' +
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

function paginar(data, total) {

    $('#divtabela').children().each(function () {
        $(this).css('display', 'none');
    });

    $('#table' + data).css('display', 'block');

    $('.pagination').empty();

    if (data == 1) {

        $('.pagination').append(
            '<li class="page-item active"><a class="page-link active" onclick="paginar(' + data + ',' + total + ')">' + data + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data + 2) + ',' + total + ')">' + (data + 2) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data + 3) + ',' + total + ')">' + (data + 3) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data + 4) + ',' + total + ')">' + (data + 4) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + total + ',' + total + ')">Ultima</a></li>'
        );
    }


    if (data > 2 && data <= (total - 2)) {
        $('.pagination').append(
            '<li class="page-item "><a class="page-link" onclick="paginar(1' + ',' + total + ')">Primeira</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data - 2) + ',' + total + ')">' + (data - 2) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
            '<li class="page-item active"><a class="page-link active" onclick="paginar(' + data + ',' + total + ')">' + data + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data + 2) + ',' + total + ')">' + (data + 2) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + total + ',' + total + ')">Ultima</a></li>'
        );

    } else if (data == 2 && data <= (total - 2)) {
        $('.pagination').append(
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
            '<li class="page-item active"><a class="page-link active" onclick="paginar(' + data + ',' + total + ')">' + data + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data + 2) + ',' + total + ')">' + (data + 2) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data + 3) + ',' + total + ')">' + (data + 3) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + total + ',' + total + ')">Ultima</a></li>'
        );
    } else if (data == total && (total - 2) > 1) {
        $('.pagination').append(
            '<li class="page-item "><a class="page-link" onclick="paginar(1' + ',' + total + ')">Primeira</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data - 4) + ',' + total + ')">' + (data - 4) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data - 3) + ',' + total + ')">' + (data - 3) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data - 2) + ',' + total + ')">' + (data - 2) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
            '<li class="page-item active"><a class="page-link active" onclick="paginar(' + data + ',' + total + ')">' + data + '</a></li>'

        );
    } else if (data == (total - 1)) {
        $('.pagination').append(
            '<li class="page-item "><a class="page-link" onclick="paginar(1' + ',' + total + ')">Primeira</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data - 3) + ',' + total + ')">' + (data - 3) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data - 2) + ',' + total + ')">' + (data - 2) + '</a></li>' +
            '<li class="page-item "><a class="page-link" onclick="paginar(' + (data - 1) + ',' + total + ')">' + (data - 1) + '</a></li>' +
            '<li class="page-item active"><a class="page-link active" onclick="paginar(' + data + ',' + total + ')">' + data + '</a></li>' +
            '<li class="page-item "><a class="page-link active" onclick="paginar(' + (data + 1) + ',' + total + ')">' + (data + 1) + '</a></li>'

        );
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
        url: 'http://127.0.0.1:8000/admin/addaluno/',
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
var alunos = new Array();

$('#addGrupoModal').on('show.bs.modal', function (e) {
    //mostrarmaisalunos2(0);
    pesquisa();
});

$('#addGrupoModal').on('hide.bs.modal', function (e) {
    $('#divtabela').empty();
    $('.pagination').empty();
});
$('#alunosModal').on('hide.bs.modal', function (e) {

    $('#divtabela2').empty();
    $('.pagination').empty();
});

function mostrarmaisalunos2(option) {
    $('.pagination').empty();
    if (option == 0) {
        $.get("/admin/showalunos").done(function (data) {
            console.log(option);
            let contagem = 1;
            let contagem1 = 0;
            let max = 7;
            let i = 0;
            parse = JSON.parse(data);
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
                            '<tr>' +
                            '<td scope="row" id="cod' + parse[i].id + '"></td>' +
                            '<td>' + parse[i].name + '</td>' +
                            '<td>' + parse[i].email + '</td>' +
                            '<td>' + '<a class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno2(0,' + parse[i].id + ')">Adicionar</a>' +
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
                        '<td>' + '<a class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno2(0,' + parse[i].id + ')">Adicionar</a>' +
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
        });
    } else {
        $.get("/admin/showalunos").done(function (data) {
            console.log(option);
            let contagem = 1;
            let contagem1 = 0;
            let max = 7;
            let i = 0;
            parse = JSON.parse(data);
            let paginacao = Math.ceil(parse.length / max);
            $('#divtabela2').append(
                '<table id="table' + contagem + '" class="table" style="display:block;">' +
                '<thead >' +
                '<tr>' +
                '<th >  </th>' +
                '<th > Nome: </th>' +
                '<th > Email: </th>' +
                '<th ></th>' +
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
                        '<th > </th>' +
                        '<th > Nome: </th>' +
                        '<th > Email: </th>' +
                        '<th ></th>' +
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
                            '<tr>' +
                            '<td style="width:100%;"; id="cod' + parse[i].id + '"></td>' +
                            '<td style="width:100%;">' + parse[i].name + '</td>' +
                            '<td style="width:100%;">' + parse[i].email + '</td>' +
                            '<td style="width:100%;">' + '<a class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno2(1,' + parse[i].id + ')">Adicionar</a>' +
                            '<a id="done' + parse[i].id + '" style="display:none;float:right"><i class="material-icons">done</i></a>' + '</td>' +
                            '</tr>'

                        );
                        contagem1++;
                    }
                } else {
                    $('#body' + contagem).append(
                        '<tr>' +
                        '<td style="width:100%;" id="cod' + parse[i].id + '"></td>' +
                        '<td style="width:100%;">' + parse[i].name + '</td>' +
                        '<td style="width:100%;">' + parse[i].email + '</td>' +
                        '<td style="width:100%;">' + '<a class="btn btn-primary btn-sm" id="add' + parse[i].id + '" onclick="addaluno2(1,' + parse[i].id + ')">Adicionar</a>' +
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
        });


        console.log(option);
        console.log("Testando");
    }
}

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
            url: '/grupos/addaluno/',
            type: 'POST',
            data: {
                grupo: nome,
                alunos: alunos
            },
            dataType: 'JSON',

            success: function () {},
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

function addaluno2(option, id) {

    if (option == 0) {
        console.log(option);
        if ($('#add' + id + ':visible').length == 0) {
            $('#done' + id).css('display', 'none');
            $('#add' + id).css('display', 'block');
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
        }
    } else {
        console.log(option);
    }

}

function editTabela(id) {
    $('#linha' + id).trigger('click');
}

function linhaTabela(id) {
    $("#linha" + id).attr("data-toggle", "modal");
    $("#linha" + id).attr("data-target", "#alunosModal");

    // let tabela="<table class='table table-hover'><head class='text-primary'><th>Nome do aluno</th><th>Ações</th></thead><tbody id='tabelaalunosgrupos'></tbody></table>"
    // $("#divdatabela").append(tabela);
    $.get("/grupos/nomegrupo/" + id).done(
        function (nome) {
            $('.nomegrupo').text(nome[0].turma);
        }
    );
    $.get("/grupos/alunosgrupo/" + id).done(
        function (data) {
            $('#tabelaalunosgrupos').empty();
            for (let i = 0; i < data.length; i++) {
                var linha = $("<tr id='aluno" + data[i].id + "'><td data-toggle='modal' data-target='#alunosModal' width='90%'>" + data[i].name + "</td><td style='text-align: center'><a style='color:red;' onclick='removeAluno(" + data[i].id + ',' + data[i].turma + ")'>X</a></td></tr>");
                $("#tabelaalunosgrupos").append(linha);
            }
        });
}

function removeAluno(id, turma) {

    console.log(id);
    console.log(turma);
    $.ajax({
        url: '/grupos/remover/aluno',
        type: 'POST',
        data: {
            aluno: id,
            turma: turma
        },
        dataType: 'JSON',

        success: function () {
            console.log("funfou");
            $("#aluno" + id).remove();
        },
        error: function (error) {
            console.log(error);
        }
    });
}
////////////////////////////////////////////////////////Thiago
