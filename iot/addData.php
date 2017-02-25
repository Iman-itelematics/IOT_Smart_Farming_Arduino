<?php
session_start();

   	include("connect.php");
   	
   	$link=Connection();

	$crpname=$_POST["crpname"];
	$mnthprof=$_POST["mnthprof"];
	$mnthcrpyld=$_POST["mnthcrpyld"];
	

	$query = "INSERT INTO `cropMonthlyDetails` (`cropName`,`monthProfit`,`monthCropYield`) 
		VALUES ('".$crpname."','".$mnthprof."','".$mnthcrpyld."')"; 

   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: datasubmit.html");

?>
