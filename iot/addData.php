<?php
session_start();

   	include("connect.php");
   	
   	$link=Connection();
	$subdate=$_POST["subdate"];
	$crpname=$_POST["crpname"];
	$mnthprof=$_POST["mnthprof"];
	$mnthcrpyld=$_POST["mnthcrpyld"];
	

	$query = "INSERT INTO `cropMonthlyDetails` (`Date`,`cropName`,`monthProfit`,`monthCropYield`) 
		VALUES ('".$subdate."','".$crpname."','".$mnthprof."','".$mnthcrpyld."')"; 

   	mysql_query($query,$link);
	mysql_close($link);

   	header("Location: datasubmit.html");

?>
