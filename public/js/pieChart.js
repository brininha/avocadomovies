google.charts.load("current", { packages: ["corechart"] });
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
    fetch("/filmes/dados/generos")
        .then((response) => response.json())
        .then((generos) => {
            var data = new google.visualization.DataTable();
            data.addColumn("string", "Gênero");
            data.addColumn("number", "Quantidade");

            generos.forEach((genero) => {
                data.addRow([genero.nomeGenero, genero.total]);
            });

            var options = {
                title: "Distribuição de Gêneros dos Filmes",
                pieHole: 0.2,
                pieSliceTextStyle: {
                    color: "black",
                },
                colors: [
                    "#fbd789",
                    "#fbf089",
                    "#d3fb89",
                    "#98fb89",
                    "#89fbd5",
                    "#89cbfb",
                    "#8f89fb",
                ],
                tooltip: { isHtml: true, trigger: 'selection' },
                animation: {
                    startup: false,
                    duration: 0,
                    easing: "none",
                },
            };

            var chart = new google.visualization.PieChart(
                document.getElementById("piechart_div")
            );
            chart.draw(data, options);
        })
        .catch((error) => console.error("Erro ao buscar os dados:", error));
}
