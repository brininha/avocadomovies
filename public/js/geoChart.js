google.charts.load("current", {
    packages: ["geochart"],
    mapsApiKey: "",
});
google.charts.setOnLoadCallback(drawMarkersMap);

function drawMarkersMap() {
    fetch("/cinemas/dados/localizacao")
        .then((response) => response.json())
        .then((cinemas) => {
            var data = google.visualization.arrayToDataTable([
                ["Nome"],
                ...cinemas.map((cinema) => [`${cinema.nomeCinema}`]),
            ]);

            var options = {
                region: "BR",
                displayMode: "markers",
                colorAxis: {
                    minValue: 0,
                    maxValue: 1,
                    values: [0, 1],
                    colors: ["transparent", "transparent"],
                },
                magnifyingGlass: { enable: true, zoomFactor: 25 },
                backgroundColor: { fill: "#e3f6ff" },
                datalessRegionColor: "#fff",
                defaultColor: "#fbf089",
                tooltip: { isHtml: true },
                animation: {
                    startup: false,
                    duration: 0,
                    easing: "none",
                },
            };

            var chart = new google.visualization.GeoChart(
                document.getElementById("geochart_div")
            );
            chart.draw(data, options);
        })
        .catch((error) =>
            console.error("Erro ao buscar os dados dos cinemas:", error)
        );
}
