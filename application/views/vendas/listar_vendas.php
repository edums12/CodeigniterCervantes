<div class="container">
  <h3>Vendas</h3>

  <div>
    <canvas id="canvas_vendas"></canvas>
  </div>

  <script>
    $(document).ready(() => {
      var data = {
        labels: [{meses_label}],
        datasets: [
          {
            label: 'Vendas',
            borderColor: "#F44336",
            backgroundColor: "transparent",
            data: [{relatorio_datasets}]
          }
        ]
      }

      var ctx = document.getElementById('canvas_vendas').getContext('2d');
      var myLineChart = new Chart(ctx, {
        type: 'line',
        data: data
      });
    })
  </script>
</div>