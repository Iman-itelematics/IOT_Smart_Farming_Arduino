google.charts.load('current', {
    'packages': ['gauge']
});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
        ['Label', 'Value'],
        ['Humidity', 0],
        ['Tempreture', 0],
        ['Soil Temperature', 0]
    ]);

    // var data2 = google.visualization.arrayToDataTable([
    //     ['Label', 'Value'],
    //     ['Pressure', 0],
    //     ['Soil Moisture', 0]
    // ]);

    var options = {
        width: 620,
        height: 320,
        redFrom: 90,
        redTo: 100,
        yellowFrom: 75,
        yellowTo: 90,
        minorTicks: 5
    };

    // var options2 = {
    //     width: 420,
    //     height: 220,
    //     redFrom: 1200,
    //     redTo: 1500,
    //     yellowFrom: 1000,
    //     yellowTo: 1200,
    //     minorTicks: 5
    // };

    var chart = new google.visualization.Gauge(document.getElementById('meters'));
    // var chart2 = new google.visualization.Gauge(document.getElementById('meters2'));
    chart.draw(data, options);
    // chart2.draw(data2, options2);

    setInterval(function() {
        var JSON = $.ajax({
            url: "data.php?q=3",
            dataType: 'json',
            async: false
        }).responseText;
        var Respuesta = jQuery.parseJSON(JSON);


        data.setValue(0, 1, Respuesta[0].humidity);
        data.setValue(1, 1, Respuesta[0].temperature);
        data.setValue(2, 1, Respuesta[0].soiltemperature);

        chart.draw(data, options);
    }, 100);

    // setInterval(function() {
    //     var JSON = $.ajax({
    //         url: "data.php?q=3",
    //         dataType: 'json',
    //         async: false
    //     }).responseText;
    //     var Respuesta = jQuery.parseJSON(JSON);
    //     data2.setValue(0, 1, Respuesta[0].presser);
    //     data2.setValue(1, 1, Respuesta[0].soilmoisture);


    //     chart2.draw(data2, options2);
    // }, 100);

}