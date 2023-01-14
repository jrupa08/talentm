<?php 
	$mysql_hostname = "localhost";
	$mysql_user = "root";
	$mysql_password = "";
	$mysql_database = "talent";
	$conn = mysqli_connect($mysql_hostname,$mysql_user,$mysql_password,$mysql_database) or  die("could not able to connect db");
	mysqli_select_db($conn,$mysql_database) or die("could not select db");
 ?>
