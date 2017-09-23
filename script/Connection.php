<?php

	$host  ="localhost";
	$dbuser="root";
	$pass  =")(*LKJ";   
	$dbname="university";
	$conn = mysqli_connect($host,$dbuser,$pass,$dbname);
	

	if(mysqli_connect_errno())
 	{
 		die("Connection Failed: " . mysqli_connect_errno());
 	}
 	else
 		//echo "Conntect To  Database Done!<br><br>";

?>
