@extends('vendor.menu')

@section('content')

<form>
     <div class="form-check">
        <label class="form-check-label">

            <input class="form-check-input" type="checkbox" id="qntdeRespPerg" checked>
            Quantidade de respostas por pergunta
            <span class="form-check-sign">
                <span class="check"></span>
            </span>
        </label>
    </div>

</form>



<!--
<div style="display:none" id="qntdeRespPergDiv">
    
    <h4>Quantidade de respostas por pergunta</h4>

    <div style="width: 50%">
        {!! $usersChart->container() !!}
    </div>
    
</div>
-->




<div style="display:block" id="qntdeRespPergDiv">
    
    <h4>Quantidade de respostas por pergunta</h4>

    <div style="width: 50%">
        {!! $usersChart->container() !!}
    </div>
    
</div>
@endsection

@section('myscript')
<!--

<script>
   var barChartData = {
			labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],  //perg nomes
			datasets: [{
				label: '1ª tentativa',
				backgroundColor: window.chartColors.green,
				data: // qtd1
                [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
			}, {
				label: '2ª tentativa',
				backgroundColor: window.chartColors.yellow,
				data: // qtd2
                [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
			}, {
				label: '3ª tentativa',
				backgroundColor: window.chartColors.red,
				data: // qtd3
                [
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor(),
					randomScalingFactor()
				]
			}]

		};
		window.onload = function() {
			var ctx = document.getElementById('canvas').getContext('2d');
			window.myBar = new Chart(ctx, {
				type: 'bar',
				data: barChartData,
				options: {
					title: {
						display: true,
						text: 'Tentativas para acerto das perguntas por alunos'
						text: 'Sala ' + sala_nome
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
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			barChartData.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});
			window.myBar.update();
		});

</script>
-->

@endsection