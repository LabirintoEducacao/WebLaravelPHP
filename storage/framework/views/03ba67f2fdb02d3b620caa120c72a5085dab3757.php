<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">


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
                font-size: 84px;
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

            @media (max-width: 760px) {
                .logins{
                    margin: 2% 14% 2% 4%;
                }
                .title{

                    display: none;
                }
                .mobile-hide{

                     display: none;
                }
            }     

        </style>
    </head>
    <body>
        <div class="position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links mobile-hide">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">Registrar</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
             <div class="content logins row">
                <p class="col-md-12 title m-b-md justify-content-center" style="margin-top: 10%;">
                    Labirinto
                </p>
                <div class="row col-md-12" style="margin-left: 8%;">
                    <div class="card border-info col-md-3 col-sm-12">
                        <div class="card-header">Aluno</div>
                        <div class="card-body text-info">
                            <img class="card-img-top" src="<?php echo e(asset('img/aluno.png')); ?>" width="80%"/>
                            <div class="card-text links">
                                <a href="<?php echo e(url('usuario/login')); ?>">Login</a><br>
                                <a href="<?php echo e(url('usuario/register')); ?>">Cadastre-se</a>
                            </div>
                        </div>
                    </div>&emsp;&emsp;&emsp;
                    <div class="card border-info col-md-3 col-sm-12">
                        <div class="card-header">Professor</div>
                        <div class="card-body text-info">
                            <img class="card-img-top" src="<?php echo e(asset('img/professor.png')); ?>" width="80%"/>
                            <div class="card-text links">
                                <a href="<?php echo e(url('login')); ?>">Login</a><br>
                                <a href="<?php echo e(url('register')); ?>">Cadastre-se</a>
                            </div>
                        </div>
                    </div>&emsp;&emsp;&emsp;
                    <div class="card border-info col-md-3 col-sm-12">
                        <div class="card-header">Jogos Públicos</div>
                        <div class="card-body text-info">
                            <img class="card-img-top" src="<?php echo e(asset('img/console.png')); ?>" width="80%"/>
                            <div class="card-text links">
                                <a href="<?php echo e(url('virtual')); ?>">Jogar</a><br>
                            </div>
                        </div>
                    </div>&emsp;&emsp;&emsp;
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH /home/thiago/Desktop/lab/resources/views/welcome.blade.php ENDPATH**/ ?>