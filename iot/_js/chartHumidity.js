$(function() {
    $(document).ready(function() {
        var ultimox;
        var ultimoy;

        var xTitles = new Array();
        var dateTime = new Array();
        var time = new Array();
        $.ajax({
            url: "data.php?q=6",
            type: 'get',
            success: function(DatosRecuperados) {
                $.each(DatosRecuperados, function(i, o) {
                    if (o.x) {
                        var jsonString = o.x;
                        var dateTime = jsonString.split(" ");
                        var time1 = dateTime[1].split(":");
                        var date1 = dateTime[0].split("-");
                        var timedate = date1.concat(time1);
                        var fultime = timedate.join("");

                        console.log(dateTime[1]);

                        xTitles.push(o.x);

                        DatosRecuperados[i].x = parseInt(fultime);
                        console.log(xTitles[xTitles.length - 1]);

                    }
                    if (o.y) {
                        DatosRecuperados[i].y = parseFloat(o.y);
                    }
                });


                setx(DatosRecuperados[(DatosRecuperados.length) - 1].x);
                sety(DatosRecuperados[(DatosRecuperados.length) - 1].y);

                $('#humidity').highcharts({
                    chart: {
                        type: 'spline',
                        animation: Highcharts.svg,
                        marginRight: 10,
                        events: {
                            load: function() {
                                series = this.series[0];
                            }
                        }
                    },
                    title: {
                        text: 'Humidity Chart'
                    },
                    xAxis: {
                        tickPixelInterval: 100,
                        categories: ['A']

                    },
                    yAxis: {
                        title: {
                            text: '%'
                        },
                        plotLines: [{
                            value: 0,
                            width: 1,
                            color: '#808080'
                        }]
                    },
                    tooltip: {
                        formatter: function() {
                            return '<b>' + this.series.name + '</b><br/>' +
                                Highcharts.numberFormat(this.x, 2) + '<br/>' +
                                Highcharts.numberFormat(this.y, 2);
                        }
                    },
                    legend: {
                        enabled: false
                    },
                    exporting: {
                        enabled: false
                    },
                    series: [{
                        name: 'Date & Humidity',
                        data: DatosRecuperados
                    }]
                });

            }
        });
    });
    setInterval(function() {
        $.get("data.php?q=5", function(UltimosDatos) {
            var varlocalx = parseFloat(UltimosDatos[0].x);
            var varlocaly = parseFloat(UltimosDatos[0].y);

            if ((getx() != varlocalx) && (gety() != varlocaly)) {

                series.addPoint([varlocalx, varlocaly], true, true);
                setx(varlocalx);
                sety(varlocaly);
            }
        });
    }, 1000);

    function getx() {
        return ultimox;
    }

    function gety() {
        return ultimoy;
    }

    function setx(x) {
        ultimox = x;
    }

    function sety(y) {
        ultimoy = y;
    }

});