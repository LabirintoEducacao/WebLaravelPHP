<html>

<body>
    <!------------------------ Espaço das Salas  --------------------------->
    <div class="container-fluid" align="center">


        <!------- Estrutura de repetição (CARD)------------------->
       

        <div class="col-md-3">
            <div class="card ">

                {!! QrCode::size(400)->generate( $json ); !!}


            </div>
        </div>
   
    </div>
</body>

</html>
