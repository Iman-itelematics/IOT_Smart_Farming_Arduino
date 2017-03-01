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

    <meta name="author" content="Kasun Pradeepa">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="_asset/css/plugins/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="_asset/css/plugins/simple-line-icons.css" />
    <link rel="stylesheet" type="text/css" href="_asset/css/plugins/animate.min.css" />
    <link rel="stylesheet" type="text/css" href="_asset/css/plugins/fullcalendar.min.css" />
    <link href="_asset/css/style.css" rel="stylesheet">
    <link href="_css/style.css" rel="stylesheet">

    <link rel="shortcut icon" href="_asset/img/logomi.png">

</head>

<body id="mimin" class="dashboard">

    <!--  Header -->
    <nav class="navbar navbar-default header navbar-fixed-top">
        <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
                <div class="opener-left-menu is-open">
                    <span class="top"></span>
                    <span class="middle"></span>
                    <span class="bottom"></span>
                </div>

                <a class="navbar-brand" href="index.html" class="navbar-brand">
                    <b>IOT Smart Farming</b>
                </a>
                <ul class="nav navbar-nav navbar-right user-nav">
                    <li class="user-name"><span>Kasun Pradeepa</span></li>
                    <li class="dropdown avatar-dropdown">
                        <img src="_asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
                        <ul class="dropdown-menu user-dropdown">
                            <li><a href="#"><span class="fa fa-user"></span> My Profile</a></li>

                            <li role="separator" class="divider"></li>
                            <li class="more">
                                <ul>
                                    <li><a href=""><span class="fa fa-cogs"></span></a></li>
                                    <li><a href=""><span class="fa fa-lock"></span></a></li>
                                    <li><a href=""><span class="fa fa-power-off "></span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- end: Header -->

    <div class="container-fluid mimin-wrapper" style="background-image: _asset/img/bg1.jpg">

        <!-- start:Left Menu -->
        <div id="left-menu">
            <div class="sub-left-menu scroll">
                <ul class="nav nav-list">

                    <li>
                        <div class="left-bg"></div>
                    </li>

                    <li class="time">
                        <h1 class="animated fadeInLeft">21:00</h1>
                        <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>

                    <li class="active ripple">
                        <a class="tree-toggle nav-header"><span class="fa-home fa"></span> Home 
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                        <ul class="nav nav-list tree">
                            <li><a onclick="window.location.href='http://localhost/iot/index.html'">Current Data</a></li>
                            <li><a onclick="window.location.href='http://localhost/iot/Chart.html'">Weather Charts</a></li>
                            <li><a onclick="window.location.href='http://localhost/iot/ProfiCharts.html'">Profit & Yield Charts</a></li>
                            <li><a onclick="window.location.href='http://localhost/iot/Water.php'">Waterpump Control</a></li>
                            <li><a onclick="window.location.href='http://localhost/iot/datasubmit.html'">Data Submit</a></li>
                            <li><a onclick="window.location.href='http://localhost/iot/forcast.html'">News & Forcast</a></li>
                            <li><a onclick="window.location.href='http://localhost/iot/Analysis.php'">Analisys</a></li>

                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- end: Left Menu -->
    </div>

    <!-- start: content -->
    <div id="content">


        <div class="col-md-12" style="padding:20px;">
            <div class="col-md-12 padding-0">
                <div class="col-md-8 padding-0">
                    <div class="col-md-12">
                       
                             <!--ON/OFF-->
                              <div class="col-md-8 col-md-offset-2">
                              
                                <a href="?waterpump=on" class="btn btn-success btn-block btn-lg">Turn On</a>
                                <br />
                                <a href="?waterpump=off" class="led btn btn-danger btn-block btn-lg">Turn Off</a>
                                <br />
                                <div class="light-status well" style=" text-align:center">
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
                </div>

                <div class="col-md-4">
                    <div class="col-md-12 padding-0">
                        <div class="panel box-v2">
                            <div class="panel-heading padding-0">
                                <img src="_asset/img/bg2.jpg" class="box-v2-cover img-responsive" />
                                <div class="box-v2-detail">
                                    <img src="_asset/img/avatar.jpg" class="img-responsive" />
                                    <h4>Kasun Pradeepa</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end: content -->
        </div>
    </div>
    </div>

    <!-- Script -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript" src="_js/jquery-2.1.4.js"></script>
    <script src="_asset/js/jquery.min.js"></script>
    <script src="_asset/js/jquery.ui.min.js"></script>
    <script src="_asset/js/bootstrap.min.js"></script>

    <script type="text/javascript" src="_js/highcharts.js"></script>
    <script type="text/javascript" src="_js/exporting.js"></script>
    <script type="text/javascript" src="_js/script.js"></script>
    <script type="text/javascript" src="_js/profitchart.js"></script>


    <!-- plugins -->
    <script src="_asset/js/plugins/moment.min.js"></script>
    <script src="_asset/js/plugins/fullcalendar.min.js"></script>
    <script src="_asset/js/plugins/jquery.nicescroll.js"></script>
    <script src="_asset/js/main.js"></script>

</body>

</html>                 