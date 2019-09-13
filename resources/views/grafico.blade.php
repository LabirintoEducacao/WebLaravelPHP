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
                    Gráfico Dinâmico
                    <div class="card-actions">
                        <a href="http://www.chartjs.org">
                            <small class="text-muted">docs</small>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-wrapper">
                        <canvas id="grafico"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

@section('myscript')
<script>
    var teste = <?php echo $salas; ?>;
    console.log(teste);
    console.log(teste[0]);
    console.log(teste[0].name);
    
    var perguntas = <?php echo $perguntas; ?>;
    var perguntasNome=[];
    var perguntasId=[];

    perguntas.forEach(function(pergunta){
        console.log(pergunta);
    });
    
    for (var i = 0; i < perguntas.length; i++) {
        perguntasNome[i] = perguntas[i].pergunta;
        console.log(perguntasNome[i]);
    }
    
    var random = function random() {
        return Math.round(Math.random() * 100);
    };


    var ctxg = document.getElementById('grafico').getContext('2d');
    var barChart = new Chart(ctxg, {
        type: 'horizontalBar',
        data: {
            labels: perguntasNome,
            datasets: [{
                label: 'Erros',
                backgroundColor: 'rgba(255, 0, 0, 0.5)',
                borderColor: 'rgba(255, 0, 0, 0.8)',
                highlightFill: 'rgba(255, 0, 0, 0.75)',
                highlightStroke: 'rgb(255, 0, 0)',
                data: [random(), random(), random(), random(), random(), random(), random()]
            }, {
                label: 'Acertos',
                backgroundColor: 'rgba(0, 255, 9, 0.5)',
                borderColor: 'rgba(0, 255, 9, 0.8)',
                highlightFill: 'rgba(0, 255, 9, 0.75)',
                highlightStroke: 'rgba(0, 255, 9, 1)',
                data: [random(), random(), random(), random(), random(), random(), random()]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Chart.js Bar Chart - Stacked'
            },
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
