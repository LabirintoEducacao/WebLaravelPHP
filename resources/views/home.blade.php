@extends('vendor.page')

@section('content')

<div class="container-fluid" style="margin-bottom:2%;">
    <div class="row">
        <div class="col-md-8 ">
            <h1>Estatísticas</h1>
</div>

  
</div>
</div>
<div class="container-fluid">
    <div class="animated fadeIn">
      <div class="card-columns cols-2">
        <div class="card">
          <div class="card-header">
            Acertos e erros por sala
            <div class="card-actions">
              <a href="http://www.chartjs.org">
                <small class="text-muted">docs</small>
              </a>
            </div>
          </div>
          <div class="card-body">
            <div class="chart-wrapper">
              <canvas id="salas"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  

@endsection

@section('myscript')
<script>
	var salas = <?php echo $salas; ?>;
    var salasNome = [];
    var salasId = [];

    for (var i = 0; i < salas.length; i++) {
        salasNome[i] = salas[i].name;
        salasId[i] = salas[i].id;
        console.log(salasNome[i]);
    }

    function random() {
        return Math.round(Math.random() * 100);
    };


    var ctxp = document.getElementById('salas').getContext('2d');
    var barChart = new Chart(ctxp, {
        type: 'horizontalBar',
        data: {
            labels: salasNome,
            borderColor: 'rgba(255, 0, 0, 0.8)',
            highlightFill: 'rgba(255, 0, 0, 0.75)',
            highlightStroke: 'rgb(255, 0, 0)',
            data: [random(), random()],
        datasets: [{
            label: 'Erros',
            backgroundColor: 'rgba(255, 0, 0, 0.5)',
            borderColor: 'rgba(255, 0, 0, 0.8)',
            highlightFill: 'rgba(255, 0, 0, 0.75)',
            highlightStroke: 'rgb(255, 0, 0)',
            data: [random(), random()]
        }, {
            label: 'Acertos',
            backgroundColor: 'rgba(0, 255, 9, 0.5)',
            borderColor: 'rgba(0, 255, 9, 0.8)',
            highlightFill: 'rgba(0, 255, 9, 0.75)',
            highlightStroke: 'rgba(0, 255, 9, 1)',
            data: [random(), random()]
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