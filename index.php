<?php
	// session_start();
	include("connect.php"); 	
	
	$link=Connection();

	$result=mysql_query("SELECT * FROM `tempLog` ORDER BY `timeStamp` DESC",$link);
	
?>

<html>
   <head>
      <title>Sensor Data</title>
	  
	  
    <script type="text/javascript" src="_js/jquery.min.js"></script>

   </head>
<body>
   <h1>Temperature / moisture sensor readings</h1>
   <p><a href="aa.php" target="blank">hello</a></p>
<div id="links">
   <table  border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td>&nbsp;Timestamp&nbsp;</td>
			<td>&nbsp;Temperature &nbsp;</td>
			<td>&nbsp;Humidity &nbsp;</td>
			<td>&nbsp;tempr &nbsp;</td>
			<td>&nbsp;presser &nbsp;</td>
			<td>&nbsp;pressera &nbsp;</td>
			<td>&nbsp;soilmoisture &nbsp;</td>
			<td>&nbsp;soiltemperature &nbsp;</td>
		</tr>

      <?php 
		  if($result!==FALSE){
		     while($row = mysql_fetch_array($result)) {
				 
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s </td><td> &nbsp;%s </td><td> &nbsp;%s </td><td> &nbsp;%s </td><td> &nbsp;%s </td></tr>", 
		           $row["timeStamp"], $row["temperature"], $row["humidity"], $row["tempr"], $row["presser"], $row["pressera"], $row["soilmoisture"], $row["soiltemperature"]);
		     }
			 //printf('<p>%s </p>',$row["temperature"]);
		     mysql_free_result($result);
		     mysql_close();
		  }
      ?>

   </table></div>


</body>
</html>
