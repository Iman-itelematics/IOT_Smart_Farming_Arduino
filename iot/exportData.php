<?php
session_start();

   	include("connect.php");
   	
   	$link=Connection();

	$data=$_POST["d"];
	$max=$_POST["mx"];
	$min=$_POST["mn"];
	$avg=$_POST["avg"];
	$gdd=$_POST["gdd"];
	
	

	$query = "INSERT INTO `maxmin` (`date1`,`max1`,`min1`,`avg`,`gdd`) 
		VALUES ('".$data."','".$max."','".$min."','".$avg."','".$gdd."')"; 

   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: Analysis.html");

?>
