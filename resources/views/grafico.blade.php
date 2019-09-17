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
    <form>
        <label for="type">Selecione o tipo do gráfico</label>
    <select id="type">
        <option value="line">Linhas</option>    
        <option value="bar">Barras</option>    
        <option value="radar">Radar</option>    
        <option value="pie">Pizza</option>    
        <option value="doughnut">Rosca</option>    
        <option value="polarArea">radar+pizza</option>    
        <option value="bubble">Bolhas</option>    
        <option value="scatter">Disperção</option>  
        <option value="mixed">Mixed</option>    
    </select>
    
    </form>
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
              <canvas id="canvas-1"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



@endsection

@section('myscript')
	<script>
        var ctx1 = document.getElementById('canvas-1').getContext('2d');
        var canvas1 = new Chart(ctx1, {
          type: 'line',
          data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'], //x
            datasets: [{
              label: 'My First dataset',
              backgroundColor: 'rgba(220, 220, 220, 0.2)',
              borderColor: 'rgba(220, 220, 220, 1)',
              pointBackgroundColor: 'rgba(220, 220, 220, 1)',
              pointBorderColor: '#fff',
              data: [random(), random(), random(), random(), random(), random(), random()] //y
            }, {
              label: 'My Second dataset',
              backgroundColor: 'rgba(151, 187, 205, 0.2)',
              borderColor: 'rgba(151, 187, 205, 1)',
              pointBackgroundColor: 'rgba(151, 187, 205, 1)',
              pointBorderColor: '#fff',
              data: [random(), random(), random(), random(), random(), random(), random()]
            }]
          },
          options: {
            responsive: true
          }
        });
    </script>
@endsection