<?php  
$waterpump = $_GET['waterpump'];
if($waterpump == "on") {  
  $file = fopen("waterpump.json", "w") or die("can't open file");
  fwrite($file, '{"waterpump": "on"}');
  fclose($file);
} 
else if ($waterpump == "off") {  
  $file = fopen("waterpump.json", "w") or die("can't open file");
  fwrite($file, '{"waterpump": "off"}');
  fclose($file);
}
?>
<html xmlns "http://www.w3.org/1999/xhtml">  
  <head runat="server">      
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="_js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="_js/highcharts.js"></script>
    <script type="text/javascript" src="_js/exporting.js"></script>
    <script type="text/javascript" src="_js/script.js"></script>
    <script type="text/javascript" src="_js/chartscrtipt.js"></script>

  </head>
  <body>
    
    <div id="chart" style="min-width: 100px; height: 400px; margin: 0 auto"></div>
    <div id="meters"></div>
    <div id="meters2"></div>

    <div class="row" style="margin-top: 20px;">
    <!--ON/OFF-->
      <div class="col-md-8 col-md-offset-2">
      
        <a href="?waterpump=on" class="btn btn-success btn-block btn-lg">Turn On</a>
        <br />
        <a href="?waterpump=off" class="led btn btn-danger btn-block btn-lg">Turn Off</a>
        <br />
        <div class="light-status well" style="margin-top: 5px; text-align:center">
          <?php
            if($waterpump=="on") {
              echo("Waterpump on.");
            }
            else if ($waterpump=="off") {
              echo("Waterpump off.");
            }
            else {
              echo ("Do something.");
            }
          ?>
        </div>
      </div>
      <!--ON/OFF_END-->
    </div>
  </body>
</html>  