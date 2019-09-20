@extends('vendor.page')

@section('content')

<!--
<div class="container-fluid" style="margin-bottom:2%;">
    <div class="row">
        <div class="col-md-8 ">
            <h1>Estatísticas</h1>
</div>
</div>
</div>
-->
<div class="container-fluid">
    <div class="animated fadeIn">
      <div class="card-columns cols-2">
        <div class="card">
          <div class="card-header">
            Acertos e erros por pergunta
            <div class="card-actions">
              <a href="http://www.chartjs.org">
                <small class="text-muted">docs</small>
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-wrapper">
              <canvas id="perguntas" style="height: 400px;"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('myscript')
<script>
    
    function random() {
        return Math.round(Math.random() * 100);
    };
    
    
    var perguntas = <?php echo $perguntas; ?>;
    var perguntasNome = [];
    var perguntasId = [];
    var randomicoP = [];

    for (var i = 0; i < perguntas.length; i++) {
        perguntasNome[i] = perguntas[i].pergunta;
        perguntasId[i] = perguntas[i].id;
        randomicoP[i] = random();
        console.log(perguntasNome[i]);
    }
    var users = <?php echo $users; ?>;
    var usersNome = [];
    var usersId = [];
    var randomicoU = [];

    for (var i = 0; i < users.length; i++) {
        usersNome[i] = users[i].name;
        usersId[i] = users[i].id;
        randomicoU[i] = random();
        console.log(perguntasNome[i]);
    }


    


    var ctxp = document.getElementById('perguntas').getContext('2d');
    var barChart = new Chart(ctxp, {
        type: 'horizontalBar',
        data: {
            labels: perguntasNome,
            datasets: [{
                label: 'Erros',
                backgroundColor: 'rgba(255, 0, 0, 0.5)',
                borderColor: 'rgba(255, 0, 0, 0.8)',
                highlightFill: 'rgba(255, 0, 0, 0.75)',
                highlightStroke: 'rgb(255, 0, 0)',
                data: randomicoP
            }, {
                label: 'Acertos',
                backgroundColor: 'rgba(0, 255, 9, 0.5)',
                borderColor: 'rgba(0, 255, 9, 0.8)',
                highlightFill: 'rgba(0, 255, 9, 0.75)',
                highlightStroke: 'rgba(0, 255, 9, 1)',
                data: randomicoP
            }]

    },
    options: {
        tooltips: {
            mode: 'index',
            intersect: false
        },
        responsive: true,
        scales: {
            xAxes: [{
                stacked: true,
            }],
            yAxes: [{
                stacked: true
            }]
        }
    }
    });


    var ctxu = document.getElementById('users').getContext('2d');
    var barChart = new Chart(ctxu, {
        type: 'horizontalBar',
        data: {
            labels: usersNome,
            datasets: [{
                label: 'Erros',
                backgroundColor: 'rgba(255, 0, 0, 0.5)',
                borderColor: 'rgba(255, 0, 0, 0.8)',
                highlightFill: 'rgba(255, 0, 0, 0.75)',
                highlightStroke: 'rgb(255, 0, 0)',
                data: randomicoU
            }, {
                label: 'Acertos',
                backgroundColor: 'rgba(0, 255, 9, 0.5)',
                borderColor: 'rgba(0, 255, 9, 0.8)',
                highlightFill: 'rgba(0, 255, 9, 0.75)',
                highlightStroke: 'rgba(0, 255, 9, 1)',
                data: randomicoU
            }]
        },
        options: {
            tooltips: {
                mode: 'index',
                intersect: false
            },
            responsive: true,
            scales: {
                xAxes: [{
                    stacked: true,
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });

</script>
@endsection
