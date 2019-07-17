<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- BOOTSTRAP -->
        <link rel="stylesheet" href="../assets/css/bootstrap.css">
        <link rel="stylesheet" href="../assets/css/bootstrap-flex.css">

        <title>LABIRINTO</title>
        <link rel="icon" href="../img/maze.png" type="image/x-icon" sizes="16x16">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 64px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            
            
            .btn {
                font-family: 'Nunito', sans-serif;
                font-size: 13;
                width: 165px;
                height: 35px;
                border-radius: 5px;
                background-color: rgba(0, 203, 31, 0.75);
                box-shadow: 2px 2px #004e9b;
                padding: 9px 50px;
                border: none;
                color: white;
            }
            .btn:focus {
                background-color: rgba(0, 100, 15, 0.75);
                border-radius: 5px;
            }
            
            
            .btn-log {
                font-family: 'Nunito', sans-serif;
                font-size: 13;
                width: 214px;
                height: 35px;
                border-radius: 5px;
                background-color: rgba(121, 121, 121, 0.76);
                box-shadow: 2px 2px #004e9b;
                padding: 9px 50px;
                border: none;
                color: white;
            }
            .btn-log:focus {
                background-color: rgb(93, 93, 93);
                border-radius: 5px;
            }
            
            .form{
                margin: 5% 20% 5% 20%;
                padding: 4% 2% 3% 2%;
                border-radius: 7px;
            }
            
            .pass{
                font-family: 'Nunito', sans-serif;
                font-size: 12px;
                color: rgb(181, 0, 0);
                padding-left: 38%;
            }
            
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            

            <div class="content">
                <div class="title m-b-md">
                    LOGIN
                </div>
                
                <div>
                    @if(Session::has('mensagem_sucesso'))
                        <div class="alert alert-success">{{Session::get('mensagem_sucesso')}}</div>                
                    @endif

                    @if(Session::has('mensagem_erro'))
                        <div class="alert alert-danger">{{Session::get('mensagem_erro')}}</div>                
                    @endif

                    <form>
                        <fieldset class="form">
                            <label for="login">Login : </label> &emsp; &emsp; &emsp; &emsp; &emsp;
                            <input type="text" name="login" id="login">
                            <br><br>
                            <label for="password">Senha : </label> &emsp; &emsp; &emsp; &emsp; &emsp;
                            <input type="password" name="password" id="password">
                            <br>
                            <a href="#" class="pass">Esqueci minha senha</a>
                            <br><br>
                            <button type="reset" class="btn btn-info">LOGIN</button>    
                        </fieldset>
                        <br><br>
                        <button type="button" class="btn btn-log" onclick="window.location='{{ url('/register') }}'">CADASTRE-SE JÁ</button>
                    </form>
                </div>
                <br><br>
                <!--div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div-->
            </div>
        </div>
        
        
        <script src="../assets/js/bootstrap.js"></script>
        <script src="../assets/js/jquery-3.2.1.js"></script>
        
    </body>
</html>
