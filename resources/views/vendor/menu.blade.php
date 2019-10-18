<!--
=========================================================
 Material Dashboard - v2.1.1
=========================================================

 Product Page: https://www.creative-tim.com/product/material-dashboard
 Copyright 2019 Creative Tim (https://www.creative-tim.com)
 Licensed under MIT (https://github.com/creativetimofficial/material-dashboard/blob/master/LICENSE.md)

 Coded by Creative Tim

=========================================================

 The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<!DOCTYPE html>
<html lang="en" id="abrirmenu">

<head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta http-equiv="cache-control" content="no-cache" />
    <title>
        Labirinto Educacional
    </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <!-- CSS Files -->
    <link href="{{asset('assets/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{asset('assets/demo/demo.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/c0ff39d208.js" crossorigin="anonymous"></script>
</head>

<body class="">
    <div class="wrapper " >
        <div class="sidebar"  data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg" >


            <div class="logo">
                <span style="margin-left: 40%">{{ Auth::user()->name }}</span>
            </div>
            <div class="sidebar-wrapper" id="sidebar" >
                <ul class="nav">
                    <!-- <li class="nav-item active"> -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('home')}}">
                            <i class="material-icons">home</i>
                            Home
                        </a>
                    </li>
                    @hasrole('admin')
                    <li class="nav-item ">
                        <h6 style="margin-left:6%;">Menu do Administrador</h6>
                        <a class="nav-link" href="{{url('/admin/users')}}">
                            <i class="material-icons">supervisor_account</i>
                            Usuários
                        </a>
                    </li>
                    @endhasrole
                    @hasrole('professor')
                    <li class="nav-item ">
                        <h6 style="margin-left:6%;">Menu do Professor</h6>
                        <a class="nav-link" href="{{url('/admin/sala')}}">
                            <i class="material-icons">widgets</i>
                            Editar Salas
                        </a>
                    </li>
                    @endhasrole
                    @hasrole('user')
                    <li class="nav-item ">
                        <h6 style="margin-left:6%;">Menu do Jogador</h6>
                        <a class="nav-link" href="{{url('/admin/virtual')}}">
                            <i class="fas fa-rocket"></i>
                            Espaço Virtual
                        </a>
                    </li>
                    @endhasrole
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/admin/settings')}}">
                            <i class="material-icons">person</i>
                            Perfil
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/admin/settings/password')}}">
                            <i class="material-icons">lock</i>
                            Senha
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/manual')}}">
                            <i class="material-icons">library_books</i>
                            Manual
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">

                            <i class="nav-icon fa fa-sign-out-alt"></i> Sair
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>

                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel" id="overlayer">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">

            <button class="navbar-toggler"id="botaomenu" type="button" data-toggle="collapse"  aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" onclick="botaomenu()">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                   
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="animated fadeIn"></div>

                    @yield('content')
                </div>
            </div>
            <footer class="footer">

            </footer>

           <!--  <div class="close-layer visible" id=""></div> -->



        </div>
    </div>




    <script src="{{asset('assets/js/core/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/core/bootstrap-material-design.min.js')}}"></script>
   <!--  <script src="{{asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script> -->
    <!-- Plugin for the momentJs  -->
    <script src="{{asset('assets/js/plugins/moment.min.js')}}"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{asset('assets/js/plugins/sweetalert2.j')}}s"></script>
    <!-- Forms Validations Plugin -->
    <script src="{{asset('assets/js/plugins/jquery.validate.min.j')}}s"></script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{asset('assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
    <!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{asset('assets/js/plugins/bootstrap-selectpicker.js')}}" defer></script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{asset('assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="{{asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script>
    <!--  Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{asset('assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{asset('assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="{{asset('assets/js/plugins/jquery-jvectormap.js')}}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{asset('assets/js/plugins/nouislider.min.js')}}"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{asset('assets/js/plugins/arrive.min.js')}}"></script>
    <!--  Google Maps Plugin    -->
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <!-- Chartist JS -->
    <script src="{{asset('assets/js/plugins/chartist.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{asset('assets/js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{asset('assets/demo/demo.js')}}"></script>
    <script src="{{ asset('js/caixa.js')}}" defer></script>
    <script>
        $(document).ready(function() {
            $().ready(function() {
                $sidebar = $('.sidebar');

                $sidebar_img_container = $sidebar.find('.sidebar-background');

                $full_page = $('.full-page');

                $sidebar_responsive = $('body > .navbar-collapse');

                window_width = $(window).width();

                fixed_plugin_open = $('.sidebar .sidebar-wrapper .nav li.active a p').html();

                if (window_width > 767 && fixed_plugin_open == 'Dashboard') {
                    if ($('.fixed-plugin .dropdown').hasClass('show-dropdown')) {
                        $('.fixed-plugin .dropdown').addClass('open');
                    }

                }

                $('.fixed-plugin a').click(function(event) {
                    // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
                    if ($(this).hasClass('switch-trigger')) {
                        if (event.stopPropagation) {
                            event.stopPropagation();
                        } else if (window.event) {
                            window.event.cancelBubble = true;
                        }
                    }
                });

                $('.fixed-plugin .active-color span').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-color', new_color);
                    }

                    if ($full_page.length != 0) {
                        $full_page.attr('filter-color', new_color);
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.attr('data-color', new_color);
                    }
                });

                $('.fixed-plugin .background-color .badge').click(function() {
                    $(this).siblings().removeClass('active');
                    $(this).addClass('active');

                    var new_color = $(this).data('background-color');

                    if ($sidebar.length != 0) {
                        $sidebar.attr('data-background-color', new_color);
                    }
                });

                $('.fixed-plugin .img-holder').click(function() {
                    $full_page_background = $('.full-page-background');

                    $(this).parent('li').siblings().removeClass('active');
                    $(this).parent('li').addClass('active');


                    var new_image = $(this).find("img").attr('src');

                    if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        $sidebar_img_container.fadeOut('fast', function() {
                            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                            $sidebar_img_container.fadeIn('fast');
                        });
                    }

                    if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $full_page_background.fadeOut('fast', function() {
                            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                            $full_page_background.fadeIn('fast');
                        });
                    }

                    if ($('.switch-sidebar-image input:checked').length == 0) {
                        var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
                        var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

                        $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
                        $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
                    }

                    if ($sidebar_responsive.length != 0) {
                        $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
                    }
                });

                $('.switch-sidebar-image input').change(function() {
                    $full_page_background = $('.full-page-background');

                    $input = $(this);

                    if ($input.is(':checked')) {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar_img_container.fadeIn('fast');
                            $sidebar.attr('data-image', '#');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page_background.fadeIn('fast');
                            $full_page.attr('data-image', '#');
                        }

                        background_image = true;
                    } else {
                        if ($sidebar_img_container.length != 0) {
                            $sidebar.removeAttr('data-image');
                            $sidebar_img_container.fadeOut('fast');
                        }

                        if ($full_page_background.length != 0) {
                            $full_page.removeAttr('data-image', '#');
                            $full_page_background.fadeOut('fast');
                        }

                        background_image = false;
                    }
                });

                $('.switch-sidebar-mini input').change(function() {
                    $body = $('body');

                    $input = $(this);

                    if (md.misc.sidebar_mini_active == true) {
                        $('body').removeClass('sidebar-mini');
                        md.misc.sidebar_mini_active = false;

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

                    } else {

                        $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

                        setTimeout(function() {
                            $('body').addClass('sidebar-mini');

                            md.misc.sidebar_mini_active = true;
                        }, 300);
                    }

                    // we simulate the window Resize so the charts will get updated in realtime.
                    var simulateWindowResize = setInterval(function() {
                        window.dispatchEvent(new Event('resize'));
                    }, 180);

                    // we stop the simulation of Window Resize after the animations are completed
                    setTimeout(function() {
                        clearInterval(simulateWindowResize);
                    }, 1000);

                });
            });
        });

    </script>
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/js/demos.js
            md.initDashboardPageCharts();


        });




        $(document).ready(function() {
            @if(Session::has('message'))
            var type = "{{Session::get('alert-type','info')}}";
            $.notify({
                message: "{{ Session::get('message') }}"

            }, {
                type: type,
                timer: 4000,
                placement: {
                    from: 'top',
                    align: 'right'
                }
            });
            @endif
        });


        function abrir(id) {
            console.log(id);
            $("#" + id).slideToggle("slow");
        }

        function transforma(tempo, campo) {
            var x = 0;
            console.log(tempo);
            var y = 0;


            resultado = tempo.split(":");
            console.log(resultado)
            for (var i = 0; i < resultado.length; i++) {

                y += parseInt(resultado[i]);
                //                console.log(y)

            }
            console.log(y)
            if (y > 0) {
                if (resultado.length == 3) {
                    x = parseInt(resultado[0] * 3600);
                    x += parseInt(resultado[1] * 60);
                    x += parseInt(resultado[2]);
                } else if (resultado.length == 2) {
                    x = parseInt(resultado[0] * 3600);
                    x += parseInt(resultado[1] * 60);
                } else if (resultado.length == 1) {
                    x = parseInt(resultado[0] * 3600);
                } else
                    x = 0;
            }
            console.log(x);

            if (campo == 0)
                document.getElementById("time5").value = x;
            else
                document.getElementById("time4").value = x;
        }


        function muda(radio) {
            var y = document.getElementsByName('corret[]');
            for (var i = 0; i < y.length; i++) {
                //$("input[name='corret']").attr("value", "0");
                y[i].value = 0;
            }
            $(radio).attr("value", "1");
        }

        function muda2(radio) {
            var y = document.getElementsByName('corret_ref[]');
            for (var i = 0; i < y.length; i++) {
                //$("input[name='corret']").attr("value", "0");
                y[i].value = 0;
            }
            $(radio).attr("value", "1");
        }







        function qrcodebtn(id) {

            $('#'+id).attr('disabled',true);
            $.get("/admin/virtual/" + id).done(function(data) {

                var parse = JSON.parse(data);

                if (data == "null") {

                    $('#noinfomodal').modal('show');
                    $('#'+id).attr('disabled',false);

                } else {
                    console.log(data)

                    $('#nomeqrsala').append(parse[0]);
                    $('#hiddenid').val(id);


                    for (var i = 1; i < parse.length; i++) {

                        if (i == 1) {
                            $('#corouselimg').append(
                                '<div class="carousel-item active col" >' +
                                '<img class="d-block w-100 " src="' + parse[i] + '" alt="First slide">' +
                                '<p> Qr Code: ' + i + ":" + (parse.length - 1) + '  </p>' +
                                '</div>'
                            );
                        }

                        if (i > 1) {

                            $('#corouselimg').append(
                                '<div class="carousel-item  col" >' +
                                '<img class="d-block w-100 " src="' + parse[i] + '" alt="First slide">' +
                                '<p> Qr Code: ' + i + ":" + (parse.length - 1) + '</p>' +
                                '</div>'
                            );
                        }
                    }

                    $('#qrmodal').modal('show');
                    $('.carousel').carousel({
                        interval: 1000
                    });
                     $('#'+id).attr('disabled',false);


                }
            });

        }


        /////////////////////////////

        $('#qrmodal').on('hide.bs.modal', function(e) {

            var idmodal = $('#hiddenid').val();


            $.get("/admin/virtualdelete/" + idmodal).done(function() {
                $('#corouselimg').empty();
                $('#nomeqrsala').empty();
                $('#carouselExampleControls').carousel('dispose');



            });
            

        });
            
            
            
            
            
            $('#addPerg').on('hide.bs.modal', function(e) {

            window.location.reload();
            

        });







         $('#addAlunoModal').on('show.bs.modal', function (e) { 

            mostrarmaisalunos();

            
         });

          $('#addAlunoModal').on('hide.bs.modal', function (e) {

             $('#divtabela').empty();
             $('.pagination').empty();

           }); 

         function mostrarmaisalunos(){

            console.log('Entrou');

        
             $.get("/admin/showaluno").done( function(data){

                var contagem = 1;
                var contagem1 = 0;
                var max =7;
                var i =0;
                parse = JSON.parse(data);
                var paginacao = Math.ceil(parse.length/max);
                console.log("pag :" , paginacao);

                $('#divtabela').append(
                    '<table id="table'+ contagem +'" class="table container-fluid" style="display:block;">'+
                                '<thead >'+
                                    '<tr>'+
                                        '<th scope="col"> Id: </th>'+
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
                                        '<th scope="col"> Id: </th>'+
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

                 
                 $('#body'+contagem).append(
                         '<tr>'+
                        '<td scope="row">'+parse[i].user_id +'</td>'+
                        '<td>'+ parse[i].name + '</td>' +
                         '<td>'+ parse[i].email +'</td>' +
                         '<td>'+ '<a class="btn btn-primary btn-sm " onclick="addaluno('+ parse[i].user_id +')" >Adicionar</a>' +'</td>' +
                             '</tr>'
                              
                             );

                 contagem1++;
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
            console.log('data: ' ,data,'total',total);


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


               



             

             // for(var i=0; i <5; i++){ 

             //    $('.pagination').append(
             //    '<li class="page-item "><a class="page-link" onclick="paginar('+data+','+total+')">'+data+'</a></li>'
             //        );

             // }
         }



          function addaluno(id){

                    console.log('addaluno');
                // $.post( "/admin/aluno", { 'id': id } );

                var _token = $('meta[name="_token"]').attr('content');

                        $.ajaxSetup({

                            headers: {

                                'X-CSRF-TOKEN': _token

                            }

                        });


                     $.ajax({
                     url: 'http://127.0.0.1:8000/admin/novoteste',
                     type: 'POST',
                        data: {
                            user:'oi'
                        },
                        dataType: 'JSON',

                        success: function(data){
                            console.log("Comunicacao ok", data);
                        },

                        error: function(){
                                console.log("erro");

                        }
                        });
                       


                
                // form action="{{ url('admin/aluno') }}" method="POST"


                } 

   // perfect-scrollbar-on nav-open

         var t = 0;

         function botaomenu(){
            if(t == 0){

                var overlayer = '<div class="close-layer visible" onclick="deletalayer()"id="divlayer"></div>';

            $('#botaomenu').attr("class","navbar-toggler toggled");
            $('#abrirmenu').attr("class","nav-open");
            $('#overlayer').append(overlayer);

                t = 1;

                
                $('#sidebar').show();
               

                console.log('é' + t);
                

             }
             
//             else{
//
//                $('#botaomenu').attr("class","navbar-toggler");
//                 $('#abrirmenu').attr("class","");
//                $('#sidebar').hide();
//
//
//                t = 0;
//                console.log('não e' + t);
//
//             }

         }

         function deletalayer(){

             $('#divlayer').detach();
              $('#botaomenu').attr("class","navbar-toggler");
               $('#abrirmenu').attr("class","");

               t = 0;
         }

    </script>

    

    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" defer></script>
    <script src="{{asset('js/jquery.ui.touch-punch.min.js')}}" defer></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous" defer></script>


</body>

</html>
