$(document).ready(function() {
    setInterval(function() {
        var JSON = $.ajax({
            url: "data.php?q=14",
            dataType: 'json',
            async: false
        }).responseText;
        var Respuesta = jQuery.parseJSON(JSON);

        for (var i = 0; i < Respuesta.length; i++) {
            var _data = Respuesta[i].date1;
            var _max = Respuesta[i].max1;
            var _min = Respuesta[i].min1;

            var urlString = "d=" + _data + "&mx=" + _max + "&mn=" + _min;

            $.ajax({
                url: "exportData.php",
                type: "POST",
                cache: false,
                data: urlString,
                success: function(response) {
                    // alert(response);
                }
            });
        }
    }, 100);
});