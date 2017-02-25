<?php
session_start();

   	include("connect.php");
   	
   	$link=Connection();

	$temp1=$_POST["temp1"];
	$hum1=$_POST["hum1"];
	$tempr1=$_POST["tempr1"];
	$press1=$_POST["press1"];
	$press01=$_POST["press01"];
	$soil1=$_POST["soil1"];
	$soilTemp1=$_POST["soilTemp1"];

	$query = "INSERT INTO `tempLog` (`temperature`, `humidity`,`tempr`,`presser`,`pressera`,`soilmoisture`,`soiltemperature`) 
		VALUES ('".$temp1."','".$hum1."','".$tempr1."','".$press1."','".$press01."','".$soil1."','".$soilTemp1."')"; 

   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: index.php");

?>
