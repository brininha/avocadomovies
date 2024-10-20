google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawDualY);

function drawDualY() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Meses do ano');
      data.addColumn('number', 'Unidades vendidas');

      data.addRows([
        ['Jan', 1],
        ['Fev', 2],
        ['Mar', 3],
        ['Abr', 4],
        ['Mai', 5],
        ['Jun', 6],
        ['Jul', 7],
        ['Ago', 8],
        ['Set', 9],
        ['Out', 10],
        ['Nov', 0],
        ['Dez', 0],
      ]);

      var options = {
        chart: {
          title: 'Vendas de ingressos no último ano',
        },
        colors: '#fbf089',
        series: {
          0: {axis: 'unitsSold'},
        },
        axes: {
          y: {
            unitsSold: {label: 'Unidades vendidas'}
          }
        },
        hAxis: {
          title: 'Meses do ano',
        },
      };

      var materialChart = new google.charts.Bar(document.getElementById('columnchart_div'));
      materialChart.draw(data, options);
    }