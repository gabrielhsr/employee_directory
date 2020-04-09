<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$db = "employee_directory";
	$connect = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

		mysqli_query($connect,"SET NAMES 'utf8'");
		mysqli_query($connect,"SET character_set_connection=utf8");
		mysqli_query($connect,"SET character_set_client=utf8");
		mysqli_query($connect,"SET character_set_results=utf8");	
?>